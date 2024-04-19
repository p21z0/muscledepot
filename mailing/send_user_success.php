<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/phpmailer/PHPMailer.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/phpmailer/SMTP.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/phpmailer/Exception.php");

include_once("../no_include.php");

    if (($email_address!="")){
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = "true";
        $mail->SMTPSecure = "tls";
        $mail->Port = "587";
        $mail->Username = $email_phpmailer;
        $mail->Password = $pw_phpmailer;
        
        $mail->setFrom("realmuscledepot@gmail.com");
        $mail->isHTML(true);

        $mail->Subject = "Welcome to MuscleDep0t!" ;
        $mail->Body = "Dear Mr./Ms. " . $firstname  . " " . $lastname ."
        <br><br>Welcome to MuscleDep0t!
        <br><br>Dropping your QR here: <br><img src='https://quickchart.io/qr?text=".$user_qr."&light=ea5614&margin=1' class='card-img-top dp-pic' alt=' Sorry, QR is acting.... weird. For now, you can show this to the desk: ".$user_qr."'
        <br><br>Remember to scan your QR in front of the desk for (+5 reps).
        <br><br>Your username: ".$username."
        <br>Your temporary password is: <b>".$password."</b><br>Please remember to change your password.
        <br><br>For further inquiries: You may contact us at +639XXXXXXXXX or you may email us at muscledep0t@gmail.com
        <br><br>Yours truly,
        <br>xxx
        <br><br>";

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

    header("Location:../users");

?>
