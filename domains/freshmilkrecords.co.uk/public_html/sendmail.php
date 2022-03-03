<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
    $mail = new PHPMailer;
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'vinyl@freshmilkrecords.co.uk';
    $mail->Password = 'freeserve1';
    $mail->setFrom('vinyl@freshmilkrecords.co.uk', 'Fresh Milk Records');
    $mail->addAddress('freshmilkrecords@mail.com', 'Fresh Milk Records');
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'Website Email';
        $mail->isHTML(false);
        $mail->Body = <<<EOT
Email: {$_POST['email']}
Name: {$_POST['name']}
Message: {$_POST['message']}
EOT;
        if (!$mail->send()) {
            $msg = 'Sorry, something went wrong. Please try again later.';
        } else {
            $msg = 'Message sent! Thanks for contacting us.';
        }
    } else {
        $msg = 'Share it with us!';
    }
?>
<!DOCTYPE html>


