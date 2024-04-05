<?php
// require_once ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/phpmailer/PHPMailer.php");
// require_once ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/phpmailer/SMTP.php");
// require_once ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/phpmailer/Exception.php");

// call email add from user table using user id
$emailAdd_data=get_where_custom("tbl_users", "user_id", $user_id);
foreach ($emailAdd_data as $key => $row) {
    $email_address=$row['email_address'];
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    echo $enddate. " vs ".date("Y-m-d");
    if (($enddate!=(date("Y-m-d")) and ($email_address!=""))){
        // $mail = new PHPMailer();
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        echo "pasok";

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = "true";
        $mail->SMTPSecure = "tls";
        $mail->Port = "587";
        $mail->Username = $email_phpmailer;
        $mail->Password = $pw_phpmailer;
        
        $mail->setFrom("realmuscledepot@gmail.com");
        $mail->isHTML(true);

        $mail->Subject = "Thank you for choosing MuscleDep0t!" ;
        $mail->Body = "Dear Mr./Ms. " . $firstname  . " " . $lastname ."
        <br><br>May the gains be with you!
        <br><br>Thank you for choosing MuscleDep0t in your fitness journey! We're stoked to have you here.
        <br><br>Feel free to join us here. Your subscription is valid until: <b> ".
        date("F j, Y", strtotime($subscription_end)).
        "</b><br><br>For further inquiries: You may contact us at +639XXXXXXXXX or you may email us at xxx@gmail.com
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
}
?>
