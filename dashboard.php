<?php
session_start();
// Database connection (assuming MySQL with PDO)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['user'])) {
    echo "<script>
            alert('Please log in to access the dashboard.');
            window.location.href = 'login.php';
          </script>";
    exit;
}

// Get the user's name from the session
$userName = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
            margin: 0;
        }
        .dashboard-container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .dashboard-container h1 {
            margin-bottom: 20px;
            font-size: 28px;
        }
        .dashboard-container p {
            font-size: 18px;
        }
        .dashboard-container a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .dashboard-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <h1>Welcome, <?php echo htmlspecialchars($userName); ?>!</h1>
    <p>This is your personalized dashboard.</p>
    <a href="logout.php">Log Out</a>
</div>

</body>
</html>