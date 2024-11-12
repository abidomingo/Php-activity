<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COCCAINA MUZZ Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    /* Custom Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background: #24232a;
    }
    .container {
      position: relative;
      width: 380px;
      background: #030013;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    }
    .container::before, .container::after {
      content: "";
      position: absolute;
      width: 380px;
      height: 420px;
      top: -50%;
      left: -50%;
      background: linear-gradient(0deg, transparent, #fe03f6, #fe03f6);
      transform-origin: bottom right;
      animation: rotateBorder 7s linear infinite;
      z-index: -1;
    }
    .container::after {
      background: linear-gradient(0deg, transparent, #2376f5, #2376f5);
      animation-delay: 3.5s;
    }
    @keyframes rotateBorder {
      100% {
        transform: rotate(360deg);
      }
    }
    .login-box {
      position: relative;
      background: #24232a;
      border-radius: 8px;
      padding: 50px 40px;
      z-index: 10;
      color: #fff;
    }
    .login-box h2 {
      text-align: center;
      color: #fe03f6;
      margin-bottom: 30px;
    }
    .user-box {
      margin-bottom: 20px;
    }
    .user-box input, .user-box select {
      width: 100%;
      padding: 15px 10px;
      background: transparent;
      border: none;
      border-bottom: 2px solid #fe03f6;
      color: #fe03f6;
      outline: none;
    }
    .user-box input::placeholder, .user-box select {
      color: #fe03f6;
    }
    .btn-signin {
      width: 100%;
      padding: 10px;
      background-color: #fe03f6;
      border: none;
      color: #fff;
      font-weight: bold;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
    }
    .btn-signin:hover {
      background-color: #2376f5;
    }
    .notification {
      max-width: 350px;
      margin: 20px auto;
      text-align: center;
    }
  </style>
</head>
<body>

  <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $userLists = [
        'Admin' => [
            'Admin' => 'Admin',
            'Abi' => 'maganda'
        ],
        'Content Manager' => [
            'Casey' => 'dellamas',
            'Shane' => 'kulot'
        ],
        'System User' => [
            'Carlo' => 'brightness'
        ]
    ];

    $notificationMessage = '';
    $notificationClass = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-signin'])) {
        $selectedType = $_POST['slctUserType'];
        $inputUsername = $_POST['inputUsername'];
        $inputPassword = $_POST['inputPassword'];
        
        $isValidUser = isset($userLists[$selectedType][$inputUsername]) && $userLists[$selectedType][$inputUsername] === $inputPassword;

        if ($isValidUser) {
            $notificationMessage = "Welcome to the system, " . htmlspecialchars($inputUsername) . "!";
            $notificationClass = 'alert-success';
        } else {
            $notificationMessage = "Invalid Username or Password.";
            $notificationClass = 'alert-danger';
        }
    }
  ?>

  <div class="container">
    <!-- Notification alert box -->
    <?php if (!empty($notificationMessage)): ?>
      <div class="alert <?php echo $notificationClass; ?> alert-dismissible fade show notification" role="alert">
        <?php echo $notificationMessage; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <!-- Login box -->
    <div class="login-box">
      <h2>Login</h2>
      <form method="post">
        <div class="user-box">
          <select name="slctUserType" required class="form-select mb-3">
            <option value="Admin">Admin</option>
            <option value="Content Manager">Content Manager</option>
            <option value="System User">System User</option>
          </select>
        </div>
        <div class="user-box">
          <input type="text" name="inputUsername" placeholder="Username" required>
        </div>
        <div class="user-box">
          <input type="password" name="inputPassword" placeholder="Password" required>
        </div>
        <button type="submit" name="btn-signin" class="btn-signin">Sign in</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
