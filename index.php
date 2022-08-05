<?php

include './layout/header.php';require './classes/Exception.php';
require './classes/PHPMailer.php';
require './classes/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])){
    $email = $_POST['your-email'];
    $text = $_POST['text'];

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'faxbob1129@gmail.com';
    $mail->Password = 'pfmnbwrnzfeoqzxj1212';
    $mail->Subject = 'THIS MESSAGE IS F-SOFT';
    $mail->Body = $text;
    $mail->isHTML(true);


    try {
        $mail->setFrom('faxbob1129@gmail.com');
    } catch (Exception $e) {
    }
    try {
        $mail->addAddress($email);
    } catch (Exception $e) {
    }
    try {
        if ($mail->send()) {
            $mes =  "<span class='text-success'>Send message SuccessFull</span>";
        } else

            $mes = "<span class='text-danger'>Error! Eamil not working! or Message error!</span>";
    } catch (Exception $e) {
    }

    $mail->smtpClose();
    unset($_POST['submit']);
    unset($_POST['your-email']);
    unset($_POST['text']);
}

?>

<div class="container">
    <form action="/" novalidate method="post">
        <div class="row p-3">
            <div class="col-md-12">
                <h1 class="text-center text-primary mb-3">Faxriddin Mailler Service</h1>
            </div>
            <div class="col-md-3 card card-body" style="max-height: 500px">
                <div style="height: 100%;">
                    <div>
                        <p class="w-100 bg-primary text-light text-center p-2" style="border-radius: 4px;">Demo</p>
                        <div class=" mt-3">
                            <input name="your-email" required type="email" class="form-control" placeholder="E: faxbob1129@gmail.com">
                        </div>
                        <p class="mt-3 text-center"><?=$mes?></p>
                        <p class="text-center mt-4">
                            This project is intended for IT businessmen.
                            If you have a website, connect it to your email subscription system and send them your ad.
                            <b>I have service and API services!</b>
                        </p>
                    </div>
                    <div style="width: 100%;">
                        <a href="https://t.me/faxriddin1129" class="btn btn-outline-primary mb-2 mt-3 w-100">Using the beta version</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9 card card-body">
                <textarea name="text" required minlength="20" class="form-control" id="textEditor" cols="30" rows="15" placeholder="Message..."></textarea>
            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-2 w-100" value="Send Message"/>
    </form>
    <p class="text-center mt-3">
        <audio controls autoplay>
            <source src="./asset/as.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </p>
</div>

<?php
include './layout/footer.php';
