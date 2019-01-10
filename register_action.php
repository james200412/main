<?php

include ('db/dbconnect.php');

if (isset($_POST['submit'])) {

	$name = $_POST['name']; 
	$email = $_POST['email'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
    $password = $_POST['password'];



        $query = "SELECT * FROM TBUSER  WHERE uemail ='$email'";
		$result = mysqli_query($connect, $query);
		$num = mysqli_num_rows($result);


        if ($num == 0) { // If no existing user is using this email.

            $query = "INSERT INTO TBUSER (uname, uemail ,uaddress ,uphone ,upassword, ulevel) 
			VALUES ( '$name', '$email', '$address', '$phone', '$password', '0')";

			$result = mysqli_query($connect, $query);
			
            if (mysqli_affected_rows($connect) == 1) {               
                //If the Insert was successful.

                // Send an email, Do it in future

                // Finish the page:

echo "<script type='text/javascript'>alert('Thank you for registering! You Can now login with your account!');</script>";

                include 'front_login.php';
                mysqli_close($connect);
				exit;
            } 

        } else { 
            // The email is not available.
//			echo '<div class="errormsgbox" >Email has been registered before, please use other email address.</div>';

echo "<script type='text/javascript'>alert('Email has been registered before, please use other email address.');</script>";

			include 'register.php';

        }

    mysqli_close($connect);
}

?>