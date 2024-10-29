<?php

include 'connection.php';

if(isset($_GET['deleteID'])){
    $id = $_GET['deleteID'];

    $sql = "delete from `member` where id=$id";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo '<script>
        alert("Member Successfully deleted:");
        window.location.href="member_management.php";
        </script>';
     
    } 
    else {
        die(mysqli_error($conn));
    }
}


?>