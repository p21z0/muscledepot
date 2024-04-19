<?php
    session_start();
    include ($_SERVER['DOCUMENT_ROOT']."/MuscleDepot/must/perfect_function.php");
    date_default_timezone_set("Asia/Singapore");

    if(isset($_POST['text'])){
        $text = $_POST['text'];
        $user_id_count=get_where_custom_count("tbl_users", "user_qr", $text);
        // $voice= new com("SAPI.SpVoice");

        if($user_id_count>0){
            $user_id_fetch=get_where_custom("tbl_users", "user_qr", $text);
            // echo $user_id_count;
            foreach($user_id_fetch as $key => $row){
                $user_id=$row['user_id'];
                $firstname=$row['firstname'];
                $message = "Hi ".$firstname. ", your time in has been recorded. Welcome to Muscle Depot. Sheesh!";

                $table_name = "tbl_timelogs";
                $timelog_type = "time in";
                $now_day = date("Y-m-d");
                $now_hour = date("H:i:s");

                // echo $text." ".$table_name." ".$now;

                $user_data=array(
                    "user_id" => $user_id ,
                    "reference" => $text ,
                    "timelog_type" => $timelog_type ,
                    "time_day" => $now_day ,
                    "time_hour" => $now_hour
                );

                echo insert($user_data, $table_name);
                // $voice->speak($message);
                $_SESSION['message_stat']=1;
            }
        } elseif (($user_id_count<=0)){
            $message = "Sorry, your QR is invalid. Please see any gym personnel for assistance";
            $_SESSION['message_stat']=0;
            // $voice->speak($message);
        }
        // echo $message;

        
    }
?>

    <!-- <script>
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});

    const synth = window.speechSynthesis;
    let speech = new SpeechSynthesisUtterance();
    // const voices = synth.getVoices();
    // speech.voice = voices[8];
    // speech.lang = "en-US";
              
    // Listen for the 'voiceschanged' event to ensure voices are loaded
    synth.onvoiceschanged = function() {
        const voices = synth.getVoices();
        const allowedIndices = [0, 1, 2, 4, 5, 6];
        const randomIndex = allowedIndices[Math.floor(Math.random() * allowedIndices.length)];
        speech.voice = voices[randomIndex];
    };

    Instascan.Camera.getCameras().then(function(cameras){
      if(cameras.length>0){
        scanner.start(cameras[0]);
      } else {
        alert('No cameras found');
      }
    }).catch(function(e){
      console.error(e);
    });
    scanner.addListener('scan', function(c){
      document.getElementById('text').value=c;

        speech.text="<?=$message?>";
        synth.speak(speech);
        speech.onend = function(event) {
            setTimeout("document.forms[0].submit();",3000);
        };
    });
  </script> -->

<?php
header("Location: time_in.php");
?>