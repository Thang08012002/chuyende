<?php
// Connect to database
include 'config.php';

$email = $_POST['email'];
$telephone = $_POST['telephone'];
$full_name = $_POST['full_name'];
$password = $_POST['password'];
$address = $_POST['address'];

// Validate: name inputed: only allow a-z A-Z and space 
if (!preg_match("/^[a-zA-Z-' ]*$/", $full_name)) {
   echo "<script>alert('*tên không hợp lệ*')</script>";
   echo "<script>window.location='sign_up.php'</script>";
} else {

   // Create query syntax and execute
   $select_user_account = "SELECT * FROM user_account where email = '$email' OR telephone = '$telephone'";
   $select_result = mysqli_query($conn, $select_user_account);
   if ($select_result) {

      // Check whether an account exsists
      if (mysqli_num_rows($select_result) != 0) {
         echo "<script>alert('*email hoặc số điện thoại đã tồn tại*')</script>";
         echo "<script>window.location='sign_up.php'</script>";
      } else {

         // Create insert syntax and execute
         $insert_user_account = "INSERT INTO user_account 
         (full_name, telephone, email, password, role, address) VALUES 
         ('$full_name',  '$telephone', '$email', '$password', 'user', '$address')";
         $insert_result = mysqli_query($conn, $insert_user_account);
         
         // Close the connection
         mysqli_close($conn);
         // Alert whether an account is created successfully 
         if ($insert_result) {
            echo "<script>alert('đã đăng ký thành công')</script>";
            echo "<script>window.location='index.php'</script>";
         } else {
            echo "<script>alert('*xin lỗi, đăng ký không thành công*')</script>";
            echo "<script>window.location='sign_up.php'</script>";
         }
      }
   } else {

      // Alert if query syntax went wrong
      echo "<script>alert('*xin lỗi, đăng ký không thành công*')</script>";
      echo "<script>window.location='sign_up.php'</script>";
   }  
}
?>