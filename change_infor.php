<?php
// Kiểm tra nếu có yêu cầu sửa thông tin
if (isset($_POST['edit_item'])) {
    // Lấy dữ liệu từ form
    $id = $_GET['id'];  // id sẽ được lấy từ URL
    $full_name = $_POST['edit_full_name'];
    $telephone = $_POST['edit_telephone'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $address = $_POST['edit_address'];

    // Kết nối tới cơ sở dữ liệu
    include 'config.php';

    // Câu truy vấn cập nhật thông tin
    $query = "UPDATE food SET full_name = '$full_name', telephone = '$telephone', email = '$email', password = '$password', address = '$address' WHERE id = '$id'";

    // Thực thi câu truy vấn
    $sql = mysqli_query($conn, $query);

    // Đóng kết nối
    mysqli_close($conn);

    // Kiểm tra kết quả của câu truy vấn
    if ($sql) {
        echo "<script>alert('Cập nhật thông tin thành công!')</script>";
        echo "<script>window.location='./change.php'</script>";  // Chuyển hướng về trang change.php
    } else {
        echo "<script>alert('Cập nhật thông tin thất bại!')</script>";
        echo "<script>window.location='./change.php'</script>";  // Chuyển hướng về trang change.php
    }
} else {
    echo "<script>alert('Yêu cầu không hợp lệ!')</script>";
    echo "<script>window.location='./change.php'</script>";
}
?>
