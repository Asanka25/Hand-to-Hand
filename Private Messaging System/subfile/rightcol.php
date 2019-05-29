<div id="rightColContainer">
    <div id="messageContainer">
        

    <?php
        $noMessage = false;
        if(isset($_GET['user'])){
            $_GET['user'] = $_GET['user'];
        }else{
            $q = 'SELECT `sendername`,`recievername` FROM `messages` 
                WHERE `sendername` = "'.$_SESSION['username'].'" 
                or `recievername` = "'.$_SESSION['username'].'"
                ORDER BY `datetime` DESC LIMIT 1 ';

            $r = mysqli_query($con, $q);

            if($r){
                if(mysqli_num_rows($r)>0){
                    while($row = mysqli_fetch_assoc($r)){
                        $sendername = $row['sendername'];
                        $recievername = $row['recievername'];

                        if($_SESSION['username'] == $sendername){
                            $_GET['user'] = $recievername;
                        }else{
                            $_GET['user'] = $sendername;
                        }
                    }
                }else{
                    echo 'No messages from you';
                    $noMessage = true;
                }
            }else{ 
                echo $q;
            }
        }

        if($noMessage == false){    
        $q = 'SELECT * FROM `messages` WHERE `sendername` = "'.$_SESSION['username'].'" and `recievername` = "'.$_GET['user'].'"
                or `sendername` = "'.$_GET['user'].'" and `recievername` = "'.$_SESSION['username'].'" ';

        $r = mysqli_query($con, $q);

        if($r){
            while($row = mysqli_fetch_assoc($r)){
                $sendername = $row['sendername'];
                $recievername = $row['recievername'];
                $message = $row['messagetext'];

                if($sendername == $_SESSION['username']){
                    //show the message with grey back
                    ?>
                    <div class="greyMessage">
                    <a href="" style="float:right; color:white;">Me</a> <br>
                        <p><?php echo $message; ?></p> 
                    </div>
                    <?php
                }else{
                    //Show the message with white back
                    ?>
                    <div class="whiteMessage">
                    
                    <a href=""><?php echo $sendername; ?></a> <br>
                        <p><?php echo $message; ?></p> 
                    </div>
                                
                    <?php
                }
            }
        }else{
            echo $q;
        }
        }
    ?>

        
        
    </div>
    <form action="" method="POST" id="messageForm">
        <textarea class='textarea' name="" id="messageText" cols="30" rows="10" placeholder="Write your message here..."></textarea>
    </form>
    
</div>

<script src="subfile/jquery-3.4.1.min.js"></script>
<script>
    $("document").ready(function(event){

        $("#rightColContainer").on("submit", "#messageForm", function(){
            var messageText = $("#messageText").val();
            $.post("subfile/sendingprocess.php?user=<?php  echo $_GET['user']; ?>",{
                text : messageText,
            },
            function (data, status){
                $("#messageText").val("");
                document.getElementById("messageContainer").innerHTML += data;
            }
            );
        });

        $("#rightColContainer").keypress(function(e){
            
            if(e.keyCode == 13 && !e.shiftKey)

                $("#messageForm").submit();
        });

    });
</script>