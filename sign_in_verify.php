<?php
// Connect to database
include 'config.php';
// Clean input
$password = $_POST['password'];
$email = $_POST['email'];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   echo "<script>alert('*email không hợp lệ*')</script>";
   echo "<script>window.location='index.php'</script>";
} else {
   // Create query systax and execute
   $query = "SELECT * FROM user_account WHERE email = '$email' AND password = '$password'";
   $result = mysqli_query($conn, $query);

   // Check query result
   if (!$result) {
      echo "<script>alert('*đăng nhập thất bại*')</script>";
      echo "<script>window.location='index.php'</script>";
   } else {
      // Check if account exsists
      if (mysqli_num_rows($result) != 1) {
         echo "<script>alert('*tài khoản hoặc mật khẩu chưa chính xác*')</script>";
         echo "<script>window.location='index.php'</script>";
      } else {
         // Drect user to corresponding page
         while ($row = mysqli_fetch_assoc($result)) {
            if ($row['role'] == 'user') {
               header("Location: user_home.php");
            } else {
               header("Location: admin.php");
            }
         }
      }
   }
}
?>

