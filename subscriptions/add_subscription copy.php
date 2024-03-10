<?php
date_default_timezone_set("Asia/Singapore");
function add_months($months, DateTime $dateObject) 
{
    $next = new DateTime($dateObject->format('Y-m-d'));
    $next->modify('last day of +'.$months.' month');

    if($dateObject->format('d') > $next->format('d')) {
        return $dateObject->diff($next);
    } else {
        return new DateInterval('P'.$months.'M');
    }
}

function endCycle($d1, $months)
{
    $date = new DateTime($d1);

    // call second function to add the months
    $newDate = $date->add(add_months($months, $date));

    // goes back 1 day from date, remove if you want same day of month
    // $newDate->sub(new DateInterval('P1D')); 

    //formats final date to Y-m-d form
    $dateReturned = $newDate->format('Y-m-d'); 

    return $dateReturned;
}

$startDate = '2014-06-03'; // select date in Y-m-d format
$nMonths = 1; // choose how many months you want to move ahead
// $now = date("Y-m-d H:i:s");
$start = '2024-02-09';
$final = endCycle($start, $nMonths); // output: 2014-07-02
$date_today=date('Y-m-d');
echo "Time start: ".$start."<br>Time end: ".$final."<br>Time now: ",$date_today."<br>";

if ($date_today > $final){
    echo "expired";
} elseif ($date_today == $final) {
    echo "last day";
} elseif ($date_today > $start) {
    echo "early bird";
} else {
    echo "active";   
}

?>