<?php
    echo "Checker user<br>";
    $user_data=get("tbl_users");
    foreach ($user_data as $key => $row) 
    {
        $user_id=$row['user_id'];
        $user_status=$row['user_status'];

        $active_subs_count=active_subs_count($user_id);
        if ($active_subs_count > 0)
        {
            if ($user_status==0){
                $user_editedValues=array("user_status" => "1");
                print_r($user_editedValues);
                echo $active_subs_count."***".$user_status."<br>";
                update_from($user_editedValues, $user_id, "tbl_users", "user_id");
            } else {
                echo $user_id." | skip update | count: ".$active_subs_count." - status: ".$user_status."<br>";
            }
        } else
        {
            if ($user_status==1){
                $user_editedValues=array("user_status" => "0");
                update_from($user_editedValues, $user_id, "tbl_users", "user_id");
            } else {
                echo $user_id." | skip update | count: ".$active_subs_count." - status: ".$user_status."<br>";
            }
        }
    }
?>
