<?php 



?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet"href='assets/style/login.css'>
  <title>Login</title>
</head>
<body>
  <section class="login-section">
    <div class="login-container">
      <h2>Login</h2>
      <form action="" method="POST" id="form-login">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" required />
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required />
        </div>
        <div class="contaier-islogin">
            <p>Belum punya akun?<a>Sign In</a></p>
        </div>
        <button type="submit" class="btn-login" name="btnSubmit">Login</button>
      </form>
    </div>
  </section>
</body>
</html>
