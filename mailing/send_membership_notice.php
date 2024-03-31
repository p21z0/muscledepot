<?php
date_default_timezone_set('Asia/Singapore');
$xdate=date('M-d-Y');
$xtime=date('h:i:sa');

require ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/phpmailer/PHPMailer.php");
require ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/phpmailer/SMTP.php");
require ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/phpmailer/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if (($reminder_status!="none") and ($email_address!="")){
    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = "true";
    $mail->SMTPSecure = "tls";
    $mail->Port = "587";
    $mail->Username = "21staltego@gmail.com";
    $mail->Password = "angj zqtr mzny dfqm";
    $mail->Subject = "Subscription Successful" ;
    $mail->setFrom("realmuscledepot@gmail.com");
    $mail->isHTML(true);
    if ($reminder_status!="0"){
        $mail->Body = "Dear Mr./Ms. " . $firstname  . " " . $lastname ."
        <br><br>May the gains be with you!
        <br><br>This is an advisory that your annual membership is about to expire in: ".$reminder_status.
        "<br><br>For further inquiries: You may contact us at +639XXXXXXXXX or you may email us at xxx@gmail.com
        <br><br>Yours truly,
        <br>xxx
        <br><br>";
    } elseif($reminder_status=="0"){
        $mail->Body = "Dear Mr./Ms. " . $firstname  . " " . $lastname ."
        <br><br>May the gains be with you!
        <br><br>Your annual membership has expired today.
        <br><br>For renewal and further inquiries: You may contact us at +639XXXXXXXXX or you may email us at xxx@gmail.com
        <br><br>We look forward to see you pumping again here!
        <br><br>Yours truly,
        <br>xxx
        <br><br>";
    }

    $mail->addAddress($email_address);

    if ($mail->Send() ) {
        echo "Mail Send";
        //  header("Location: index.php");
    }else{
        echo "Error<br>". $mail->ErrorInfo;
    }

    echo $mail->Body;

    $mail->smtpClose();
}
?>
