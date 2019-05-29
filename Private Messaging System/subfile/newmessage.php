
<div id='newMessage'>
    <p class="mHeader">New Message <img onclick='document.getElementById("newMessage").style.display = "none"' src="images/closeIcon.jpg" style="border-radius:100%;float:right;" width="18px" height="18px" alt="closeIcon"></p>
    <p class="mBody">
        <form align=center action="" method="POST">
            <input type="text" list = 'user' onkeyup = "checkInDb();" id='username' class='messageInput' name='username' placeholder="Username"  >
            
            <datalist id='user'></datalist>

            <br> <br>
            <textarea class='messageInput' name="message" id="" cols="30" rows="5" placeholder="Write Your Message"></textarea> <br> <br>
            <input type="submit" id='send' value="send" name="send"> 
            <button onclick='document.getElementById("newMessage").style.display = "none"'>Cancel</button>
        </form>
    </p>
    <p class="mFooter">Click send to send</p>
</div>

<?php
    
    require_once('connection.php');
    if(isset($_POST['send'])){
        $sendername = $_SESSION['username'];
        $recievername = $_POST['username'];
        $message = $_POST['message'];
        $date = date("Y-m-d h:i:sa");

        $q = "INSERT INTO messages (id,sendername, recievername, messagetext, datetime)
        VALUES ('', '$sendername','$recievername','$message','$date')";
        
        $r = mysqli_query($con, $q);

        if($r){
            //echo "message sent";
            header("location:index.php?user=".$recievername );
        }else{
            echo $q;
        }
        
    }
?>

<script src="subfile/jquery-3.4.1.min.js"></script>
<script>
    document.getElementById('send').disabled = true;
    function checkInDb(){
        var username = document.getElementById('username').value;

        $.post("subfile/checkindb.php",
        {
            user:username
        },
        function(data, status){
            //alert(data);
            //document.getElementById('user').innerHTML = data;

            if(data == '<option value="no user">'){
                document.getElementById('send').disabled = true;
            }else{
                document.getElementById('send').disabled = false;
            }
            document.getElementById('user').innerHTML = data;
        }
        );
    }

    
</script>