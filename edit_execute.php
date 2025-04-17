<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["edit_fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check whether a file uploaded is an image
if (!isset($_POST['edit_fileToUpload'])) {
   if (isset($_POST['edit_item'])) {
      $check = getimagesize($_FILES["edit_fileToUpload"]["tmp_name"]);
      if ($check === false) {
         
         echo "<script>alert('*tệp không hợp lệ*')</script>";
         echo "<script>window.location='./edit.php'</script>";
         $uploadOk = 0;
      } else {
         $uploadOk = 1;
      }
   }

   // Check wherther th e file uploaded is exsisted
   if (file_exists($target_file)) {
  
   echo "<script>alert('*tệp đã tồn tại*')</script>";
   echo "<script>window.location='./edit.php'</script>";
   $uploadOk = 0;
   }

   // Limit file size < 3mb
   if ($_FILES['edit_fileToUpload']['size'] > 3072000) {
 
   echo "<script>alert('tệp quá nặng, không hợp lệ*')</script>";
   echo "<script>window.location='./edit.php'</script>";
   $uploadOk = 0;
   }

   // Set rules for file format
   if ($imageFileType != "jpg" 
   && $imageFileType != "png" 
   && $imageFileType != "jpeg") {
   
   echo "<script>alert('*tệp không hợp lệ*')</script>";
   echo "<script>window.location='./edit.php'</script>";
   $uploadOk = 0;
   }

   if ($uploadOk == 0) {
     
      echo "<script>alert('*tệp không hợp lệ*')</script>";
      echo "<script>window.location='./edit.php'</script>";
   } else {
      $id = $_GET['id'];
      $fName = $_POST["edit_name"];
      $category = $_POST['edit_category'];
      $quantity = $_POST['edit_quantity'];
      $price = $_POST['edit_price'];
      $tem_imgName = $_FILES["edit_fileToUpload"]['name'];
      // Connect to database
      include 'config.php';
      $query = "UPDATE food SET name = '$fName', category = '$category', image = '$tem_imgName', quantity = '$quantity', price = '$price' WHERE id = '$id'";
      $sql = mysqli_query($conn, $query);
      // Close the connection
      mysqli_close($conn);
      if (!$sql) {
        
         echo "<script>alert('*xin lỗi, chỉnh sửa không thành công*')</script>";
         echo "<script>window.location='./edit.php'</script>";
      } else {
         move_uploaded_file($_FILES['edit_fileToUpload']['tmp_name'], $target_file);
         echo "<script>alert('chỉnh sửa thành công!')</script>";
         echo "<script>window.location='./edit.php'</script>";
      }
   }
} else {
   $id = $_GET['id'];
   $fName = $_POST["edit_name"];
   $category = $_POST['edit_category'];
   $quantity = $_POST['edit_quantity'];
   $price = $_POST['edit_price'];
   // Connect to database
   include 'config.php';
   $query = "UPDATE commodity SET name = '$fName', category = '$category', quantity = '$quantity', price = '$price' WHERE id = '$id'";
   $sql = mysqli_query($conn, $query);
   // Close the connection
   mysqli_close($conn);
   if (!$sql) {
      echo "<script>alert('*xin lỗi, chỉnh sửa không thành công*')</script>";
      echo "<script>window.location='./list_of_product.php'</script>";
   } else {
      echo "<script>alert('chỉnh sửa thành công!')</script>";
      echo "<script>window.location='./list_of_product.php'</script>";
   }
}



   
