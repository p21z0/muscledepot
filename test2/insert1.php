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
            $now = date("Y-m-d H:i:s");

            echo $text." ".$table_name." ".$now;

            $user_data=array(
                "user_id" => $user_id ,
                "reference" => $text ,
                "time_in" => $now
            );

            echo insert($user_data, $table_name);
            $voice->speak($message);
        }
    }

header("Location: test_qr_2.php");
?>