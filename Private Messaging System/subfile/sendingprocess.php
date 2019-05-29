<?php

session_start();
require_once("../connection.php");
if(isset($_SESSION['username']) and isset($_GET['user'])){

    if(isset($_POST['text'])){

        if($_POST['text'] != ''){

            $sendername = $_SESSION['username'];
            $recievername = $_GET['user'];
            $message = $_POST['text'];
            $date = date("y-m-d h:i:sa");

            $q = "INSERT INTO messages (id,sendername, recievername, messagetext, datetime)
                VALUES ('', '$sendername','$recievername','$message','$date')";
        
        $r = mysqli_query($con, $q);

            if($r){
                //Message sent
                ?>
                <div class="greyMessage">
                <a href="">Me</a>
                    <p><?php echo $message; ?></p> 
                </div>
                <?php
            }else{
                echo $q;
            }
            
        }else{
            echo "Please write something first";
        }

    }else{
        echo "Problem with text";
    }

}else{
    echo "Please login or select a user to send a message";
}

?>