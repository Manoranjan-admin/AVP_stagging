<?php


class AccessSettings
{

    public function getAllRoles()
    {
        $query = "SELECT * FROM erp_role_master";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getAllMenuWithRoleAccess($data)
    {
        $roleId = intval($data['role_id']);
        $query = "SELECT 
                    acp.*,
                    JSON_ARRAYAGG(
                        JSON_OBJECT(
                            'action_id', ac.pk_action_id,
                            'action_label', ac.action_label,
                            'access_status', COALESCE(acs.access_status, 0),
                            'page_status', COALESCE(acp.page_status, 0),
                            'acp_id', acp.pk_acp_id
                        )
                        ORDER BY acp.menu_order
                    ) AS actions
                    -- GROUP_CONCAT(CONCAT(ac.action_label, '||', COALESCE(acs.access_status, 0), '||',  COALESCE(acp.page_status, 0), '||',  COALESCE(acp.pk_acp_id, 0)) SEPARATOR ', ') as check_boxes
                FROM erp_access_pages acp
                INNER JOIN erp_actions ac ON ac.pk_action_id = acp.fk_action_id
                LEFT JOIN erp_access_settings acs ON acs.fk_acp_id = acp.pk_acp_id AND fk_role_id = '$roleId'
                WHERE acp.visibility = 1
                GROUP BY acp.root_menu, acp.sub_menu
                ORDER BY acp.menu_order";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function updateAccess($data)
    {
        $roleId = intval($data['role_id']);
        $acpId = intval($data['pk_acp_id']);
        $status = intval($data['checkbox_status']);
        $userId = 0; // Replace with logged-in user ID if available

        // Check if record already exists
        $query = "SELECT pk_acs_id FROM erp_access_settings WHERE fk_role_id = '$roleId' AND fk_acp_id = '$acpId'";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);

        if (!$result) {
            return ['success' => false, 'message' => mysqli_error($GLOBALS["___mysqli_ston"])];
        }

        if (mysqli_num_rows($result) > 0) {
            // Record exists, update it
            $updateQuery = "UPDATE erp_access_settings 
                            SET access_status = '$status', 
                                updated_on = NOW(), 
                                updated_by = '$userId' 
                            WHERE fk_role_id = '$roleId' AND fk_acp_id = '$acpId'";
            $updateResult = mysqli_query($GLOBALS["___mysqli_ston"], $updateQuery);

            if ($updateResult) {
                return ['success' => true, 'message' => 'Access updated successfully'];
            } else {
                return ['success' => false, 'message' => mysqli_error($GLOBALS["___mysqli_ston"])];
            }
        } else {
            // Record does not exist, insert new
            $insertQuery = "INSERT INTO erp_access_settings 
                            (fk_role_id, fk_acp_id, access_status, created_on, created_by, updated_on, updated_by, visibility) 
                            VALUES ('$roleId', '$acpId', '$status', NOW(), '$userId', NOW(), '$userId', 1)";
            $insertResult = mysqli_query($GLOBALS["___mysqli_ston"], $insertQuery);

            if ($insertResult) {
                return ['success' => true, 'message' => 'Access added successfully'];
            } else {
                return ['success' => false, 'message' => mysqli_error($GLOBALS["___mysqli_ston"])];
            }
        }
    }


    // public function getAllSettings($data)
    // {

    //     $resArr = [];

    //     $roleId = intval($data['role_id']);

    //     $Qry1 = "SELECT * 
    //             FROM erp_access_settings WHERE fk_role_id = $roleId GROUP BY menu_one";
    //     $Res1 = mysqli_query($GLOBALS["___mysqli_ston"], $Qry1);
    //     $resArr['menu1'] = mysqli_fetch_all($Res1, MYSQLI_ASSOC);

    //     $Qry2 = "SELECT * FROM erp_access_settings WHERE fk_role_id = $roleId GROUP BY menu_two";
    //     $Res2 = mysqli_query($GLOBALS["___mysqli_ston"], $Qry2);
    //     $resArr['menu2'] = mysqli_fetch_all($Res1, MYSQLI_ASSOC);

    //     return $resArr;
    //     // $query = "SELECT * FROM erp_access_settings acs 
    //     //         INNER JOIN erp_actions act ON act.pk_action_id = acs.fk_action_id  
    //     //         WHERE fk_role_id = ?";
    // }
    // public function getAllSettings($data)
    // {
    //     $roleId = $data['role_id'];

    //     $query = "SELECT * FROM erp_access_settings acs 
    //             INNER JOIN erp_actions act ON act.pk_action_id = acs.fk_action_id  
    //             WHERE fk_role_id = ?";
    //     $stmt = mysqli_prepare($GLOBALS["___mysqli_ston"], $query);

    //     mysqli_stmt_bind_param($stmt, "i", $roleId);
    //     mysqli_stmt_execute($stmt);

    //     $result = mysqli_stmt_get_result($stmt);
    //     return mysqli_fetch_all($result, MYSQLI_ASSOC);
    // }
}
