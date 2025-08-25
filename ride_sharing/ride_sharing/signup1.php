<?php
// signup.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);

    // Server-side validation
    if (empty($email) || empty($password) || empty($confirmPassword)) {
        die('All fields are required.');
    }

    if ($password !== $confirmPassword) {

        echo  "<script>alert('Password and Confirm Password do not match..');</script>";
        die('Password and Confirm Password do not match..');
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'ride_login');

    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Insert into database
    $stmt = $conn->prepare('INSERT INTO users1 (email, password) VALUES (?, ?)');      
    $stmt->bind_param('ss', $email, $password);

    if ($stmt->execute()) {
        //echo  'Signup successful!';
        header("Location: login1.php");
        exit();

    } else {
        echo 'Error: ' . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TrioBikes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.1/js/v4-shims.js"></script>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<body>

<div id="wrapper">
    <!-- NAVBAR -->


    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="https://iconape.com/wp-content/png_logo_vector/user-circle.png" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="signup1.php" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" name="email" id="email" class="form-control input_user" placeholder="email" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key" style="font-size: 14px;"></i></span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control input_pass" placeholder="password"  required>
                        </div>
                        <div class="input-group mb-1">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key" style="font-size: 14px;"></i></span>
                            </div>
                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control input_pass" placeholder="confirm password" required>
                        </div>
                        <span style="color: white;">Register as:</span>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="flexRadioDefault" id="passenger" checked>
                            <label for="passenger" class="form-check-label" style="color: white;">
                                passenger
                            </label>
                        </div>
                       <div class="form-check">
                            <input type="radio" class="form-check-input" name="flexRadioDefault" id="driver">
                            <label for="driver" class="form-check-label" style="color: white;">
                                driver
                            </label>
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <input type="submit" value="SignUp" name="button" class="btn login_btn">
                        </div> 
                    </form>
                </div>

                <div class="text-white mt-2">
                    <div class="d-flex justify-content-center links">
                        Already have an account?&nbsp;&nbsp;<a href="login1.php" class="ml-2" style="text-decoration: snow; color: white;"><span class="regLink">Login here</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>