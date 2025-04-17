<?php
$conn = mysqli_connect("localhost", "root", "", "test");
if (!$conn) {
   echo "Kết nối thất bại!";
   exit();
}

function clean_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>