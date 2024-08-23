<?php
// Database connection (assuming MySQL with PDO)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";
session_start();
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['login'])) {
        // Get form data
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        // Error handling
        $errors = [];

        // Check if email and password fields are filled
        if (empty($email) || empty($password)) {
            $errors[] = "Email and password are required.";
        }

        if (empty($errors)) {
            // Check if the email exists in the database
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Verify the password
                if (password_verify($password, $user['password'])) {
                    // Successful login
                    $_SESSION['user'] = $user['firstname']; // Store user's name in the session
                    echo "<script>
                            alert('Login successful!');
                            window.location.href = 'dashboard.php'; // Redirect to a dashboard or another page
                          </script>";
                } else {
                    $errors[] = "Invalid email or password.";
                }
            } else {
                $errors[] = "Invalid email or password.";
            }
        }

        // Display errors if any
        if (!empty($errors)) {
            $errors = json_encode($errors);
            echo "<script>
                    let errors = $errors;
                    errors.forEach(function(error) {
                        alert(error);
                    });
                  </script>";
        }
    }
} catch (PDOException $e) {
    echo "<script>
            alert('Connection failed: " . addslashes($e->getMessage()) . "');
          </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<div class="login-form">
   
    <form action="login.php" method="POST">
         <h2>Login</h2>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    <p>Don't have an account? <a href="index.php">Register here</a>.</p>
    </form>
    
</div>

</body>
</html>