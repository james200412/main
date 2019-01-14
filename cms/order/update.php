<?php  
include('../../db/dbconnect.php');

      $name = mysqli_real_escape_string($connect, $_POST["edname"]); 
      $detail = mysqli_real_escape_string($connect, $_POST["edetail"]); 
      $type = mysqli_real_escape_string($connect, $_POST["etype"]); 
      $price = mysqli_real_escape_string($connect, $_POST["edprice"]); 
      $activate = mysqli_real_escape_string($connect, $_POST["eactivate"]); 

//      $imagetodb = "/img/menu/". basename($_FILES["eimage"]["name"]);
$dishid= $_POST["dishid1"];
$c_image= $_FILES['eimage']['name'];
$c_image_temp=$_FILES['eimage']['tmp_name'];

if(isset($_POST["dishid1"]))  
{  
    if($c_image_temp != "")
      {
          move_uploaded_file($c_image_temp , "../../img/menu/$c_image");
          $c_update="update TBMENU set dname='$name', detail='$detail', dtype='$type',  dprice= '$price', dimage='/img/menu/$c_image', activate='$activate'
           where id='$dishid'";   


           $query5 = "SELECT dimage FROM TBMENU WHERE id = $dishid";
           $result5 = mysqli_query($connect, $query5);
           $row5 = mysqli_fetch_array($result5);  
          
           unlink('../../'. $row['dimage']);


      }else
      {
          $c_update="update TBMENU set dname='$name', detail='$detail', dtype='$type', dprice= '$price', activate='$activate'
           where id='$dishid'";
      }
    }
mysqli_query($connect, $c_update);

echo $c_update;


header("Location: ../../cms_menu_manage.php");
exit;
 ?>