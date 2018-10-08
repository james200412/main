<?php  
include('db/dbconnect.php');


 if(!empty($_POST))  
 {  
 
      $message = '';  
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      $image = mysqli_real_escape_string($connect, $_POST["image"]);  
      $price = mysqli_real_escape_string($connect, $_POST["price"]);        
      $type = mysqli_real_escape_string($connect, $_POST["type"]); 
      $detail = mysqli_real_escape_string($connect, $_POST["detail"]);  
      $activate = mysqli_real_escape_string($connect, $_POST["activate"]); 



      $target_dir = "img/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {

        if($_POST["submit"]=="insert"){
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
   
              $uploadOk = 1;
          } else {

              echo '<script language="javascript">';
              echo 'alert("File is not an image.")';
              echo '</script>';

              $uploadOk = 0;
          }
      // Check if file already exists
      if (file_exists($target_file)) {

          echo '<script language="javascript">';
          echo 'alert("Sorry, file already exists.")';
          echo '</script>';

          $uploadOk = 0;
      }
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {

          echo '<script language="javascript">';
          echo 'alert("Sorry, your file is too large.")';
          echo '</script>';
          $uploadOk = 0;
      }
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {

          echo '<script language="javascript">';
          echo 'alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")';
          echo '</script>';


          $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {

          echo '<script language="javascript">';
          echo 'alert("Sorry, your file was not uploaded.")';
          echo '</script>';

      // if everything is ok, try to upload file
      } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";



//insert
$query = "  
INSERT INTO TBMENU(dname, dimage, dprice, dtype, detail, activate)  
VALUES('$name', '$target_file', '$price',  '$type', '$detail', '$activate');  
";  

if(mysqli_query($connect, $query))  
{  
$select_query = "SELECT * FROM TBMENU ORDER BY ID DESC";  
$result = mysqli_query($connect, $select_query);  

while($row = mysqli_fetch_array($result)){}
}  


} else {

echo '<script language="javascript">';
echo 'alert("Sorry, there was an error uploading your file.")';
echo '</script>';
}
}
}}
}


?>
