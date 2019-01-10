<?php

include ('db/dbconnect.php');

if (isset($_POST['submit'])) {
	$name = $_POST['name']; 
	$email = $_POST['email'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
    $password = $_POST['password'];

         $query = "SELECT * FROM TBUSER WHERE uemail = '$email'";
		$result = mysqli_query($connect, $query);
		$num = mysqli_num_rows($result);


        if ($num < 1) { // If no existing user is using this email.

           $query = "UPDATE TBUSER SET 
           uname = '$name', 
           uaddress = '$address', 
           uemail = '$email', 
           uphone = '$phone', 
           upassword = '$password' 
           WHERE id = 55104";
        
           $result12 = mysqli_query($connect, $query);
			
            if (mysqli_affected_rows($connect) == 1) {               
                //If the Insert was successful.

echo "<script type='text/javascript'>alert('Account Information Updated!');</script>";

                include 'index.php';
                mysqli_close($connect);
				exit;
            } 

        } else { 
            // The email is not available.

echo "<script type='text/javascript'>alert('Email has been registered before, please use other email address.');</script>";
        

}

    mysqli_close($connect);
}

?>