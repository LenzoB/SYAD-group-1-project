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

.sb_links{
    box-shadow:0px 2px 4px rgba(0,0,0,0.7);
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
    font-size:23px;
    transition: 0.5s;
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

button {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    color: white;
    cursor: pointer;
    margin-top: 10px;
    background-color: orangered;
}

th{
    background-color:#f4f4f4;
}

    </style>
</head>
<body>
    <header class="header">
        <h1>Group Members</h1>
    </header>   
    <div class="side-bar">
        <p class="gname"><span class="name">AO</span><br> BANK MUKHONDE </p>
        <div class="sb_links"><br>
        <a href="user_member.php">Group Members</a><br><br>
        <a href="user_deposit.php">My Deposits</a><br><br>
        <a href="user_loan.php">Loans</a><br><br>
        <a href="Index.php" onclick="return confirm('Are You sure you want to LogOut?')">Logout</a><br>
        </div>
    </div>
    <div class="member_info">
        <h1>Members</h1>
        <table>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Sex</th>
                <th>Email</th>
            </tr>
            <tbody>
                <?php
            
            $sql = "SELECT id,first_name,last_name,sex,email FROM `member`";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $sex = $row['sex'];
                    $email = $row['email'];


                    echo '<tr>
                        <td>' . $first_name . '</td>
                        <td>' . $last_name . ' </td>
                        <td>' . $sex . '</td>
                         <td>' . $email. '</td>
                      

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