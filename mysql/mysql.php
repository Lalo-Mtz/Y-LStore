<?php
    function connect(){ //Realiza la conexion
        $servername = "localhost";
        $database = "store";
        $username = "lalo"; //usuario con roles restringidos
        $password = "lalo";

        $conn = mysqli_connect($servername, $username, $password, $database);
        
        if(!$conn){
            //echo "Error: La conexion no se realizo correctamente. " . mysqli_connect_error();
            header("Location: index.html");
        }else{
            $cdb = mysqli_select_db($conn, $database);
            if(!$cdb){
                //echo "Error: La base de datos no esta disponible. " . mysqli_connect_error();
                header("Location: index.html");
            }
        }
        return $conn;
    }

    function close($conn){ //Cierra la conexion
        mysqli_close($conn);
    }


    function login($user, $pwd){ //Para verificar los datos de quien se esta loguiando
        $conn = connect();
        $sql = "SELECT (idu)id, tipo, email, (CAST(aes_decrypt(pwd,'store')AS CHAR(90)))pwd FROM usuario WHERE nombre='$user';";
        
        $result = ($conn->query($sql))->fetch_assoc();
        close($conn);//Cierra la conexion

        if(strcmp($result['pwd'], $pwd) == 0){ //Verifica si el password es correcto
            $array = array($result['id'], $result['tipo'], $result['email']);
            return $array; //Retorna id , type y email
        }
        
        return 0;
    }


    function newUser($name, $email, $pwd, $type){ //Para cargar un nuevo usuario
        $conn = connect();
        $sql = "INSERT INTO usuario(nombre, email, pwd, tipo) VALUES('$name', '$email', aes_encrypt('$pwd','store'), $type);";
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