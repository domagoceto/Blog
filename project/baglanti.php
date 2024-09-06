<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;
        $mail->Username = 'bjkkadir121@gmail.com'; 
        $mail->Password = 'lgwogfguxpzeodef';  
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS ;
        $mail->Port = 587;

        
        $mail->setFrom('bjkkadir121@gmail.com', 'Kullanıcı');
        $mail->addAddress('bjkkadir121@gmail.com'); 

        
        $mail->isHTML(true);
        $mail->Subject = 'Yeni İletişim Mesajı';
        $mail->Body    = "<h2>İletişim Formu</h2>
                          <p><strong>Ad:</strong> $name</p>
                          <p><strong>E-posta:</strong> $email</p>
                          <p><strong>Mesaj:</strong> $message</p>";

        $mail->send();
        echo 'Mesaj başarıyla gönderildi';
    } catch (Exception $e) {
        echo "Mesaj gönderilemedi. Mailer Hatası: {$mail->ErrorInfo}";
    }
}
?>
