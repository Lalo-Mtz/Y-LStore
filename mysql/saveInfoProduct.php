<?php
    session_start();
    include("mysql.php");

    if($_SESSION['registered'] == true){
        $conn = connect();

        $id = $_POST['idp'];
        $name = $_POST['name'];
        $des = $_POST['des'];
        $price = $_POST['price'];
        $exi = $_POST['exi'];
        $cat = $_POST['category'];
        $img = $_POST['img'];


        $sql = "UPDATE producto SET nombre='$name', descripcion='$des', precio=$price, existencia=$exi, idca=$cat, imagen='$img' WHERE idp=$id";

        if($conn->query($sql) === false){
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        close($conn);
        
    }//else{
    //    header('Location : home.php?op=5');
    //}
    header("Location: ../home.php?op=3");
?>