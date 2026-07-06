<!DOCTYPE html>
<html>
<head>
    <title>AVP QR scanner</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="./assets/css/style.css"> </link>
    <link rel="stylesheet" href="./assets/css/style.scss"> </link>
   
    <link rel="stylesheet" href="./assets/css/jquery-ui.min.css" />
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="./assets/js/adapter.min.js">
    </script>
    <script type="text/javascript" src="./assets/js/vue.min.js"></script>
    <script type="text/javascript" src="./assets/js/instascan.min.js"></script>
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
</head>
<body>
    <?php
            include "./adminHeader.php";
       //     include "./sidebar.php";
            include_once "./config/dbconnect.php";
        ?>
        
    <div id="main-content" class="container allContent-section py-4">
        <div class="container">


            <div class="row">
            <div class="col-md-12 msgshow"></div>

                <div class="col-md-6 bordercamrec">
                    <div class="bordervid">
                        <video id="preview"  width="100%"></video>
                    </div>

                    <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
                        </label>
                    </div>
                </div>

                <div class="col-md-6">
                    <label><b>SCAN QR CODE</b></label>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Order Number:</label>
                        <div class="col-sm-8">
                            <span class="ord-no"> </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Order Type:</label>
                        <div class="col-sm-8">
                            <span class="ord-type"> </span>
                        </div>
                    </div>
                </div>
            </div>



        </div>

        <script>
        /*    let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });


    
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                alert('No cameras found');
            }

        }).catch(function(e) {
            console.error(e);
        });

        scanner.addListener('scan', function(c) {
            document.getElementById('text').value = c;
        });
*/

        $(document).ready(function() {
           
            var scanner = new Instascan.Scanner({
                video: document.getElementById('preview'),
                scanPeriod: 5,
                mirror: false
            });
            /*    scanner.addListener('scan', function(content) {
                    alert(content);
                    //window.location.href=content;
                });*/
            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                    $('[name="options"]').on('change', function() {
                        if ($(this).val() == 1) {
                            if (cameras[0] != "") {
                                scanner.start(cameras[0]);
                            } else {
                                //   alert('No Front camera found!');
                            }
                        } else if ($(this).val() == 2) {
                            if (cameras[1] != "") {
                                scanner.start(cameras[1]);
                            } else {
                                // alert('No Back camera found!');
                            }
                        }
                    });
                } else {
                    console.error('No cameras found.');
                    //  alert('No cameras found.');
                }
            }).catch(function(e) {
                console.error(e);
                // alert(e);
            });
            scanner.addListener('scan', function(c) {




                dataPayloadsub = JSON.stringify({
                    action: '<?php echo base64_encode('qrscannerstatus'); ?>',
                    dataval: c
                });
                $.ajax({
                    /*  type: "POST",
        dataType: "json",
        url: "controller/qrscannerController.php",
        data: {action: '<?php echo base64_encode('qrscannerstatus'); ?>',dataval : c},
*/
                    data: dataPayloadsub,
                    type: "POST",
                    url: "controller/qrscannerController.php",
                    dataType: "json",
                    contentType: "application/json; charset=utf-8",
                    // var json = JSON.stringify(dataO); 

                    /*   $.ajax({
                       type: "POST",
                       url: "controller/qrscannerController.php",
                       data: json,
                       contentType: "application/json; charset=utf-8",
                       dataType: "json",*/

                    /* $.ajax({
                         url: "controller/qrscannerController.php",

                       data: json,
                        type: 'POST',  // http method
                     // data: { myData: 'This is my data.' },  // data to submit
                         dataType: 'json',
                         cache: false,
                         contentType: false, // this one will turn your data into something like fooKey=fooData&barKey=barData
                         processData: false, // and this one will make it [object Object]:""*/
                    success: function(response) {
                        // console.log(response);
                        $('.msgshow').empty();
                        $('.msgshow').show();
                        if (response == 1) {

                            $('.msgshow').append(
                                '<span class="alert alert-success">Order has been scanned successfully</span>'
                                );
                            //  window.location.href = '../index.php';
                        } else if (response == 2) {

                            $('.msgshow').append(
                                '<span class="alert alert-danger">Already scanned this order</span>'
                                );
                            //  window.location.href = '../index.php';
                        } else if (response == 0) {
                            $('.msgshow').append(
                                '<span class="alert alert-danger">Something went wrong! Order not scanned. '
                                );
                        }
                        setTimeout(function() {
                            $('.msgshow').hide();
                        }, 5000);
                    },
                    error: function(response) {
                        console.log(response)
                    },
                    cache: !1,
                    contentType: !1,
                    processData: !1
                });
                //  document.getElementById('text').value = c;
                var res = c.split("#");
                $('.ord-no').empty();
                $('.ord-type').empty();
                $('.ord-no').append(res[0]);
                if (res[2] == 1) {
                    ordtype = "Commercial Estimate";
                } else {
                    ordtype = "Non Commercial Estimate";

                }
                $('.ord-type').append(ordtype);
                //console.log(res[2]);
            });


        });
        </script>


    </div>


    <style>

.bordervid {
  display: inline-block;
  position: relative;
  padding: 10px;
}

.bordervid:before,
.bordervid:after {

    height: 160px;
    width: 160px;
  position: absolute;
  content: '';
}

.bordervid:before {
  right: 0;
  top: 0;
  border-right: 10px solid #0097DB;
  border-top: 10px solid #0097DB;
}

.bordervid:after {
  left: 0;
  bottom: 7px;
  border-left: 10px solid #FFCB05;
    border-bottom: 10px solid #FFCB05;
}


    .bordercamrec {
        top: 18px;
    }

  
.inner_wrap {
  position: relative;
  padding:10px 40px;
  color:#FFFFFF;
  h1 {
    text-transform:uppercase;
    letter-spacing:1.5px;
    font-size:60px;
    text-align:left;
    line-height: 60px;
    margin:15px 0 10px 0;
    font-weight:500;
  }
  p {
    margin:0 0 15px 0;
    letter-spacing:1.6px;
    font-weight:300;
    span {
      font-size:0.75rem;
      text-decoration:line-through;
      color:#ff8379;
    }
  }
  span.border_btm {
    &:after {
      display: block;
      content: "";
      width: 30px;
      height: 30px;
      position: absolute;
      bottom: -10px;
      right: -10px;
      border-bottom: 3px solid #EA485D;
      border-right: 3px solid #EA485D;
    }
    &:before {
      display: block;
      content: "";
      width: 30px;
      height: 30px;
      position: absolute;
      bottom: -10px;
      left: -10px;
      border-bottom: 3px solid #EA485D;
      border-left: 3px solid #EA485D;
    }
  }
  &:before {
    display: block;
    content: "";
    width: 30px;
    height: 30px;
    position: absolute;
    top: -10px;
    left: -10px;
    border-top: 3px solid #EA485D;
    border-left: 3px solid #EA485D;
  }
  &:after {
    display: block;
    content: "";
    width: 30px;
    height: 30px;
    position: absolute;
    top: -10px;
    right: -10px;
    border-top: 3px solid #EA485D;
    border-right: 3px solid #EA485D;
  }
}

    </style>
    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>