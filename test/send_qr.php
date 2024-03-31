<?php
    session_start();

    include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");

// $id = $_GET['id'];
// echo $id;
$table_name = "tbl_users";
$get_userData = get_where_custom($table_name, 'user_id', '4');
//fetch result and pass it  to an array
foreach ($get_userData as $key => $row) {
    $id = $row['user_id'];
    // $email = $row['email_address'];
    $email='egoalter413@gmail.com';
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $user_qr = $row['user_qr'];
    
}
date_default_timezone_set('Asia/Singapore');
$xdate=date('M-d-Y');
$xtime=date('h:i:sa');

require ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/phpmailer/PHPMailer.php");
require ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/phpmailer/SMTP.php");
require ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/phpmailer/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
$mail->Body = "Dear Mr./Ms. " . $firstname  . " " . $lastname ."
<br><br>Good Day!

<br><br>This is your QR Code for MuscleDep0t tracking:<br><img src='https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl='$user_qr?>
<br><br>For further inquiries: You may contact us at +639XXXXXXXXX or you may email us at xxx@gmail.com
<br><br>yours truly,
<br>xxx
<br><br>";
$mail->addAddress($email);

if ($mail->Send() ) {
    echo "Mail Send";
    //  header("Location: index.php");
}else{
    echo "Error<br>". $mail->ErrorInfo;
}

echo $mail->Body;

$mail->smtpClose();

?>
