
<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$mail = new PHPMailer(true);

		try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'youngadan27@gmail.com';                     // SMTP username
    $mail->Password   = 'ajmy1994';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('youngadan27@gmail.com', 'Docente');
    $mail->addAddress('youngadan27@gmail.com');     // Add a recipient

    // Attachments
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'este es el asunto';
    $mail->Body    = 'Este es el mensaje ';

    $mail->send();
    echo "<script>
			alert('Mensaje enviado'); 
		</script>";
} catch (Exception $e) {
	echo "<script>
			alert('Mensaje no enviado "."{$mail->ErrorInfo}'); 
		</script>";
}

?>