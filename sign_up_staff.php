<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Fashion | Staff</title>
   <!-- Bootsrtap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!-- CSS -->
   <link rel="stylesheet" href="./up_home_style.css">
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fuild">
         <a class="navbar-brand" href="#">Fashion | Admin | Add admin</a>
         <a href="admin.php" class="btn btn-outline-success" role="button">back</a>
      </div>
   </nav>
   <div class="text-center container">
      <form action="sign_up_staff_verify.php" method="POST">
         <img src="./image/logo/fashion.png" alt="logo" class="mb-3">
         <input type="text" name="full_name" class="form-control mb-2" placeholder="họ tên" required autofocus>

         <input type="tel" name="telephone" class="form-control mb-2" placeholder="số điện thoại: 0*********" pattern="[0]{1}[0-9]{8}[1-9]{1}" required autofocus>

         <input type="email" name="email" class="form-control mb-2" placeholder="Email: abc@gmail.com" required autofocus>

         <input type="password" name="password" class="form-control mb-2" placeholder="mật khẩu" required autofocus>

         <input type="text" name="address" class="form-control mb-2" placeholder="địa chỉ" required autofocus>

         <div class="d-grid mb-1">
            <input class="btn btn-outline-success" type="submit" name="sign_up" value="Register">
         </div>
      </form>
   </div>
</body>
</html>