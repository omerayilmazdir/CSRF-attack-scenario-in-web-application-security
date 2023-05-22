<?php
require __DIR__ . '/database.php';
if (isset($_POST) && count($_POST) > 0) {
    $user_name = $_POST['user_name'] ?? false;
    $user_password = $_POST['user_password'] ?? false;

    if ($user_name && $user_password) {
        $query = $db->prepare('SELECT * FROM users WHERE user_name = :user_name && user_password = :user_password');
        $query->execute([
             'user_name' => $user_name,
             'user_password'=>$user_password
         ]);
        $user = $query->fetch(PDO:: FETCH_OBJ);
         if ($user){
            $_SESSION['login']= true;
            $_SESSION['username'] = $user->user_name;
            $_SESSION['id'] = $user->user_id; 
            header('Location:index.php');
             exit;
            }
         
        }
        
    }
                               
?>






<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Giriş Yap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="" method="post">
    <img class="mb-4" src="assets/brand/user.png" alt="" width="25%" height="25%">
    <h1 class="h3 mb-3 fw-normal">Kullanıcı Girişi</h1>

    <div class="form-floating">
      <input type="text" name="user_name" class="form-control" id="floatingInput" placeholder="Kullanıcı adı">
      <label for="floatingInput">Kullanıcı adı</label>
    </div>
    <div class="form-floating">
      <input type="password" name="user_password" class="form-control" id="floatingPassword" placeholder="Parola">
      <label for="floatingPassword">Parola</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Giriş yap</button>
    <p class="mt-5 mb-3 text-muted">&copy;2023</p>
  </form>
</main>

  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>












