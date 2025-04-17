<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>fashion | Login</title>

   <!-- Bootsrtap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <!-- CSS -->
   <link rel="stylesheet" href="./up_home_style.css">
</head>

<body>
   <div class="text-center container">
      <form action="sign_up_verify.php" method="POST">
         <img src="./image/logo/fashion.png" alt="logo" class="mb-3">
         <input type="text" name="full_name" class="form-control mb-2" placeholder="họ tên" required autofocus>

         <input type="tel" name="telephone" class="form-control mb-2" placeholder="số điện thoại: 0*********" pattern="[0]{1}[0-9]{8}[1-9]{1}" required autofocus>

         <input type="email" name="email" class="form-control mb-2" placeholder="Email: abc@gmail.com" required autofocus>

         <input type="password" name="password" class="form-control mb-2" placeholder="mật khẩu" required autofocus>

         <input type="text" name="address" class="form-control mb-2" placeholder="địa chỉ" required autofocus>

         <div class="d-grid mb-1">
            <input class="btn btn-outline-success" type="submit" name="sign_up" value="đăng ký">
         </div>
         <h6>bạn đã có tài khoản? <a class="register_link" href="index.php">đăng nhập ngay</a></h6>
      </form>
   </div>
</body>

</html>