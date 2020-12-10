<?php
    session_start();
    include("mysql.php");

    if($_SESSION['registered'] == true){
        $conn = connect();

        $u = $_POST['uname'];
        $ap = $_POST['apepat'];
        $am = $_POST['apemat'];
        $bid = $_POST['birthdate'];
        $m = $_POST['mail'];
        $ph = $_POST['phone'];
        $type = $_POST['roluser'];
        $pwd = $_POST['pwd'];

        $calle = $_POST['calle'];
        $ext = $_POST['ext'];
        $inte = $_POST['inte'];
        $cp = $_POST['cp'];
        $co = $_POST['co'];
        $ci = $_POST['ci'];
        $es = $_POST['es'];

        if($type == "") $type=0;

        $sql = "INSERT INTO usuario (nombre, ape_pat, ape_mat, fecha, email, telefono, pwd, tipo)
        VALUES ('$u', '$ap', '$am', '$bid', '$m', '$ph', aes_encrypt('$pwd','store'), $type);";

        if($conn->query($sql) === false){
            echo "Error: " . $sql . "<br>" . $conn->error;
            $sql = false;
        }
        
        close($conn);
        
    }//else{
    //    header('Location : home.php?op=5');
    //}
    header("Location: ../home.php?op=2"); 


?>