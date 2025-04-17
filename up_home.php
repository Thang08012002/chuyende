<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>fashion | Staff</title>

   <!-- Bootsrtap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <!-- CSS -->
   <link rel="stylesheet" href="./up_home_style.css">
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fuild">
         <a class="navbar-brand" href="#">Fashion | Admin | Add product</a>

         <a href="list_of_product.php" class="btn btn-outline-success" role="button">list of product</a>
         <a href="./admin.php" class="btn btn-outline-danger" role="button">back</a>
      </div>
     
   </nav>
   <div class="container">
      <img src="./image/logo/fashion.png" alt="logo" class="mb-3">
      <form class="uploadForm" action="uploads.php" method="POST" enctype="multipart/form-data">
         <input class="uploadField mb-2" type="text" name="name" placeholder="tên sản phẩm" required><br>

<select class="uploadField mb-2" name="category" required>
    <option value="" disabled selected>Chọn loại sản phẩm</option>
    <option value="Quần áo">Quần áo</option>
    <option value="Giày dép">Giày dép</option>
    <option value="Phụ kiện">Phụ kiện</option>
    <option value="Túi xách">Túi xách</option>
    <option value="Thể thao">Thể thao</option>
</select>


         <input class="uploadField form-control" type="file" name="fileToUpload" required><br>

         <input class="uploadField mb-2" type="number" name="quantity" placeholder="So luong" min="1" required><br>
         <input class="uploadField mb-2" type="text" name="price" placeholder="giá sản phẩm ($)" required><br>

         <input class="uploadField btn btn-outline-success" type="submit" name="upload" value="thêm sản phẩm">
      </form>
   </div>   
</body>
</html>