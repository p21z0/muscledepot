<?php
    include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
    date_default_timezone_set("Asia/Singapore");

    if(isset($_POST['text'])){
        $text = $_POST['text'];
        $user_id_count=get_where_custom_count("tbl_users", "user_qr", $text);
        $voice= new com("SAPI.SpVoice");
        if($user_id_count>0){
            $user_id_fetch=get_where_custom("tbl_users", "user_qr", $text);
            echo $user_id_count;
            foreach($user_id_fetch as $key => $row){
                $user_id=$row['user_id'];
                $firstname=$row['firstname'];
                $message = "Hi ".$firstname. ", your time in has been recorded. Welcome to Muscle Depot. Sheesh!";

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
        } elseif (($user_id_count<=0)){
            $message = "Sorry, your QR is invalid. Please see any gym personnel for assistance";
            $voice->speak($message);
        }
        
    }

header("Location: time_in.php");
?>