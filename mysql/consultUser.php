<?php
    include("mysql.php");

    $user = $_GET['u'];
    $id = $_GET['i'];

    $conn = connect();
    //$sql = "SELECT * FROM usuario WHERE nombre='$user' and idu='$id';";
    $sql = "SELECT usuario.ape_pat, usuario.ape_mat, usuario.fecha, usuario.telefono, domicilio.* FROM usuario 
    INNER JOIN domicilio ON usuario.idu = domicilio.idu WHERE nombre='$user' and usuario.idu='$id';";

    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        $array[] = $row;
    }

    close($conn);
    
    $cad = json_encode($array);
    ///echo $cad;
    $str = substr($cad, 1, strlen($cad)-2);
    echo $str;
?>