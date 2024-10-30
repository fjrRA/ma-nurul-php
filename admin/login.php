<?php
session_start();

// Hardcoded username and password for demonstration
$valid_username = "admin"; // Change to your username
$valid_password = "password"; // Change to your password

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the credentials are correct
    if ($username === $valid_username && $password === $valid_password) {
        // Set session variable
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        // Redirect to index.php
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Username atau Password salah. Silakan coba lagi.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - SDN 2 SUKAMULYA</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a69ac);
            font-family: 'Open Sans', sans-serif;
            color: #fff;
        }
        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }
        .navbar {
            text-align: center;
            margin-bottom: 20px;
        }
        .navbar-brand {
            font-size: 28px;
            font-weight: bold;
            color: #1e3c72;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #1e3c72; /* Adjusted to match the theme */
        }
        label {
            margin-top: 10px;
            font-weight: bold;
            color: #1e3c72; /* Adjusted to match the theme */
        }
        p {
            text-align: center; 
            color: #2a69ac; /* Changed color for the paragraph */
            font-weight: 500; /* Added a bit more weight for emphasis */
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            transition: border 0.3s;
        }
        input:focus {
            border-color: #1e3c72;
            outline: none;
            box-shadow: 0 0 5px rgba(30, 60, 114, 0.5);
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #1e3c72; /* Primary button color */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 15px;
            transition: background 0.3s;
        }
        .btn:hover {
            background-color: #153a60; /* Darker shade for hover effect */
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg mx-auto">
            <a class="navbar-brand" href="#">SDN 2 SUKAMULYA</a>
        </nav>
        <main class="main-content">
            <h3>Selamat datang</h3>
            <p>Silahkan masuk untuk melanjutkan</p> <!-- Text color changed here -->
            <form role="form" action="login.php" method="POST">
                <label>Username</label>
                <input name="username" type="text" class="form-control" placeholder="Username" required>
                <label>Password</label>
                <input name="password" type="password" class="form-control" placeholder="Password" required>
                <button type="submit" class="btn">Masuk</button>
            </form>
        </main>
        <footer class="footer">
            <p>&copy; 2024 SDN 2 Sukamulya. Fand.</p>
        </footer>
    </div>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>
</html>
