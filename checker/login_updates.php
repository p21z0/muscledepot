<?php
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
include("countdown_subscription.php");
echo "--------------------------------------------------------------------<br>";
include("checker_subscription.php");
echo "--------------------------------------------------------------------<br>";
include("countdown_membership.php");
echo "--------------------------------------------------------------------<br>";
include("checker_membership.php");
echo "--------------------------------------------------------------------<br>";
include("checker_user.php");
echo "--------------------------------------------------------------------<br>";

header("Location: ../users/index.php");
?>