<?php
    require_once("../connection.php");
    if(isset($_POST['user'])){
        $q = 'SELECT * FROM `usertable` WHERE  `name` = "'.$_POST['user'].'"';
        $r = mysqli_query($con, $q);
        if($r){
            if(mysqli_num_rows($r)>0){
                while($row = mysqli_fetch_assoc($r)){
                    $username = $row['username'];
                    echo '<option  value="'.$username.'">';
                }
            }else{
                echo '<option value="no user">';
            }
        }else{
            echo $q;
        }
    }

?>