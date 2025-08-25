<?php
// validate.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $email = $_POST['email'] ?? ''; 
    $password = $_POST['password'] ?? ''; 
    
    if (empty($email) || empty($password)) {
        die("email or password cannot be empty.");
    }
    // Database connection
    $conn = new mysqli("localhost", "root", "", "ride_login");
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare SQL query
    $stmt = $conn->prepare("SELECT password FROM users1 WHERE email = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Fetch stored hashed password
    if ($row = $result->fetch_assoc()) {
        $stored_hash = trim($row['password']); 
    
        // Debugging output
       // var_dump($password);
        //var_dump($stored_hash);
    
        if ($password==$stored_hash) {
            echo   "<script>alert('Login successful!');</script>";
           header("Location: in.php");
    
            
        } else {
            echo "<script>alert('Invalid credentials!');</script>";
        }
    } else {
        echo "<script>alert('User not found.');</script>";  }
    
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
    <link rel="stylesheet" type="text/css" href="css/login.css">
    
</head>
<body>

<script>
    const togglePassword = document.querySelector("#togglePassword");
    const passwordField = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
        const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
        passwordField.setAttribute("type", type);

        this.classList.toggle("fa-eye");
        this.classList.toggle("fa-eye-slash");
    });
</script>


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
                    <form  method="POST" action="login1.php">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input    class="form-control input_user" placeholder="Email"  type="email"  id="email" name="email" required>
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key" style="font-size: 14px;"></i></span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control input_pass" placeholder="password" required>
                        <!--    <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                                </span>
                            </div> -->
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <input type="submit" value="Login" name="button" class="btn login_btn" >
                        </div>
                    </form>
                </div>

                <div class="mt-4 text-white">
                    <div class="d-flex justify-content-center links">
                        Don't have an account?&nbsp;&nbsp;<a href="signup1.php" class="ml-2" style="text-decoration: snow; color: white;"><span class="regLink">SignUp now</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>