<?php
include 'connection.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>member management</title>

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
        position:fixed;
        width:100%;
       
        }

    .side-bar{
        width: 17%;
        height: 100vh;
        background-color: rgb(235, 231, 231);
        float: left;
        padding: 20px;
        transition: width 0.3s;
        position:fixed;
    
        }

        .name{
    font-weight: bold;
    font-size: 50px;
    color: blue;
    text-shadow: 0px 3px 4px rgba(0, 0, 0, 0.7);
}
.gname{
    color: blue;
    font-size:1.3em;
}

.loan_info table {
    width: 100%;
    border-collapse: collapse;
}

.loan_info table,
.loan_info  th,
.loan_info  td {
    border: 1px solid #ddd;
}

.loan_info  th,
.loan_info  td {
    padding: 10px;
    text-align: left;
}

.member{
    color: orange;
}

.loan_info{
    float: right;
    width: 75%;
    margin-top: 130px;
    background-color: white;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}



.sb_links, a {
    margin-top: 70%;
    text-decoration: none;
    background-color: white;
    margin-left: 4%;
    height: 200px;
    font-size: 20px;
    color: #333;
    border-radius: 20px;
   
}

a:hover{
    color: orange;
}

.checkboxx {
    width: 10vh;
    height: 5vh;
    appearance: none;
}


.checkboxx:checked::after {
            content: "✔";
            display: inline-block;
            color: black;
            font-size: 2.5em;
        }

.add_button, .calc_button{
    background-color: orange;
    border: none;
    width: 150px;
    height: 30px;
    border-radius: 10px;
    float: right;
    font-size: 20px;

}

.add_button{
    margin-right:30px;
}

.add_button:hover, .calc_button:hover{
    background-color: #e65c00;
}

.sb_links{
    box-shadow:0px 2px 4px rgba(0,0,0,0.7);
}
a:hover{
    color: orange;
    font-size:21px;
    transition: 0.5s;
}
.noti{
    font-size:1.3em;
}
th{
    background-color:#f4f4f4;
}
    
    </style>
</head>
<body>
    <header class="header">
        <h1>ADMIN PANEL | Loan Management</h1>
    </header>   
    <div class="side-bar">
        <p class="gname"><span class="name">AO</span><br> BANK MUKHONDE </p>
        <div class="sb_links"><br>
        <a href="member_management.php" >Member Management</a><br><br>
        <a href="deposit_management.php">Deposit Management</a><br><br>
        <a href="loan_management.php">Loan Management</a><br><br>
        <a href="Index.php"  onclick="return confirm('Are You sure you want to LogOut?')">Logout</a><br>
        </div>
    </div>
    <div class="loan_info">
        <h1>Loans</h1>
        <p class="noti">People who have taken out loans</p>
        <a href="loan_calculator.php"><button class="calc_button">Calculator</button></a>
        <a href="new_loan.php"><button class="add_button">New Loan</button></a>
        <br><br>
        <table>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Date</th>
                <th>Amount (MWK)</th>
                <th>Interest(MWK)</th>
                <th>Mark loan as paid</th>
            </tr>
            <tbody>
                <?php
            
            $sql = "SELECT id,first_name,last_name,date,email,amount,interest FROM `loan`";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $date = $row['date'];
                    $amount = $row['amount'];
                    $interest = $row['interest'];


                    echo '<tr>
                        <td>' . $first_name . '</td>
                        <td>' . $last_name . ' </td>
                        <td>' . $date . '</td>
                         <td>' . $amount. '</td>
                         <td>' . $interest. '</td>
                         <td> <input type="checkbox" class="checkboxx">
                  </td>
                </tr>';
                     }
                    } else {
                        die(mysqli_error($conn));
                    }
                    ?>
                
            </tbody>
            
        </table>

    </div>
    
    <script src="my.js"></script>

</body>
</html>