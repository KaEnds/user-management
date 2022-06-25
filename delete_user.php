<?php
    require('connectdb.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM userdata WHERE `userdata`.`id` = '$id'";
    mysqli_query($conn, $sql);

    header("location: index.php");

?>