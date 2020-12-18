<?php
    session_start();
    include("mysql.php");

    if($_SESSION['registered'] == true){
        $conn = connect();
        $id = $_POST['idu'];
        $u = $_POST['uname'];
        $ap = $_POST['apepat'];
        $am = $_POST['apemat'];
        $bid = $_POST['birthdate'];
        $m = $_POST['mail'];
        $ph = $_POST['phone'];

        $calle = $_POST['calle'];
        $ext = $_POST['ext'];
        $inte = $_POST['inte'];
        $cp = $_POST['cp'];
        $co = $_POST['co'];
        $ci = $_POST['ci'];
        $es = $_POST['es'];
        $gu = $_POST['gustos'];


        $sql = "UPDATE usuario SET nombre='$u', ape_pat='$ap', ape_mat='$am', fecha='$bid', email='$m', telefono='$ph', gustos='$gu' WHERE idu=$id;";

        if($conn->query($sql) === true){
            $sql = "SELECT * FROM domicilio WHERE idu=$id;";

            if((($conn->query($sql))->fetch_assoc())['idu'] == ""){
                $sql = "INSERT INTO domicilio(idu, calle, n_ext, n_int, cp, colonia, ciudad, estado) 
                    VALUES($id, '$calle', '$ext', '$inte', $cp, '$co', '$ci', '$es');";
                $conn->query($sql);
            }else{
                $sql = "UPDATE domicilio SET calle='$calle', n_ext='$ext', n_int='$inte', cp='$cp', colonia='$co', ciudad='$ci', estado='$es' WHERE idu=$id;";
                $conn->query($sql);
            }
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
            $sql = false;
        }
        
        close($conn);
        
    }//else{
    //    header('Location : home.php?op=5');
    //}
    header("Location: ../home.php?op=0"); //Si no existe o no es valido regresa al index
?>