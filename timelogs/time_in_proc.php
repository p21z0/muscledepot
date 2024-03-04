<?php
    include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
    date_default_timezone_set("Asia/Singapore");

    if(isset($_POST['text'])){
        $voice= new com("SAPI.SpVoice");
        $text = $_POST['text'];
        

        $user_id_fetch=get_where_custom("tbl_users", "user_qr", $text);
        foreach($user_id_fetch as $key => $row){
            $user_id=$row['user_id'];
            $firstname=$row['firstname'];
            $message = "Hi gago ka. tang ina mo Creak, Carl judd and ".$firstname. "Pakyu pakyu";

            $table_name = "tbl_timelogs";
            $timelog_type = "time in";
            $now_day = date("Y-m-d");
            $now_hour = date("H:i:s");

            echo $text." ".$table_name." ".$now;

            $user_data=array(
                "user_id" => $user_id ,
                "reference" => $text ,
                "timelog_type" => $timelog_type ,
                "time_day" => $now_day ,
                "time_hour" => $now_hour
            );

            echo insert($user_data, $table_name);
            $voice->speak($message);
        }
    }

header("Location: time_in.php");
?>