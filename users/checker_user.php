<?php
    $user_data=get("tbl_users");
    foreach ($user_data as $key => $row) 
    {
        $user_id=$row['user_id'];
        $active_subs_count=active_subs_count($user_id);
        if ($active_subs_count > 0)
        {
            $user_editedValues=array("user_status" => "1");
        } else
        {
            $user_editedValues=array("user_status" => "0");
        }
        update_from($user_editedValues, $user_id, "tbl_users", "user_id");
        // echo "sheeeeeeeesh";
    }
?>
