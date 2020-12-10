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


        $sql = "INSERT INTO producto(nombre, descripcion, precio, existencia, idca, calificacion, imagen) 
            VALUES('$name', '$des', $price, $exi, $cat, 0, '$img')";

        if($conn->query($sql) === false){
            echo "Error: " . $sql . "<br>" . $conn->error;
            $sql = false;
        }
        
        close($conn);
        
    }//else{
    //    header('Location : home.php?op=5');
    //}
    header("Location: ../home.php?op=3"); 


?>