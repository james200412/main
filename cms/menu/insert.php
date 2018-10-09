<?php  
include('../../db/dbconnect.php');

      $name = mysqli_real_escape_string($connect, $_POST["adname"]); 
      $detail = mysqli_real_escape_string($connect, $_POST["adetail"]); 
      $type = mysqli_real_escape_string($connect, $_POST["atype"]); 
      $price = mysqli_real_escape_string($connect, $_POST["adprice"]); 
      $activate = mysqli_real_escape_string($connect, $_POST["activate1"]); 


      $target_dir = "../../img/menu/";
      $target_file = $target_dir . basename($_FILES["aimage"]["name"]);
      $imagetodb = "/img/menu/". basename($_FILES["aimage"]["name"]);


      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["aimage"]["tmp_name"]);
          if($check !== false) {
            //  echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
          //    echo "File is not an image.";
          echo "<script type='text/javascript'>alert('File is not an image');</script>";
              $uploadOk = 0;
          }
      }
      // Check if file already exists
      if (file_exists($target_file)) {
        echo "<script type='text/javascript'>alert('Sorry, file already exists');</script>";
      //    echo "Sorry, file already exists.";
          $uploadOk = 0;
      }
      // Check file size
      if ($_FILES["aimage"]["size"] > 500000) {
        echo "<script type='text/javascript'>alert('Sorry, your file is too large');</script>";
        //  echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {

 echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed');</script>";
        //  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {

        echo "<script type='text/javascript'>alert('Sorry, your file was not uploaded');</script>";
         // echo "Sorry, your file was not uploaded.";

      // if everything is ok, try to upload file
      } else {
          if (move_uploaded_file($_FILES["aimage"]["tmp_name"], $target_file)) {
            echo "<script type='text/javascript'>alert('File uploaded');</script>";

           //   echo "The file ". basename( $_FILES["aimage"]["name"]). " has been uploaded.";


              $query = "  
              INSERT INTO TBMENU(dname, dprice, dtype, detail, activate, dimage)  
              VALUES('$name', '$price', '$type',  '$detail', '$activate', '$imagetodb');  
              ";  
              mysqli_query($connect, $query);


          } else {
            echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file');</script>";
             // echo "Sorry, there was an error uploading your file.";
          }
      }


 ?>