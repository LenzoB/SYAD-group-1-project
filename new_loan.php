<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $interest = $_POST['interest'];
    
    $sql = "INSERT INTO loan (first_name, last_name, date, email, amount, interest) 
            VALUES ('$first_name', '$last_name', '$date', '$email','$amount','$interest')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '
        <script>
        alert("Loan added successfully!");
        window.location.href="loan_management.php";
        </script>
        ';
    } else {
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmate Registration</title>

    <style>

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
}
        .add_loan {
    background: lightgrey;
    padding-left: 20px;
    padding-right: 20px;
    padding-bottom: 20px;
    border-radius: 12px;
    width: 400px;
    text-align: center;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
    position: fixed;
    margin-top: 3%;
    margin-left: 33%;
}

input {
    width: 90%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 8px;
    border: 1px solid #333;
    background: rgba(255, 255, 255, 0.1);
    color: black;
    font-size: 14px;
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

#button {
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
#button {
    width: 50%;
}

#button:hover {
    background-color: #030730;
}


    </style>

    </head>
<body>
    <div class="add_loan">
        <button class="cancel"><a href="loan_management.php" class="times">&times;</a></button>
        <h1>ADD LOAN</h1>
        <form method="POST">
            <input type="text" id="fname" placeholder="Firstname" name="first_name" required>
            <input type="text" id="lname" placeholder="Lastname" name="last_name" required>
            <input type="date" id="date" name="date" required>
            <input type="text" id="email" name="email" placeholder="Email" required>
            <input type="number" id="amount" placeholder="Amount in (MWK)" name="amount" required>
            <input type="number" id="interest" name="interest" placeholder="Interest" required>
            <button type="submit" id="button" name="submit">ADD</button>
        </form>
    </div>
</body>

</html>
