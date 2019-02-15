<?php  
include('../../db/dbconnect.php');

      $name = $_POST["adname"];  
      $activate = $_POST["activate1"]; 

      if($_POST["insert"]) {
              $query = "  
              INSERT INTO TBMENUTYPE(dtname, activate)  
              VALUES('$name', '$activate');";  
              mysqli_query($connect, $query);
          } else {
            echo "<script type='text/javascript'>alert('Sorry, there was an error');</script>";
          }

header("Location: ../../cms_menu_type_manage.php");
exit;
 ?>