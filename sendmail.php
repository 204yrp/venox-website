<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'vg.vsnoffice@gmail.com';
        $mail->Password   = 'ruqgnvyaajplqiif';  // Gmail app password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('vg.vsnoffice@gmail.com', 'Venox Website');
        $mail->addAddress('vg.vsnoffice@gmail.com');

        $mail->Subject = "New Inquiry from Venox Website";
        $mail->Body =
            "Name: " . $_POST['Name'] . "\n" .
            "Email: " . $_POST['Email'] . "\n" .
            "Phone: " . $_POST['Phone'] . "\n" .
            "Subject: " . $_POST['subject'] . "\n\n" .
            "Message:\n" . $_POST['Message'];

        $mail->send();

        header("Location: thankyou.html");
        exit();

    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
}
?>