<?php
session_start();
header("Content-Type: application/json");
include("../../includes/db_config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mode = $_POST['mode'] ?? '';

    if ($mode === 'assignmenu') {
        $user_id = $_POST['user_id'] ?? '';
        $roll_id = $_POST['roll_id'] ?? '';
        $menus = $_POST['menus'] ?? [];

        if (empty($user_id) || empty($menus)) {
            echo json_encode(["status" => "error", "message" => "Invalid input data."]);
            exit;
        }

        $menu_ids = implode(",", array_map('intval', $menus));

        $check_query = "SELECT menu_id FROM user_menu_access WHERE fk_user_id = ?";
        if ($stmt = mysqli_prepare($org_link, $check_query)) {
            mysqli_stmt_bind_param($stmt, "s", $user_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $existing_menu_ids);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            if ($existing_menu_ids) {
                $update_query = "UPDATE user_menu_access SET menu_id = ? WHERE fk_user_id = ?";
                if ($update_stmt = mysqli_prepare($org_link, $update_query)) {
                    mysqli_stmt_bind_param($update_stmt, "ss", $menu_ids, $user_id);
                    mysqli_stmt_execute($update_stmt);
                    mysqli_stmt_close($update_stmt);
                    echo json_encode(["status" => "success", "message" => "Menus updated successfully."]);
                    exit;
                }
            } else {
                $insert_query = "INSERT INTO user_menu_access (fk_user_id, fk_role_id, menu_id) VALUES (?, ?, ?)";
                if ($insert_stmt = mysqli_prepare($org_link, $insert_query)) {
                    mysqli_stmt_bind_param($insert_stmt, "sss", $user_id, $roll_id, $menu_ids);
                    mysqli_stmt_execute($insert_stmt);
                    mysqli_stmt_close($insert_stmt);
                    echo json_encode(["status" => "success", "message" => "Menus assigned successfully."]);
                    exit;
                }
            }
        }

        echo json_encode(["status" => "error", "message" => "An error occurred."]);
        exit;
    }

    if ($mode === 'fetchmenus') {
        $user_id = $_POST['user_id'] ?? '';

        if (empty($user_id)) {
            echo json_encode(["status" => "error", "message" => "Invalid user ID."]);
            exit;
        }

        $fetch_query = "SELECT menu_id FROM user_menu_access WHERE fk_user_id = ?";
        if ($stmt = mysqli_prepare($org_link, $fetch_query)) {
            mysqli_stmt_bind_param($stmt, "s", $user_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $menu_ids = [];

            while ($row = mysqli_fetch_assoc($result)) {
                $menu_ids = array_merge($menu_ids, explode(",", $row['menu_id']));
            }

            mysqli_stmt_close($stmt);

            echo json_encode(["status" => "success", "menus" => $menu_ids]);
            exit;
        }

        echo json_encode(["status" => "error", "message" => "No menus found."]);
        exit;
    }
}

mysqli_close($org_link);
?>
