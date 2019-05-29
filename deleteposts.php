


<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="postd.css">
</head>

<div class="container2" id="container2"> 
  <form id="contact" action="postd.php" method="post" >
    <h3>Delete Your Post</h3>
    <hr>
    <h4>Give Your Name, Password and Post Id</h4>
    <fieldset>
      <input id="name" placeholder="Name" name="name" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Password" id="password" name="password" type="password" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Post ID" name="id" type="text" id="id" tabindex="2" required>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Delete Post</button>
    </fieldset>

  </form>
</div>