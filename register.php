<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $default_role = 'user';

    // Compare passwords before hashing
    if ($password !== $confirmPassword) {
        echo '<script>
        alert("Password does not match!");
        window.location.href="register.php";
        </script>';
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Check if user already exists
    $check_user_query = "SELECT * FROM member WHERE email = '$email'";
    $check_user_result = mysqli_query($conn, $check_user_query);

    if (mysqli_num_rows($check_user_result) > 0) {
        echo '<script>
        alert("User already exists");
        window.location.href="register.php";
        </script>';
        exit;
    }

    $sql = "INSERT INTO member (first_name, last_name, sex, email, password, role) 
            VALUES ('$first_name', '$last_name', '$sex', '$email', '$hashedPassword', '$default_role')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
        alert("You are successfully registered!");
        window.location.href= "login.php";
        </script>';
    } else {
        echo '<script>
        alert("Registration failed. Please try again.");
        window.location.href= "register.php";
        </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
             font-family: Arial; 
             line-height: 1.6;
             }
        header {
             background: #f4f4f4; 
             padding: 1rem; 
             text-align: center;
              color: blue; 
            }
        .container {
             margin: auto;
             width: 500px;
             padding: 3rem 2rem;
             }
        .btn {
             display: block;
              width: 100%;
               padding: 10px 15px;
                background: #ff6600;
                 color: #fff; border-radius:
                  5px; margin: 5px 0; 
                  cursor: pointer;
                 }
        .btn:hover {
             background: #e65c00;
             }
        #form {
             padding: 2rem;
              background: #f4f4f4;
             }
        #form input, #form select {
             width: 100%;
              padding: 8px;
               margin-bottom: 10px; 
               border-radius: 5px;
                border: 1px solid #ccc;
             }
        button { 
            color: rgb(125, 125, 235);
             border: none;
              background-color: transparent;
               font-size: 1rem;
                font-weight: bold;
             }
        button:hover {
             text-decoration: underline;
              color: blue;
               cursor: pointer;
             }
    </style>
</head>
<body>
    <header><h1>AO Bank Mukhonde</h1></header>

    <!-- Sign up section -->
    <section class="container" id="signUp">
        <form id="form" method="POST">
            <h1>Sign Up</h1>
            <div>
                <label for="Fname">First Name:</label>
                <input type="text" id="Fname" name="first_name">
            </div>
            <div>
                <label for="Lname">Last Name:</label>
                <input type="text" id="Lname" name="last_name">
            </div>
            <div>
                <label for="sex">Sex:</label>
                <select name="sex">
                    <option value="female">Female</option>
                </select>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" minlength="4" maxlength="8" name="password">
            </div>
            <div>
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" minlength="4" maxlength="8" name="confirmPassword">
            </div>

            <input class="btn" type="submit" value="Sign Up">
            <p>Already have an account?</p><a href="login.php"><button id="signInButton" type="button">Sign In</button></a>
        </form>
    </section>
</body>
</html>
