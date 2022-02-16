<?php

$userName = &_POST['userName'];
$userEmail = &_POST['userEmail'];
$userPhone = &_POST['userPhone'];

//Load Composer's autoloader
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
    //Server settings
    $mail->SMTPDebug = 0;                                        //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                      //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                 //Enable SMTP authentication
    $mail->Username   = 'chelyshevaeee@gmail.com';                        //SMTP username
    $mail->Password   = 'q_w_e_r_t_y12345!';                  //SMTP password
    $mail->SMTPSecure = 'ssl';                             //Enable implicit TLS encryption
    $mail->Port       = 465;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('chelyshevaeee@gmail.com', 'Елена');
    $mail->addAddress('chelysheva.yelena@mail.ru');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Новая заявка сайта';
    $mail->Body    = "Имя пользователя: ${userName}, его телефон: ${userPhone}. Его почта: ${userEmail}";

    $mail->send();
    header('Сообщение отправлено')
}   catch (Exception $e) {
    echo "Сообщение не отправленно, есть ошибка. Код ошибки: {$mail->ErrorInfo}";
}