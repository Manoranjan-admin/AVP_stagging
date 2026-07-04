<?php
error_reporting(0);
include "classes/class_order_status.php";
$obj_orderstatus = new Order_status('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

$obj_orderstatus->setso_id($_GET['id']);
$obj_orderstatus->setcustomer_id($_GET['typ']);

$checkCompletedStatus = $obj_orderstatus->getQRuserroledata();




$getSoval = array();
$hand= '';
if($_GET['typ'] == 1){
    $getSOdata = $obj_orderstatus->getEstimateCommdata();
    $getSoval = mysqli_fetch_array($getSOdata);
    $hand= 67;


}else if($_GET['typ'] == 2){
    $getSOdata = $obj_orderstatus->getEstimateNonCommdata();
    $getSoval = mysqli_fetch_array($getSOdata);

    $hand= 69;
}

      $statustitle =  (isset($_GET['typ']) && $_GET['typ'] == 1) ? 'Commercial' : 'Non Commercial';

?>
<div class="content-wrapper" style="min-height: 1342.88px;">


    <section class="my-5">
        <div class="container">
            <div class="main-body">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="top-status">
                                    <h5><?php echo $statustitle; ?> ORDER# - <?php echo $getSoval['sono']; ?></h5>

                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body p-0 table-responsive">
                                <h4 class="p-3 mb-0">Order </h4>
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order Number#</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php //var_dump($getSoval); ?>
                                            <th>
                                                <?php echo $getSoval['sono']; ?>
                                            </th>
                                            <td><?php //echo $getSoval['sale_date']; 
                                            $sale_date=strtotime($getSoval['sale_date']);
                                            echo date("d-m-Y", $sale_date); ?>  </td>
                                            <td><strong><?php echo $getSoval['grand_total']; ?></strong></td>
                                            <td><?php if($getSoval['bill_paid'] == 1) { echo '<span class="badge badge-success">PAID</span>'; } else{
                                                echo '<span class="badge badge-warning">NOT PAID</span>';
                                            } ?></span></td>
                                            <td><a href="index.php?erp=<?php echo $hand; ?>&id=<?php echo$getSoval['PK_ES_ID'];  ?>"
                                                    class="custom_btn_class btn btn-view" data-toggle="tooltip"
                                                    title="View" name="btnView"><span class="fa fa-eye"></span></a></td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">
                                                <span>Status:</span>
                                                <?php if($getSoval['bill_paid'] == 1) { echo '<span class="badge badge-success">PAID</span>'; } else{
                                                echo '<span class="badge badge-warning">NOT PAID</span>';
                                            } ?>
                                            </th>
                                            <td>
                                                <span class="text-muted">Total: </span>
                                                <strong><?php echo $getSoval['grand_total']; ?></strong>
                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body">
                                <h4>Order Status</h4>
                                <ul class="timeline">



                                    <?php if(mysqli_num_rows($checkCompletedStatus ) > 0) { 
                                //user_id
                                while($statusdata = mysqli_fetch_array($checkCompletedStatus)) {
                                    
                                  //  var_dump($statusdata);
                                  $obj_orderstatus->setso_id($_GET['id']);
                                  $obj_orderstatus->setcustomer_id($statusdata['pk_usrole_id']);
                                  $obj_orderstatus->setreference_number($_GET['typ']);
                           
                                  $QRalldata = $obj_orderstatus->getQRalldata();
                                  $QRalldataval =  mysqli_fetch_array($QRalldata );
                                  $addQrActive= "";
                                  $addverifieddate = "";
                                  $uname ="";
                                  $verifiedchk = "<span class='badge badge-warning'>NOT VERIFY</span>";
                                     if( !empty($QRalldataval)) {
                                        $addQrActive= "active";

                                        $qrdate=strtotime($QRalldataval['created_on']);

                                        $addverifieddate = "Verified date: ".date("d-m-Y h:i:s a", $qrdate);
                                        $uname = "<b>By ". $QRalldataval['user_name']."</b>";
                                        $verifiedchk = "<span class='badge badge-success'> VERIFIED</span>";
                                     }
                                ?>
                                    <li class="<?php echo  $addQrActive; ?>">
                                        <h6><?php echo $statusdata['name']; ?></h6>
                                        <p class="mb-0 text-muted"><?php echo $verifiedchk; ?></p>
                                        <p class="mb-0 text-muted"><?php echo $uname; ?></p>
                                        <p class="text-muted"> <?php echo $addverifieddate; ?></p>
                                    </li>

                                    <?php }
                                                } ?>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<style>
*,
*:before,
*:after {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

body {
    font-family: 'Nunito', sans-serif;
    color: #384047;
}



div#timeline {
    width: 80%;
    margin: 20px auto;
    position: relative;
}

div#timeline:before {
    content: '';
    display: block;
    position: absolute;
    left: 50%;
    top: 0;
    margin: 0 0 0 -2px;
    width: 2px;
    height: 100%;
    background: #f99b19;
}

