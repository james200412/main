<?php
if(!isset($_REQUEST['id'])){
    header("Location: index.php");
}
$requestid = $_REQUEST['id'];
// include database configuration file
include 'db/dbconnect.php';

// get order details by order ID
$query = "SELECT odate FROM TBORDER WHERE id = '$requestid'";
$result = mysqli_query($connect, $query);
$crow = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SC & FOOD | Thank You For your Ordering!</title>
    <meta charset="utf-8">

</head>
</head>
<body>
<div class="container">
    <h3>Order Placed</h3>

    <p>Your order has placed successfully. </p>
    <p>Order ID is #<?php echo $_GET['id']; ?></p>
    <?php
$timecrow = $crow['odate'];

$minutes_to_add = 90;
$time = new DateTime($timecrow);
$time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

$stamp = $time->format('Y-m-d H:i');

$time2 = new DateTime($timecrow);
$stamp2 = $time2->format('Y-m-d H:i');

echo 'Ordered Time : '.$stamp2.'';
?>
</p>
<?php
echo 'Estimated Delivery Time : '.$stamp.'';
    ?>



</div>
</body>
</html>




