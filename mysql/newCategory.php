<?php
    session_start();
    include('mysql.php');

    $category = $_POST['namecat'];

    $conn = connect();

    $sql = "INSERT INTO categoria(categoria) VALUES ('$category')";
    if($conn->query($sql) === false){
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    close($conn);
    
    header('Locartion: ../home.php?op=3');
?>