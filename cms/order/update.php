<?php
include('../../db/dbconnect.php');

if(isset($_POST['submit']) && isset($_POST['postorderid'])){

if(isset($_POST['selectstatus'])){
$orderid = $_POST['postorderid'];
$status = $_POST['selectstatus'];

    $query = "UPDATE TBORDER SET  
    status = '$status' 
    WHERE id='$orderid'";

    $result = mysqli_query($connect, $query);

    header('Location: ../../cms_order_manage.php');

}
die('error no status');
}
die('error no id');
?>