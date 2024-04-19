<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/phpmailer/PHPMailer.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/phpmailer/SMTP.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/phpmailer/Exception.php");

include_once("../no_include.php");

// call email add from user table using user id
$user_id=$_GET['id'];
$emailAdd_data=get_where_custom("tbl_users", "user_id", $user_id);
foreach ($emailAdd_data as $key => $row) {
    $email_address=$row['email_address'];   
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    $user_qr=$row['user_qr'];

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

        $mail->Subject = "Your MuscleDep0t QR code" ;
        $mail->Body = "Dear Mr./Ms. " . $firstname  . " " . $lastname ."
        <br><br>May the gains be with you!
        <br><br>Dropping your QR here: <br><img src='https://quickchart.io/qr?text=.$user_qr.&light=ea5614&margin=1' class='card-img-top dp-pic' alt=' Sorry, QR is acting.... weird. For now, you can show this to the desk: ".$user_qr."'
        <br><br><br>Remember to scan your QR in front of the desk for (+10 strength).
        <br><br>For further inquiries: You may contact us at +639XXXXXXXXX or you may email us at xxx@gmail.com
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
    ?>
    <script>
        window.open('<?=$user_qr?>','_blank');
    </script>
<?php
    // new tab for show qr
    header("Location:../subscriptions/user_subscriptions?id=".urlencode($user_id));
}
?>
