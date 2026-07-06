<?php
include_once '../config/dbconnect.php';

$posts = json_decode( file_get_contents( 'php://input' ) );
$action = base64_decode( $posts->action );
if ( isset( $action ) && $action == 'qrscannerstatus' )
{
    $esdataval = explode( '#', $posts->dataval );
    $qruser_id = $_SESSION[ 'qruser_id' ];
    $qrroleId= $_SESSION[ 'qrroleId' ];
    $result = mysqli_query( $GLOBALS[ '___mysqli_ston' ], "SELECT * FROM verified_status where fk_est_id= '$esdataval[1]' and created_by = '$qruser_id'" );
    $resultval = mysqli_num_rows( $result );
    if ( $resultval == 0 ) {
        $insert = mysqli_query( $GLOBALS[ '___mysqli_ston' ], "INSERT INTO verified_status ( fk_est_id, order_number, order_type, status, created_by,fk_userrole_id)   VALUES ('$esdataval[1]','$esdataval[0]','$esdataval[2]','1','$qruser_id','$qrroleId')" );

        if( $insert )
        {
            echo json_encode(1);
            //mysqli_error( $GLOBALS[ '___mysqli_ston' ] );
        } else {
            echo json_encode(0);
        }
    } else {
        echo json_encode( 2 );
    }
}

?>