<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>PHP User Registration Form</title>
    <!-- jQuery + Bootstrap JS -->
 <link rel="stylesheet" href="stylesheet.css">
</head>

<body>

    <div class="container mt-5" style="max-width: 500px">
        <form action="register.php" method="post">
            <h3 class="text-center mb-5">User Registeration Form</h3>
            <div class="form-group">
                <label>First name</label>
                <input type="text" class="form-control" name="firstname" id="firstName" />
            </div>

            <div class="form-group">
                <label>Last name</label>
                <input type="text" class="form-control" name="lastname" id="lastName" />
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email" />
            </div>

            <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" name="mobile" id="mobilenumber" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="password" />
            </div>

            <div class="form-group">
                <label>Verify Password</label>
                <input type="password" class="form-control" name="password2" id="password2" />
            </div>
                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block">
                Register
            </button>
            <script>
                 // Get the error message passed from the query string
                let errorMessage = <?php echo json_encode($error); ?>;

                // Display the error message if it exists
                if (errorMessage) {
                document.getElementById("error-message").textContent = errorMessage;
                }
            </script>
        </form>
    </div>

</body>

</html>