<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    foreach ($users as $id => $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $_SESSION['user_id'] = $id;
            header('Location: dashboard1.php');
            exit;
        }
    }
    $error = 'Username atau password salah';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>

  <link rel="stylesheet" href="style2.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
</head>

<body>
  <main>
    <nav>
      <div class="nav-left">
        <img src="gambar/logo.png" alt="" />
      </div>
      <div class="nav-right">
        <a href="">LOGIN</a>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
          <path
            fill="#D20000"
            fill-opacity="1"
            d="M0,192L80,208C160,224,320,256,480,256C640,256,800,224,960,218.7C1120,213,1280,235,1360,245.3L1440,256L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
        </svg>
      </div>
    </nav>
  </main>

  <div class="login">
    <svg width="100%" viewBox="0 0 1440 1629" fill="none" xmlns="http://www.w3.org/2000/svg" class="svg-login">
      <path
        fill-rule="evenodd"
        clip-rule="evenodd"
        d="M904 0H80C35.8172 0 0 35.8172 0 80V1549C0 1593.18 35.8173 1629 80 1629H1360C1404.18 1629 1440 1593.18 1440 1549V239L1117.42 390.006C1056.42 418.562 1001.2 341.381 1047.93 292.867C1085.08 254.289 1057.74 190 1004.18 190H976.505C936.461 190 904 157.539 904 117.495V0Z"
        fill="#333333" />
    </svg>

    <div class="form-login">
      <div class="rleft">
        <img src="gambar/login2.png" width=40%;>
      </div>
      <div class="container-left">
        <form action="" method="POST">
          <div class="form-group">
            <label for="nama">Username : </label>
            <input type="text" name="username" required><br>
          </div>
          <div class="form-group">
            <label for="kata-sandi">Kata Sandi : </label>
            <input type="text" name="password" required><br>
          </div>
          <button type="submit">SUBMIT</button>
        </form>
      </div>
      <div class="container-right">
        <h2>CREATE YOUR ACCOUNT</h2>
      </div>
    </div>
  </div>
</body>

<?php if (isset($error)): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>

</script>
</html>