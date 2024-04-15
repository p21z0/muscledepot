<?php
    include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
    date_default_timezone_set("Asia/Singapore");
    $table_name = 'tbl_users';
    $column = "user_id";
    $id = $_GET['id'];
    // $id="5";
    // echo $FILES["webcam"]["tmp_name"];
    if(isset($_FILES["webcam"]["tmp_name"])){

        // delete old picture from local directory
        $user_data=get_where_custom($table_name, "user_id", $id);
        foreach ($user_data as $key => $row){
            $user_pic_old="../img/".$row['user_pic'];

            // Use unlink() function to delete a file 
            if (!unlink($user_pic_old)) { 
                echo ("$user_pic_old cannot be deleted due to an error"); 
            } 
            else { 
                echo ("$user_pic_old has been deleted"); 
            } 
        
        }

        // get tmp_name and upload
        $tmpName = $_FILES["webcam"]["tmp_name"];
        $user_pic = date("Y.m.d")."-".date("h.i.sa").'.jpeg';
        move_uploaded_file($tmpName, '../img/'.$user_pic);

        $user_editedValues=array(
            "user_pic" => $user_pic
        );

        update_from($user_editedValues, $id, $table_name, $column);
        // header("Location: user_picture.php?id=".urlencode($id));
    }
?>