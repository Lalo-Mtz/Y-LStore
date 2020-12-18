<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';

    session_start();
    include("mysql.php");

    //if($_SESSION['registered'] == true){
        $conn = connect();

        $idu = $_GET['iu'];
        $msg = $_GET['m'];

        $sql = "SELECT email, nombre, ape_pat FROM usuario WHERE idu = $idu";

        $result = $conn->query($sql)->fetch_assoc();
        $email = $result['email'];
        $nombre = $result['nombre'] . " " . $result['ape_pat'];
    
        close($conn);
        

        $mail = new PHPMailer(true);
        
        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP

            $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
            $mail->SMTPAuth   = "login";                                   // Enable SMTP authentication
            
            $mail->Username   = 'rlstoreisc@gmail.com';                     // SMTP username
            $mail->Password   = 'yamiylalo2020';                               // SMTP password

            
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            
            //Recipients
            $mail->setFrom('rlstoreisc@gmail.com', 'Y&L Store');
            $mail->addAddress($email, $nombre);     // Add a recipient
            

            
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Realizaste una compra en Y&L Store';
            $mail->Body    = 'Agradecemos tu preferencia!!!<br>Detalles de la compra:<br>' . $msg;

            
            $mail->send();

            echo "true";
        } catch (Exception $e) {
            echo "false";
        }
    //}
?>