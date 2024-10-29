<?php
include 'connection.php';
session_start();

if (isset($_POST['login_member'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to get the user's hashed password and role from the database
    $query = "SELECT id, password, role FROM member WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verify the password
        if (isset($_POST['email']) && isset($_POST['password']))  {
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $row['role'];

            // Redirect based on user role
            if ($row['role'] == 'admin') {
                header('Location: member_management.php');
            } else {
                header('Location: user_member.php');
            }
            exit;
        } else {
            echo '<script>alert("Invalid Password!"); window.location.href="login.php";</script>';
        }
    } else {
        echo '<script>alert("No user was found with such credentials!"); window.location.href="login.php";</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        
        * { 
            margin: 0;
            padding: 0;
            box-sizing:
            border-box; 
        }
        body {
            font-family: Arial, sans-serif;
         }
        header {
            background: #f4f4f4;
            padding: 1rem;
            text-align: center;
            color: blue;
        }
        .container { 
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            padding: 2rem;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background: #ff6600;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background: #e65c00;
        }
        #form {
            background: #f4f4f4;
            padding: 2rem;
            border-radius: 5px;
        }
        #form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background: none;
            border: none; 
            color: blue;
            font-size: 1rem;
            cursor: pointer;
        }
        button:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <header>
        <h1>AO Bank Mukhonde</h1>
    </header>

    <!-- Sign In section -->
    <section class="container" id="signIn">
        <form id="form" method="POST">
            <h1>Sign In</h1>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" minlength="4" maxlength="8" required>
            </div>
            <input class="btn" type="submit" name="login_member" value="Sign In">
            <p>Don't have an account yet? <a href="register.php">Sign Up</a></p>
        </form>
    </section>
</body>
</html>
