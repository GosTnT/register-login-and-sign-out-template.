<?php
// Database connection (assuming MySQL with PDO)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['submit'])) {
        // Get form data
        $firstname = trim($_POST['firstname']);
        $lastname = trim($_POST['lastname']);
        $email = trim($_POST['email']);
        $mobile = trim($_POST['mobile']);
        $password = trim($_POST['password']);
        $password2 = trim($_POST['password2']);

        // Error handling
        $errors = [];

        // Check if all fields are filled
        if (empty($firstname) || empty($lastname) || empty($email) || empty($mobile) || empty($password) || empty($password2)) {
            $errors[] = "All fields are required.";
        }

        // Check if passwords match
        if ($password !== $password2) {
            $errors[] = "Passwords do not match.";
        }

        // Check password length
        if (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters long.";
        }

        // Check for duplicate email
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        if ($stmt->rowCount() > 0) {
            $errors[] = "The email address is already registered.";
        }

        // If no errors, proceed with registration
        if (empty($errors)) {
            // Hash the password before storing it
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user into the database
            $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, mobile, password) VALUES (:firstname, :lastname, :email, :mobile, :password)");
            $stmt->execute([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'mobile' => $mobile,
                'password' => $hashedPassword
            ]);

            // Show success message and redirect to index.php
            echo "<script>
                    alert('Registration successful!');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            // Convert the PHP array of errors to a JavaScript array
            $errors = json_encode($errors);
            echo "<script>
                    let errors = $errors;
                    errors.forEach(function(error) {
                        alert(error);
                    });
                    window.location.href = 'index.php'; // Redirect to index.php after displaying errors
                  </script>";
        }
    }
} catch (PDOException $e) {
    echo "<script>
            alert('Connection failed: " . addslashes($e->getMessage()) . "');
            window.location.href = 'index.php';
          </script>";
}
?>