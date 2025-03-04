<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SignIn</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    body {
      background: linear-gradient(135deg, #6a0dad, #ff4b5c, #00bcd4); /* Gradien tiga warna */
      background-size: 400% 400%;
      animation: gradientAnimation 10s ease infinite;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Animasi gradien bergerak */
    @keyframes gradientAnimation {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .form-signin {
      max-width: 400px;
      width: 100%;
    }

    .card {
      background: rgba(0, 0, 0, 0.7); /* Overlay hitam transparan */
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3), 0 4px 6px rgba(255, 255, 255, 0.1);
    }

    .card h1 {
      font-size: 1.8rem;
      margin-bottom: 20px;
      text-align: center;
      color: #fff;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .btn-purple {
      background-color: #712cf9;
      border-color: #712cf9;
      color: #fff;
      font-weight: bold;
      transition: all 0.3s ease-in-out;
    }

    .btn-purple:hover {
      background-color: #5a23c8;
      border-color: #5a23c8;
      transform: translateY(-2px);
    }

    .form-floating label {
      color: #712cf9;
    }

    .form-floating input {
      background-color: #333;
      color: #fff;
      border: none;
      border-radius: 8px;
    }

    .form-floating input:focus {
      background-color: #444;
      border-color: #712cf9;
      box-shadow: 0 0 5px rgba(113, 44, 249, 0.8);
    }

    .form-text {
      color: #bbb;
      font-size: 0.9rem;
      margin-top: 10px;
    }

    .card-footer {
      text-align: center;
      color: #bbb;
      font-size: 0.9rem;
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <main class="form-signin">
    <div class="card">
      <h1>Welcome Back</h1>
      <form action="" method="post">
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
          <label for="floatingPassword">Password</label>
        </div>
        <button class="btn btn-purple w-100 py-2" type="submit" name="submit">Sign in</button>
      </form>
      <div class="card-footer mt-4">
        <p>&copy; 2025 | Teknologi Informasi</p>
      </div>
    </div>
  </main>

  <?php
  if (isset($_POST['submit'])) {
    include 'koneksi.php';
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $login = mysqli_query($db, "SELECT * FROM user WHERE email='$email' AND password='$password'");

    $data_login = mysqli_fetch_array($login);

    $hasil_login = mysqli_num_rows($login);

    if ($hasil_login != 0) {
      session_start();
      $_SESSION['nama'] = $data_login['full_name'];
      $_SESSION['user_id'] = $data_login['id'];
      $_SESSION['level'] = $data_login['level'];
      header('location:admin/index.php?p=home');
    }
  }
  ?>
</body>

</html>
