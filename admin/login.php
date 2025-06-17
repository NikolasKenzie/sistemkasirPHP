<?php 
session_start();
require __DIR__ . "/../config/function.php";
require_once "../config/database.php";

if(isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}
if(isset($_POST['btnSubmit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = query("SELECT * FROM akun_admin WHERE username = '$username'");
  
  if (!empty($result)) {
    $user = $result[0];
    if ($password === $user['password']) {
      $_SESSION['login'] =  $username;
      header("Location: index.php");
      exit;
    } else {
      echo "
        <script>alert('akses ditolak')</script>
      ";
    }
  } else {
    echo "
        <script>alert('akses ditolak')</script>
      ";

  }
}


?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet"href='assets/login.css'>
  <title>Admin Login</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <section class="login-section">
    <div class="login-container">
      <h2>Login Admin</h2>
      <form action="" method="POST" id="form-login">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" required />
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required />
        </div>
        <button type="submit" class="btn-login" name="btnSubmit">Login</button>
      </form>
    </div>
  </section>
</body>
</html>
