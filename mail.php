<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'utf-8';

    $name = $_POST['name'];
    $phone= $_POST['phone'];

    try{
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'mail.akkadapay.kz';
        $mail->SMTPAuth = true;
        $mail->Username = 'request@akkadapay.kz';
        $mail->Password = 'Qr2023@eQ';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('request@akkadapay.kz');
        $mail->addAddress('info@akkadapay.kz');
        $mail->isHTML(true);

        $mail->Subject = "AKKADAPAY: Заявка с сайта";
        $mail->Body = 'Пользователь: ' .$name . ' оставил заявку. Контакты: ' .$phone;
        $mail->AltBody = 'Пользователь: ' .$name .' оставил заявку. Контакты: ' .$phone;

        if(!$mail->send()) {
            echo 'Error';
        } else {
            header('location: thankyou.html');
        }
    } catch(Exception $e){
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }



?>