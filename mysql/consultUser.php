<?php
    include("mysql.php");

    $id = $_GET['i'];

    $conn = connect();

    $sql = "SELECT usuario.nombre, usuario.ape_pat, usuario.ape_mat, usuario.fecha, usuario.telefono, usuario.email, usuario.gustos, domicilio.* FROM usuario 
    INNER JOIN domicilio ON usuario.idu = domicilio.idu WHERE usuario.idu='$id'";

    $result = ($conn->query($sql))->fetch_assoc();

    if($result == ""){
        $sql = "SELECT * FROM usuario WHERE idu=$id";
        $result = ($conn->query($sql))->fetch_assoc();
    }
    close($conn);
    
    echo json_encode($result);
?>