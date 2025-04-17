<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check whether a file uploaded is an image
if (isset($_POST['upload'])) {
   $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
   if ($check === false) {
      echo "<script>alert('*tệp không hợp lệ*')</script>";
      echo "<script>window.location='up_home.php'</script>";
      $uploadOk = 0;
   } else {
      $uploadOk = 1;
   }
}

// Check wherther th e file uploaded is exsisted
if (file_exists($target_file)) {
   echo "<script>alert('*tệp không hợp lệ*')</script>";
   echo "<script>window.location='up_home.php'</script>";
   $uploadOk = 0;
}

// Limit file size < 3mb
if ($_FILES['fileToUpload']['size'] > 3072000) {
   echo "<script>alert('tệp quá nặng, không hợp lệ*')</script>";
   echo "<script>window.location='up_home.php'</script>";
   $uploadOk = 0;
}

// Set rules for file format
if (
   $imageFileType != "jpg"
   && $imageFileType != "png"
   && $imageFileType != "jpeg"
) {
   echo "<script>alert('*tệp không hợp lệ*')</script>";
   echo "<script>window.location='up_home.php'</script>";
   $uploadOk = 0;
}

if ($uploadOk == 0) {
   echo "<script>alert('*tệp không hợp lệ*')</script>";
   echo "<script>window.location='up_home.php'</script>";
} else {
   $fName = $_POST["name"];
   $category = $_POST['category'];
   $price = $_POST['price'];
   $quantity = $_POST['quantity'];
   $tem_imgName = $_FILES["fileToUpload"]['name'];
   // Connect to database
   include 'config.php';
   $query = "INSERT into commodity (name, category, image, quantity, price) values ('$fName', '$category', '$tem_imgName','$quantity', '$price')";
   $sql = mysqli_query($conn, $query);
   // Close the connection
   mysqli_close($conn);
   if (!$sql) {
      echo "<script>alert('*xin lỗi, tệp không thể tải lên database*')</script>";
      echo "<script>window.location='up_home.php'</script>";
   } else {
      move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
      echo "<script>alert('đã tải lên thành công')</script>";
      echo "<script>window.location='up_home.php'</script>";
   }
}
