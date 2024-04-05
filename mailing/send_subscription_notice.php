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

    
    if (($reminder_status!="none") and ($email_address!="") and ($subscription_end!=date("Y-m-d")) and ($subscription_start!=date("Y-m-d"))){
        // $mail = new PHPMailer();
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
        if ($reminder_status!="0"){
            $mail->Subject = "Your MuscleDep0t subscription is about to expire" ;
            $mail->Body = "Dear Mr./Ms. " . $firstname  . " " . $lastname ."
            <br><br>May the gains be with you!
            <br><br>This is an advisory that your subscription is about to expire on:<b> ".
            date("F j, Y", strtotime($subscription_end)).
            "</b><br><br>For further inquiries: You may contact us at +639XXXXXXXXX or you may email us at xxx@gmail.com
            <br><br>Yours truly,
            <br>xxx
            <br><br>";
        } elseif($reminder_status=="0"){
            $mail->Subject = "Your MuscleDep0t subscription has expired" ;
            $mail->Body = "Dear Mr./Ms. " . $firstname  . " " . $lastname ."
            <br><br>May the gains be with you!
            <br><br>Your subscription has expired today.
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
}
?>
