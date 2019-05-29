<div id="leftColContainer">
    <div class='whiteBack'>
        <p style="cursor:pointer; font-size:22px;"  onclick='document.getElementById("newMessage").style.display = "block"'align="center">New Message</p> <hr>
    </div>

<?php 
$q = 'SELECT DISTINCT  `recievername`, `sendername` FROM `messages` WHERE `sendername` = "'.$_SESSION['username'].'" 
        OR `recievername` = "'.$_SESSION['username'].'"  ORDER BY `datetime` DESC ';

$r = mysqli_query($con, $q);

if($r){
    if(mysqli_num_rows($r)>0){
        $counter = 0;
        $addedUser = array();
        while($row = mysqli_fetch_assoc($r)){
            $sendername = $row['sendername'];
            $recievername = $row['recievername'];

            if($_SESSION['username'] == $sendername){
                if(in_array($recievername, $addedUser)){

                }else{

                    ?>
                    <div class='greyBack'>
                        <img src="images/profilePic.png" class="image"   alt="" srcset="">
                        <?php  echo '<a href="?user='.$recievername.'">'. $recievername.'</a>';?> 
                    </div>
                    
                    <?php

                    $addedUser = array($counter => $recievername);
                    $counter++;

                }
            }elseif($_SESSION['username'] == $recievername){
                if(in_array($sendername, $addedUser)){

                }else{

                    ?>
                    <div class='greyBack'>
                        <img src="images/profilePic.png" class="image"   alt="" srcset="">
                        <?php  echo '<a href="?user='.$sendername.'">'. $sendername.'</a>';?> 
                    </div>
                    
                    <?php

                    $addedUser = array($counter => $sendername);
                    $counter++;

                }
            }
        }
    }else{
        echo "No Users!";
    }
}else{
    echo $q;
}
?>



    
</div>

