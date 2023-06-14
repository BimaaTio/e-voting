<?php
session_start();
require 'config/functions.php';
if (isset($_POST['masuk'])) {
  $email = $_POST['credentials'];
  $username = $_POST['credentials'];
  $pass  = $_POST['pass'];

  $cek = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' || username = '$username'");
  if (mysqli_num_rows($cek) === 1) {
    $row = mysqli_fetch_assoc($cek);
    if ($row['level'] === 'admin') {
      if (password_verify($pass, $row['password'])) {
        $_SESSION['logAdmin'] = true;
        $_SESSION['uid'] = $row['uid'];
      }
      header("Location:dashboard/admin/?hal=");
      exit;
    }
    if ($row['level'] === 'guru') {
      if (password_verify($pass, $row['password'])) {
        $_SESSION['logGuru'] = true;
        $_SESSION['uid'] = $row['uid'];
      }
      header("Location:dashboard/guru/?hal=");
      exit;
    }
    if ($row['level'] === 'super') {
      if (password_verify($pass, $row['password'])) {
        $_SESSION['loginSuper'] = true;
        $_SESSION['uid'] = $row['uid'];
      }
      header("Location:dashboard/sa/?hal=");
      exit;
    }
  }
  $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="assets/img/smk.png" type="image/x-icon">
  <!-- CSS Lib -->
  <link rel="stylesheet" href="assets/css/bs.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <title>E-Voting</title>
</head>

<body class="text-center">
  <main class="form-signin w-100 m-auto">
    <form method="post">
      <img class="mb-4" src="assets/img/smk.png" alt="" width="200" height="200">
      <?php if (isset($error)) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Oops</strong> Email / Password salah!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
      <h1 class="h3 mb-3 fw-normal">Login E-Voting</h1>
      <div class="form-floating">
        <input name="credentials" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating">
        <input name="pass" type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit" name="masuk">Masuk</button>
      <p class="mt-5 mb-3 text-muted">© 2023</p>
    </form>
  </main>
  <!-- JS Lib -->
  <script src="assets/js/bs.js"></script>
</body>

</html>