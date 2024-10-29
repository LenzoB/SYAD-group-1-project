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
    <title>Document</title>

    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
}

.calculator, .calculator1 {
    background: lightgrey;
    padding-left: 20px;
    padding-right: 20px;
    padding-bottom: 40px;
    border-radius: 12px;
    width: 400px;
    text-align: center;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
    position: fixed;
    margin-top: 5%;
    margin-left: 33%;
}

.cancel{
    width: 10%;
    height: 40px;
    margin-top: 5px;
    float: right;
   
}
.times {
    text-decoration: none;
    color: #030730;
    font-size: 30px;
    
}

.times:hover {
    font-size: 40px;
}

#btn {
    padding: 12px;
    margin: 20px 0;
    border: none;
    border-radius: 10px;
    background-color:#323554;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
#btn {
    width: 50%;
}

#btn:hover {
    background-color: #030730;
}

p{
    font-size:1.3em;
}

    </style>
</head>
<body>
    <div class="calculator">
    <button class="cancel"><a href="loan_management.php" class="times">&times;</a></button>
    <h2>Total Loan taken out since the group's inception and interest on each loan</h2>

    <?php
                $sql = "SELECT SUM(l.amount) AS total_amount,SUM(l.interest) AS total_interest FROM loan AS l              
                JOIN member AS m WHERE m.email= ?"; 
        
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                
                if ($row = mysqli_fetch_assoc($result)) {
                   
                    $total_amount = $row['total_amount'] ; 
                    $total_interest=$row['total_interest'];
                    echo "<p> Loans = MWK :$total_amount</p>" ;
                    echo "<p> Interest = MWK :$total_interest</p>" ;
                
            }else {
                    echo "No Interest, no loan found.";
                }
                mysqli_stmt_close($stmt);
                
                ?>
        </div>
       

</body>
</html>