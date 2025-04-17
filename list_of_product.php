<?php
include './config.php';
if (isset($_GET['remove'])) {
   if ($_GET['remove'] == 'action') {
      $item_id = $_GET['item_id'];
      $delete_query = "DELETE FROM commodity WHERE id= '$item_id'";
      $result = mysqli_query($conn, $delete_query);
      if ($result) {
         echo "<script>alert('id sản phẩm: " . $item_id . " đã được xóa')</script>";
         echo "<script>window.location='./list_of_product.php'</script>";
      } else {
         echo "<script>alert('*xin lỗi, xóa id sản phẩm không thành công *')" . $item_id . "</script>";
      }
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <!-- Bootsrtap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!-- CSS -->
   <link rel="stylesheet" href="./up_home_style.css">
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fuild">
         <a class="navbar-brand" href="#">fashion | admin | list of product</a>
         <a href="admin.php" class="btn btn-outline-success" role="button">back</a>
      </div>
      <form class="d-flex" action="Search.php" method="POST">
               <input class="form-control me-2" type="search" placeholder="Search" name="Search" aria-label="Search">
               <input class="btn btn-outline-success" type="submit" value="Search">
            </form>
            
   </nav>
   <h1>list of product</h1>
   <table class="table">
      <thead>
         <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">name</th>
            <th scope="col">type</th>
            <th scope="col">quantity</th>
            <th scope="col">price ($)</th>
            <th scope="col">interact</th>
         </tr>
      </thead>
      <tbody>
         <?php
         $select_query = "SELECT * FROM commodity";
         $result = mysqli_query($conn, $select_query);
         while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
               <th scope="row"><?= $row['id']; ?></th>
               <td><img width="100px" src="./uploads/<?= $row['image']; ?>" alt=""></td>
               <td><?= $row['name']; ?></td>
               <td><?= $row['category']; ?></td>
               <td><?= $row['quantity']; ?></td>
               <td><?= $row['price']; ?></td>
               <td>
                  <a href="./list_of_product.php?remove=action&item_id=<?= $row['id']; ?>"
                     role="button" 
                     class="btn btn-outline-danger" 
                     onclick="return confirm('Are you sure you want to remove this item?');">
                     Remove
                  </a>
                  <form action="./edit.php?original_id=<?= $row['id']; ?>&original_name=<?= $row['name']; ?>&original_category=<?= $row['category']; ?>&original_quantity=<?= $row['quantity']; ?>&original_price=<?= $row['price']; ?>" method="post">
                     <input type="submit" class="btn btn-outline-warning" value="Edit">
                  </form>
               </td>
            </tr>
         <?php
         }
         ?>
      </tbody>
   </table>
</body>
</html>