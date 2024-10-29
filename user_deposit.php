<?php
include 'connection.php';

session_start();

// Ensure the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}

// Retrieve the logged-in email from session
$email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        .header {
            background-color: rgb(235, 231, 231);
            padding: 20px;
            color: black;
            text-align: center;
            position: fixed;
            width: 100%;
        }
        .side-bar {
            width: 17%;
            height: 100vh;
            background-color: rgb(235, 231, 231);
            float: left;
            padding: 20px;
            transition: width 0.3s;
            position: fixed;
        }
        .name {
            font-weight: bold;
            font-size: 50px;
            color: blue;
            text-shadow: 0px 3px 4px rgba(0, 0, 0, 0.7);
        }
        .gname {
            color: blue;
            font-size:1.3em;
        }
        .sb_links, a {
            margin-top: 70%;
            text-decoration: none;
            background-color: white;
            margin-left: 4%;
            font-size: 20px;
            color: #333;
            border-radius: 20px;
        }
        a:hover {
            color: orange;
        }
 
        .deposit_info table {
            width: 100%;
            border-collapse: collapse;
        }
        .deposit_info table,
        .deposit_info th,
        .deposit_info td {
            border: 1px solid #ddd;
        }
        .deposit_info th,
        .deposit_info td {
            padding: 10px;
            text-align: left;
        }
        .deposit_info {
            float: right;
            width: 75%;
            margin-top: 130px;
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .calc_button {
            background-color: orange;
            border: none;
            width: 150px;
            height: 30px;
            border-radius: 10px;
            float: right;
            font-size: 20px;
        }
        .calc_button:hover {
            background-color: #e65c00;
        }
        .notification{
            font-size:1.3em;
            border-radius: 15px;
            padding: 20px;
            background-color: #f4f4f4;
            margin: 10px;
        }
.date {
    text-align:center;
}
.sb_links{
    box-shadow:0px 2px 4px rgba(0,0,0,0.7);
}
a:hover{
    color: orange;
    font-size:23px;
    transition: 0.5s;
}

    </style>
</head>
<body>
    <div class="header">
        <h1>My Deposits</h1>
    </div>   
    <div class="side-bar">
        <p class="gname"><span class="name">AO</span><br> BANK MUKHONDE </p>
        <div class="sb_links"><br>
            <a href="user_member.php">Group Members</a><br><br>
            <a href="user_deposit.php">My Deposits</a><br><br>
            <a href="user_loan.php">Loans</a><br><br>
            <a href="Index.php" onclick="return confirm('Are You sure you want to LogOut?')">Logout</a><br>
        </div>
    </div>
    <div class="deposit_info">
        <h1>Deposit Messages</h1>
        <a href="calc_mydeposit.php"><button class="calc_button">Calculator</button></a>
        <br><br>
                <?php
                $sql = "SELECT d.date, d.amount, m.first_name, m.last_name
                        FROM deposit AS d
                        JOIN member AS m ON d.first_name = m.first_name
                        WHERE m.email = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<p class="date">'.htmlspecialchars($row['date']) . '</p>
                        <p class="notification">Dear ' .
                                htmlspecialchars($row['first_name']) . '&nbsp;' .
                                htmlspecialchars($row['last_name']) .
                                ', You have successfully deposited k' .
                                htmlspecialchars($row['amount']) . ' . DATE:<u> ' .
                                htmlspecialchars($row['date']) . '</u> .</p><br>';
                    }
                } else {
                    echo '<p class="notification">No deposits found.</P>';
                }

                mysqli_stmt_close($stmt);
                ?>
            
    </div>
</body>
</html>
