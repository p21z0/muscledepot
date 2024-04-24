<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/phpmailer/PHPMailer.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/phpmailer/SMTP.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/phpmailer/Exception.php");

include_once("../no_include.php");

// call email add from user table using user id and for updating entry
$user_id=$_GET['id'];
$table_name = "tbl_users";

//new password generator
$rand = strtoupper(substr(uniqid(sha1(time())),0,8));
$unique = $rand;

$user_data=array(
    "password" => _hash_string($unique) ,
    "firsttime_pw" => "1"
);

update_from($user_data, $user_id, $table_name, "user_id");

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

        $mail->Subject = "Your MuscleDep0t New Password" ;
        $mail->Body = "Dear Mr./Ms. " . $firstname  . " " . $lastname ."
        <br><br>May the gains be with you!
        <br><br>Dropping your New Password here: <br><b>$unique</b>
        <br><br>Remember to change your password as soon as possible for (+2 reps).
        <br><br>For further inquiries: You may contact us at +639XXXXXXXXX or you may email us at xxx@gmail.com
        <br><br>Yours truly,
        <br>MuscleDep0t
        <br><br>";

        $mail->addAddress($email_address);

        if ($mail->Send() ) {
            echo "Mail Send";
            $_SESSION['alert_msg']=1; 
        }else{
            echo "Error<br>". $mail->ErrorInfo;
        }

        echo $mail->Body;

        $mail->smtpClose();
    }
    header("Location:../subscriptions/user_subscriptions?id=".urlencode($user_id));
}
?>