<?php
    session_start();
    include("mysql.php");

    $id = $_GET['i'];

    $conn = connect();

    $sql = "SELECT * FROM producto WHERE idp=$id";

    $result = ($conn->query($sql))->fetch_assoc();

    close($conn);

    echo json_encode($result);
?>