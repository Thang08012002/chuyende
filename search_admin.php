<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>fashion | Home page</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!-- CSS -->
   <link rel="stylesheet" href="./style.css">
</head>

<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
         <a class="navbar-brand" href="#"><img src="./image/logo/fashion.png" width="60px" alt="logo"></a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="./user_home.php">home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="./change.php">Change information</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="./sign_up_staff.php">Add admin</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" href="./list_of_product.php">List of product</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" href="./up_home.php">Add product</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./index.php">log out</a>
               </li>
            </ul>
            <form class="d-flex" action="Search.php" method="POST">
               <input class="form-control me-2" type="search" placeholder="Search" name="Search" aria-label="Search">
               <input class="btn btn-outline-success" type="submit"value="Search">
            </form>
         </div>
      </div>
   </nav>

   <section class="main">
      <div class="container py-5">
         <div class="row py-4">
            <div class="col-lg-7 pt-5 ">
               <h1></h1>
               <button class="btn1 mt-3 text-center"><a href="#list_item" style="color: aliceblue;text-decoration: none;">Order now</a></button>
            </div>
         </div>
      </div>
   </section>

   <div class="container py-5">
      <div class="row py-5 m-auto text-center">
         <h1>Bán quần áo là bán cái đẹp nhưng người bán sẽ không bớt đẹp còn người mua thì đẹp hơn</h1>
         <h6>...</h6>
      </div>
   </div>



   <div id="list_item" class="container-fluid">
   <div class="row row-cols-2 row-cols-md-4 g-4">
      <?php
      // Lấy từ khóa tìm kiếm từ POST và làm sạch dữ liệu
      $Search = mysqli_real_escape_string($conn, $_POST['Search']);
      
      // Cập nhật câu lệnh SQL để tìm kiếm tên bắt đầu với từ khóa tìm kiếm
      $select_query = "SELECT * FROM commodity WHERE name LIKE ?";
      
      // Chuẩn bị câu truy vấn
      $stmt = mysqli_prepare($conn, $select_query);
      
      // Thêm dấu "%" vào từ khóa để tìm kiếm theo ký tự đầu
      $searchTerm = $Search . "%";  // Lọc các tên bắt đầu với từ khóa tìm kiếm
      
      // Liên kết các tham số với câu truy vấn
      mysqli_stmt_bind_param($stmt, 's', $searchTerm);
      
      // Thực thi câu truy vấn
      mysqli_stmt_execute($stmt);
      
      // Lấy kết quả từ câu truy vấn
      $result = mysqli_stmt_get_result($stmt);

      // Kiểm tra xem có sản phẩm nào không
      if (mysqli_num_rows($result) > 0) {
         // Duyệt qua các sản phẩm tìm thấy và hiển thị
         while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col">
                  <div class="card h-100">
                     <img src="./uploads/<?= $row['image']; ?>" height="500px" class="card-img-top" id="img" alt="...">
                     <div class="card-body align-items-end"> 
                        <h5 class="card-title"><?= $row['name']; ?></h5>
                        <h6>Quantity: <a class="card-title"><?= $row['quantity']; ?></a></h6>       
                        <h6 class="card-title"><?= $row['price']; ?>$</h6>
                        <td>
                            <a href="./admin.php?remove=action&item_id=<?= $row['id']; ?>"
                                role="button" 
                                class="btn btn-outline-danger" 
                                onclick="return confirm('Are you sure you want to remove this item?');">
                                Remove
                            </a>
                            <form action="./edit.php?original_id=<?= $row['id']; ?>&original_name=<?= $row['name']; ?>&original_category=<?= $row['category']; ?>&original_quantity=<?= $row['quantity']; ?>&original_price=<?= $row['price']; ?>" method="post">
                                <input type="submit" class="btn btn-outline-warning" value="Edit">
                            </form>
                         </td>
                     </div>
                  </div>
               </div>
      <?php }
      } else {
         // Nếu không có kết quả nào, hiển thị thông báo
         echo "<p class='text-center w-100'>Không tìm thấy sản phẩm nào phù hợp.</p>";
      }
      
      // Đóng câu truy vấn sau khi sử dụng
      mysqli_stmt_close($stmt);
      ?>
   </div>
</div>
