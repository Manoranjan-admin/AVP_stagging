<?php

//error_reporting(E_ALL);



session_start();

include "../../includes/db_config.php";

include "../../classes/class_order_status.php";

include "../../classes/class_sale_order.php";



$obj_saleestimate = new Order_status('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');



$obj_saleorder = new Sale_order('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');





if (isset($_POST['mode']) && $_POST['mode'] == 'getJobOrderStatus') {

    $obj_saleestimate->setcustomer_id($_POST['id']);

    $status = $obj_saleestimate->getJobOrderStatus();

    echo json_encode($status);
}



if (isset($_POST['mode']) && $_POST['mode'] == 'getSOValues') {



    $soid = implode(',', $_POST['soid']);



    $getSOId = $obj_saleorder->getSalesOrderById($soid);



    $datas = mysqli_fetch_array($getSOId);

    $scproduct = array();

    if (!empty($datas)) {



        $getSOProducts = $obj_saleorder->getSalesOrderProductByPROId($soid);



        while ($datass = mysqli_fetch_array($getSOProducts)) {

            $sop_id = $datass['pk_sop_id'];

            //$obj_saleorder->setSQId($_POST['soid']);

            $getSOProduct = $obj_saleorder->getSalesOrderProductById($sop_id);

            while ($data = mysqli_fetch_array($getSOProduct)) {

                $scproduct[] = $data;
            }
        }
    }



    echo json_encode(array($datas, $scproduct));
}



if (isset($_POST['mode']) && $_POST['mode'] == 'getSEEditValues') {



    $getSEId = $obj_saleestimate->getSalesEstimateById($_POST['eid']);



    $datas = mysqli_fetch_array($getSEId);



    $scproduct = array();

    if (!empty($datas)) {

        $getSEProducts = $obj_saleestimate->getSalesEstimateProductByPROId($_POST['eid']);



        while ($datass = mysqli_fetch_array($getSEProducts)) {

            $getSEProduct = $obj_saleestimate->getSalesEstimateProductById($datass['PK_SEP_ID']);

            while ($data = mysqli_fetch_array($getSEProduct)) {

                $scproduct[] = $data;
            }
        }
    }

    echo json_encode(array($datas, $scproduct));
}

if (isset($_POST['mode']) && $_POST['mode'] == 'changeOrderStatus') {



    $txt_date = str_replace('/', '-', $_POST['txt_date']);
    $ids = explode(',', $_POST['txt_sc_no']);

    foreach ($ids as $singleId) {


        $obj_saleestimate->setreference_number($_POST['txt_createdby']);

        $obj_saleestimate->setcustomer_id($_POST['txt_comments']);

        $obj_saleestimate->setstatus($_POST['txt_status']);

        $obj_saleestimate->setso_id($singleId);

        $obj_saleestimate->seteno($_POST['typId']);

        $obj_saleestimate->setsdate(date('Y-m-d', strtotime($_POST['txt_date'])));

        $getSEId = $obj_saleestimate->changeOrderStatus();

        if ($getSEId > 0) {

            if ($_POST['txt_status'] == 6) {

                $getSEId = $obj_saleestimate->updateOrderStatus();



                /*  if(isset($_POST['typId']) && $_POST['typId'] == 1)

            {

                $getSEId = $obj_saleestimate->updateEstimateCommstatusDelivered();

    

            }else  if(isset($_POST['typId']) && $_POST['typId'] == 2){

                $getSEId = $obj_saleestimate->updateEstimateNonCommstatusDelivered();

            }*/
            }

            if (isset($_POST['typId']) && $_POST['typId'] == 1) {

                $getso = $obj_saleestimate->updateEstimateCommstatus();
            } else  if (isset($_POST['typId']) && $_POST['typId'] == 2) {

                $getso = $obj_saleestimate->updateEstimateNonCommstatus();
            }





            echo 1;
        } else {

            echo 0;
        }
    }
}

if (isset($_POST['mode']) && $_POST['mode'] == 'OrderStatusTable') {



    $status = $obj_saleestimate->OrderStatusTable();
}

mysqli_close($GLOBALS["___mysqli_ston"]);
