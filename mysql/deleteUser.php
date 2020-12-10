<?php
    session_start();
    include("mysql.php");

    if($_SESSION['registered'] == true){
        $conn = connect();

        $id = $_GET['i'];


        $sql = "DELETE FROM domicilio WHERE idu=$id";

        if($conn->query($sql) === false){
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $sql = "DELETE FROM usuario WHERE idu=$id";

        if($conn->query($sql) === false){
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        close($conn);
        
    }//else{
    //    header('Location : home.php?op=5');
    //}
    header("Location: ../home.php?op=2");

?>