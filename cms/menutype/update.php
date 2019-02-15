<?php  
include('../../db/dbconnect.php');

      $name = $_POST["edname"]; 
      $activate =  $_POST["eactivate"]; 

if(isset($_POST["dishid1"])){  
    $dishid = $_POST["dishid1"];
          $c_update="update TBMENUTYPE set dtname='$name', activate='$activate'
           where id='$dishid'";
      }

mysqli_query($connect, $c_update);

header("Location: ../../cms_menu_type_manage.php");
exit;
 ?>