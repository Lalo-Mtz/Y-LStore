<?php
    function connect(){ //Realiza la conexion
        $servername = "localhost";
        $database = "store";
        $username = "lalo"; //usuario con roles restringidos
        $password = "lalo";

        $conn = mysqli_connect($servername, $username, $password, $database);
        
        if(!$conn){
            //echo "Error: La conexion no se realizo correctamente. " . mysqli_connect_error();
            header("Location: index.php");
        }else{
            $cdb = mysqli_select_db($conn, $database);
            if(!$cdb){
                //echo "Error: La base de datos no esta disponible. " . mysqli_connect_error();
                header("Location: index.php");
            }
        }
        return $conn;
    }

    function close($conn){ //Cierra la conexion
        mysqli_close($conn);
    }

    function login($user, $pwd){ //Para verificar los datos de quien se esta loguiando
        $conn = connect();
        $sql = "SELECT (idusuario)id, typee, (CAST(aes_decrypt(pwd,'lal')AS CHAR(90)))pass FROM usuario WHERE username='$user';";
        
        $result = ($conn->query($sql))->fetch_assoc();
        close($conn);//Cierra la conexion

        if(strcmp($result['pass'], $pwd) == 0){ //Verifica si el password es correcto
            $array = array($result['id'], $result['typee']);
            return $array; //Retorna id y type 
        }
        
        return 0;
    }


    function newUser($name, $email, $pwd, $type){ //Para cargar un nuevo usuario
        $conn = connect();
        $sql = "INSERT INTO usuario(nombre, email, pwd, tipo) VALUES('$name', '$email', aes_encrypt('$pwd','lalo'), $type);";
        if($conn->query($sql) === true){
            $sql = true;
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
            $sql = false;
        }
        close($conn);
        return $sql;
    }

?>