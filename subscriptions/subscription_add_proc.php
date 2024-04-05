    <?php

session_start();
include_once ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");

$table_name = "tbl_subscription";
$user_id=$_GET['id'];
$user_id_1=$_GET['id'];
$header_location="Location: user_subscriptions.php?id=".urlencode($user_id);

$sub_name=$_POST['sub_name'];
$amount=$_POST['amount'];
$pt_count=$_POST['pt_count'];
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];

$user_id=$_GET['id'];
$amount =$_POST['amount'];
// $sub_description=$_POST['sub_description'];
$subscription_type="Custom";

// echo $startdate."<br>".$enddate;

if ($enddate < $startdate)
{
    echo "bawal";
    // session for alerting
} else
{
    $subscription_data=array(
        "subscription_name" => $sub_name,
        "user_id" => $user_id ,
        "amount" => $amount ,
        "pt_count" => $pt_count ,
        "subscription_type" => $subscription_type,
        "subscription_start" => $startdate ,
        "subscription_end" => $enddate
    );

    echo insert($subscription_data, $table_name);
    echo "<br>";
    include("../checker/countdown_subscription.php");
    echo "--------------------------------------------------------------------<br>";
    include("../checker/checker_subscription.php");
    echo "--------------------------------------------------------------------<br>";
    include("../mailing/send_subscription_success.php");
    include("../checker/checker_user.php");
}
echo $user_id;
header("Location: user_subscriptions.php?id=".urlencode($user_id_1));
?>
