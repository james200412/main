<?php
session_start(); 
$userid123 = $_SESSION["userid"];

include ('db/dbconnect.php');

if (isset($_POST['submit'])) {
	$name = $_POST['name']; 
	$email = $_POST['email'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
    $mdpw = md5($_POST['password']);

$_SESSION["username"] = $name;

        $query = "SELECT * FROM TBUSER WHERE uemail = '$email'";
        $result = mysqli_query($connect, $query);        
        $row = mysqli_fetch_array($result);
        $num = mysqli_num_rows($result);
$rowid = $row['id'];



        if ($num == 1 && $rowid == $userid123 || $num == 0) { // If no existing user is using this email.

           $query = "UPDATE TBUSER SET 
           uname = '$name', 
           uaddress = '$address', 
           uemail = '$email', 
           uphone = '$phone', 
           upassword = '$mdpw' 
           WHERE id = '$userid123'";
        
           $result12 = mysqli_query($connect, $query);

            if (mysqli_affected_rows($connect) == 1) {               
                //If the Insert was successful.
echo "<script type='text/javascript'>alert('Account Information Updated!');</script>";
                include 'index.php';
                mysqli_close($connect);
                exit;
                
            }
echo "<script type='text/javascript'>alert('No Change Apply!');</script>";
    include 'index.php';
    mysqli_close($connect);
    exit;

        }else { 
            // The email is not available.

echo "<script type='text/javascript'>alert('Email has been registered before, please use other email address.');</script>";
    include 'index.php';
    mysqli_close($connect);
    exit;
}
    exit;
}

?>