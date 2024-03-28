<?php
include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
// $total_sum=0;

echo $total_sum=sum_where("tbl_subscription", "pt_count", "user_id", "4");
