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
                  <a class="nav-link active" aria-current="page" href="./admin.php">Home</a>
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
            <form class="d-flex" action="search_admin.php" method="POST">
               <input class="form-control me-2" type="search" placeholder="Search" name="Search" aria-label="Search">
               <button class="btn btn-outline-success" type="submit">Search</button>
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
         $select_query = "SELECT * FROM commodity ORDER BY id";
         $result = mysqli_query($conn, $select_query);
         if (mysqli_num_rows($result) > 0) {
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
         }
         ?>

      </div>
   </div>

   <section class="contact">
      <div class="container">
         <div class="row">
            <div class="col-lg-5 text-center m-auto">
               <h1>Contact us</h1>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-9">
               <div class="row">
                  <div class="col-lg-4">
                     <h6>Location</h6>
                     <p>470 Bach Mai, Hai Ba Trung, Hanoi</p>
                  </div>
                  <div class="col-lg-4">
                     <h6>Telephone</h6>
                     <p>0987345126</p>
                  </div>
                  <div class="col-lg-4">
                     <h6>Hours</h6>
                     <p>8:00 - 22:00 Mon - Fri | 9:00 - 20:00 Sat & Sun</p>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
   </section>
</body>

</html>