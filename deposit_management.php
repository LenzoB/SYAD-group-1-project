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

th{
    background-color:#f4f4f4;
}


.member_info table {
    width: 100%;
    border-collapse: collapse;
}

.member_info table,
.member_info  th,
.member_info  td {
    border: 1px solid #ddd;
}

.member_info  th,
.member_info  td {
    padding: 10px;
    text-align: left;
}


.member{
    color: orange;
}

.member_info{
    float: right;
    width: 75%;
    margin-top: 130px;
    background-color: white;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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
    font-size:21.5px;
    transition: 0.5s;
}


    </style>
</head>
<body>
    <div class="header">
        <h1>ADMIN PANEL | Deposit Management</h1>
    </div>   
    <div class="side-bar">
        <p class="gname"><span class="name">AO</span><br> BANK MUKHONDE </p>
        <div class="sb_links"><br>
        <a href="member_management.php">Member Management</a><br><br>
        <a href="deposit_management.php">Deposit Management</a><br><br>
        <a href="loan_management.php">Loan Management</a><br><br>
        <a href="Index.php" onclick="return confirm('Are You sure you want to LogOut?')">Logout</a><br>
        </div>
    </div>
    <div class="member_info">
        <h1>Deposits</h1>
        <a href="calculator.php"><button class="calc_button">Calculator</button></a>
        <a href="add_deposit.php"><button class="add_button">Add Deposit</button></a>
        <br><br>
        <table>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Date</th>
                <th>Amount (MWK)</th>
            </tr>
            <tbody>
                <?php
            
            $sql = "SELECT id,first_name,last_name,date,amount FROM `deposit`";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $date = $row['date'];
                    $amount = $row['amount'];


                    echo '<tr>
                        <td>' . $first_name . '</td>
                        <td>' . $last_name . ' </td>
                        <td>' . $date . '</td>
                         <td>' . $amount. '</td>
                </tr>';
                     }
                    } else {
                        die(mysqli_error($conn));
                    }
                    ?>
                
            </tbody>
            
        </table>

    </div>
    
   
</body>
</html>
