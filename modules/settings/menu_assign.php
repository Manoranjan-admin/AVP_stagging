<div class="content-wrapper" style="min-height: 1342.88px;">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Settings</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                        <li class="breadcrumb-item active">Settings</li>

                    </ol>

                </div>

            </div>

        </div>

    </section>



    <div class="row">

        <div class="col-xl-5 col-lg-6 col-md-6">

            <form id="assignMenuForm" method="POST">

                <div class="d-flex">

                    <?php

                    include("../../includes/db_config.php");



                    $query = "SELECT * FROM erp_admin_master";

                    $result = mysqli_query($org_link, $query);



                    if (mysqli_num_rows($result) > 0) {

                    ?>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="txt_fields"> User </label>

                            <select id="txt_fields" name="user" class="form-control">

                                <option value="">--Select user--</option>

                                <?php while ($data = mysqli_fetch_array($result)) { ?>

                                <option value="<?= htmlspecialchars($data["user_name"]) ?>"
                                    data-userid="<?= htmlspecialchars($data["user_id"]) ?>"
                                    data-rollid="<?= htmlspecialchars($data["fk_role_id"]) ?>">

                                    <?= htmlspecialchars($data["user_name"]) ?>

                                </option>

                                <?php } ?>

                            </select>

                        </div>

                    </div>

                    <input type="hidden" id="user_id">

                    <input type="hidden" id="roll_id">

                    <?php } ?>



                    <div class="col-md-4 mt-4">

                        <button type="submit" id="assignForm" class="btn btn-primary">Assign Menu</button>

                    </div>

                </div>



                <div class="col-md-8">

                    <div class="card card-primary">

                        <div class="card-body p-2 d-flex flex-wrap overflow-y-auto scrollspy-example"
                            style="min-height: 200px; max-height: 650px; overflow-y: auto;">

                            <?php

    // Fetch all menus ordered by menu_order

    $query = "SELECT * FROM `erp_menu` WHERE menu_visibility = 1 ORDER BY menu_order ASC";

    $result = mysqli_query($org_link, $query);



    $menus = [];

    $menuTree = [];



    // Store all menu items in an associative array

    while ($menu = mysqli_fetch_assoc($result)) {

        $menus[$menu['pk_menu_id']] = $menu;

        $menus[$menu['pk_menu_id']]['children'] = [];

    }



    // Assign child menus under their respective parent

    foreach ($menus as $id => $menu) {

        if ($menu['fk_parent_id'] == 0) {

            $menuTree[$id] = &$menus[$id]; // Store parents at the root level

        } else {

            $menus[$menu['fk_parent_id']]['children'][] = &$menus[$id]; // Assign children to parent

        }

    }



    // Recursive function to display menu hierarchy

    function renderMenu($menuItems, $indent = 0)

    {

        foreach ($menuItems as $menu) {

            echo '<div class="col-md-12">';

            echo '<div class="form-group form-check">';

            echo '<input type="checkbox" class="form-check-input menu-checkbox" 

                    name="menus[]" value="' . $menu['pk_menu_id'] . '" 

                    id="menu_' . $menu['pk_menu_id'] . '">';

            echo '<label class="form-check-label" for="menu_' . $menu['pk_menu_id'] . '">';

            echo str_repeat('&nbsp;&nbsp;', $indent) . htmlspecialchars($menu["menu_name"]);

            echo '</label>';

            echo '</div>';



            // Render child menus (if any)

            if (!empty($menu['children'])) {

                echo '<div class="pl-4">';

                renderMenu($menu['children'], $indent + 1);

                echo '</div>';

            }



            echo '</div>';

        }

    }



    // Render the menu tree

    renderMenu($menuTree);

    ?>

                        </div>



                    </div>

                </div>

            </form>

        </div>

    </div>

</div>



<script>
$(document).ready(function() {

    $("#txt_fields").change(function() {

        let selectedOption = $(this).find(":selected");

        let user_id = selectedOption.data("userid");

        let roll_id = selectedOption.data("rollid");



        $("#user_id").val(user_id);

        $("#roll_id").val(roll_id);



        if (user_id) {

            $.ajax({

                url: "http://staging.rishidhkannan.com/modules/settings/ajax_menusave.php",

                type: "POST",

                data: {
                    user_id,
                    mode: "fetchmenus"
                },

                dataType: "json",

                success: function(response) {

                    $(".menu-checkbox").prop("checked", false);

                    if (response.status === "success" && response.menus.length > 0) {

                        response.menus.forEach(menu_id => {

                            $("#menu_" + menu_id).prop("checked", true);

                        });

                    }

                }

            });

        }

    });



    $("#assignMenuForm").submit(function(e) {

        e.preventDefault();



        let user_id = $("#user_id").val();

        let roll_id = $("#roll_id").val();

        let menus = $("input[name='menus[]']:checked").map(function() {

            return $(this).val();

        }).get();



        if (!user_id || menus.length === 0) {

            alert("Please select a user and at least one menu.");

            return;

        }



        $.ajax({

            url: "http://staging.rishidhkannan.com/modules/settings/ajax_menusave.php",

            type: "POST",

            data: {
                user_id,
                roll_id,
                menus,
                mode: "assignmenu"
            },

            dataType: "json",

            success: function(response) {

                alert(response.message);

                if (response.status === "success") {

                    $("#assignMenuForm")[0].reset();

                }

            }

        });

    });

});
</script>