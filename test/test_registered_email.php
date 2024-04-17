<?php
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
// Initialize array1
$array1 = array();

// Iterate over each email address in tbl_users and add it to array1
$user_data=get("tbl_users");
foreach ($user_data as $key => $row) {
    $email_address=$row['email_address'];
    $array1[] = $email_address;
}

// Variable to compare
$var1 = "egoalter412@gmail.com";

// Flag to check if $var1 exists in array1
$found = false;

// Compare $var1 with items in array1
foreach ($array1 as $item) {
    if ($var1 === $item) {
        $found = true;
        echo "$var1 exists in array1\n";
        break; // Exit loop once a match is found
    }
}

// Check if $var1 was found in array1
if (!$found) {
    echo "passed\n";
}
?>