div#timeline article {
    width: 100%;
    margin: 0 0 60px 0;
    position: relative;
}

div#timeline article:after {
    content: '';
    display: block;
    clear: both;
}

div#timeline article div.inner {
    width: 40%;
    float: left;
    margin: 5px 0 0 0;
    border-radius: 6px;
}

div#timeline article div.inner span.date {
    display: block;
    width: 111px;
    height: 103px;
    padding: 5px 0;
    position: absolute;
    top: 0;
    left: 47%;
    margin: 0 0 0 -25px;
    border-radius: 100%;
    font-size: 12px;
    font-weight: 900;
    text-transform: uppercase;
    background: #25303B;
    color: rgba(255, 255, 255, 0.5);
    border: 2px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 0 0 7px #25303B;
}

div#timeline article div.inner span.date span {
    display: block;
    text-align: center;
}

div#timeline article div.inner span.date span.day {
    font-size: 10px;
}

div#timeline article div.inner span.date span.month {
    font-size: 18px;
}

div#timeline article div.inner span.date span.year {
    font-size: 10px;
}

div#timeline article div.inner h2 {
    padding: 5px;
    margin: 0;
    color: #fff;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: -1px;
    border-radius: 6px 6px 0 0;
    position: relative;
}

div#timeline article div.inner h2:after {
    content: '';
    position: absolute;
    top: 20px;
    right: -5px;
    width: 10px;
    height: 10px;
    -webkit-transform: rotate(-45deg);
}

div#timeline article div.inner p {
    padding: 15px;
    margin: 0;
    font-size: 14px;
    background: #ececec;
    color: #656565;
    border-radius: 0 0 6px 6px;
}

div#timeline article:nth-child(2n+2) div.inner {
    float: right;
}

div#timeline article:nth-child(2n+2) div.inner h2:after {
    left: -5px;
}

div#timeline article:nth-child(1) div.inner h2 {
    background: #e74c3c;
}

div#timeline article:nth-child(1) div.inner h2:after {
    background: #e74c3c;
}

div#timeline article:nth-child(2) div.inner h2 {
    background: #2ecc71;
}

div#timeline article:nth-child(2) div.inner h2:after {
    background: #2ecc71;
}

div#timeline article:nth-child(3) div.inner h2 {
    background: #e67e22;
}

div#timeline article:nth-child(3) div.inner h2:after {
    background: #e67e22;
}

div#timeline article:nth-child(4) div.inner h2 {
    background: #1abc9c;
}

div#timeline article:nth-child(4) div.inner h2:after {
    background: #1abc9c;
}

div#timeline article:nth-child(5) div.inner h2 {
    background: #9b59b6;
}

div#timeline article:nth-child(5) div.inner h2:after {
    background: #9b59b6;
}

div#timeline article:nth-child(6) div.inner h2 {
    background: #17a2b8;
}

div#timeline article:nth-child(6) div.inner h2:after {
    background: #17a2b8;
}

.list-group-item.active {
    background: #ffc107;
}

/* end common class */
.top-status ul {
    list-style: none;
    display: flex;
    justify-content: space-around;
    justify-content: center;
    flex-wrap: wrap;
    padding: 0;
    margin: 0;
}

.top-status ul li {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: #fff;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    border: 8px solid #ddd;
    box-shadow: 1px 1px 10px 1px #ddd inset;
    margin: 10px 5px;
}

.top-status ul li.active {
    border-color: #ffc107;
    box-shadow: 1px 1px 20px 1px #ffc107 inset;
}

/* end top status */

ul.timeline {
    list-style-type: none;
    position: relative;
}

ul.timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    left: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;
}

ul.timeline>li {
    margin: 20px 0;
    padding-left: 86px;
}

ul.timeline>li:before {
    content: '\2713';
    background: #fff;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 0;
    left: 5px;
    width: 50px;
    height: 50px;
    z-index: 400;
    text-align: center;
    line-height: 50px;
    color: #d4d9df;
    font-size: 24px;
    border: 2px solid #d4d9df;
}

ul.timeline>li.active:before {
    content: '\2713';
    background: #28a745;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 0;
    left: 5px;
    width: 50px;
    height: 50px;
    z-index: 400;
    text-align: center;
    line-height: 50px;
    color: #fff;
    font-size: 30px;
    border: 2px solid #28a745;
}

/* end timeline */
</style>
<script src="assets/dist/js/os_serverdatatable_ajax.js?version="></script>
