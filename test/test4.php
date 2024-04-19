<?php
session_start();

if (isset($_SESSION['message'])) {
    // Get the message
    $message = $_SESSION['message'];

    // Clear the message so it doesn't keep showing
    unset($_SESSION['message']);

    // Echo only the message content
    echo $message;
} else {
    // If no message is set, return an empty response
    echo "";
}
?>
