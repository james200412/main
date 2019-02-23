<?php
session_start();

$_SESSION['userlevel'];


if ($_SESSION['userlevel'] == 0) {
    header("Location: index.php");
}
else if ($_SESSION['userlevel'] == 1 || $_SESSION['userlevel']== 2) {

    include 'db/dbconnect.php';
    $uidsession = $_SESSION["userid"];

     $query512 = "SELECT * FROM TBUSER WHERE id = $uidsession AND activate = 1";  
     $result512 = mysqli_query($connect, $query512);
     $num123 = mysqli_num_rows($result512);

  if($num123 > 0){
     mysqli_close($connect);  
    }else{
        session_destroy();
        mysqli_close($connect);  
        header('Location: cms_stafflogin.php');
    }


}else{

    header('Location: index.php');
}

?>