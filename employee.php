    <!DOCTYPE html>
    <html lang="en" >
    <head>
      <meta charset="UTF-8">
      <title>Continue as Employee</title>
      
      
      <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
          <link rel="stylesheet" href="./assets/css/style2.css">
      
    </head>
    <body>
      <div class="login-wrap">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
      <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
          <form class="sign-in-htm" action="mysql/logine.php" method="POST">
            <div class="group">
              <label for="user" class="label">Username or Email</label>
              <input id="username" name="username" type="text" class="input" required>
            </div>
            <div class="group">
              <label for="pass" class="label">Password</label>
              <input id="password" name="password" type="password" class="input" data-type="password" required>
            </div>
            <div class="group">
              <input id="check" type="checkbox" class="check" checked>
              <label for="check"><span class="icon"></span> Keep me Signed in</label>
            </div>
            <div class="group">
              <input type="submit" class="button" value="Sign In">
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
              <a href="#forgot">Forgot Password?</a>
            </div>
          </form>
          <form class="sign-up-htm" action="mysql/signupe.php" method="POST">
            <div class="group">
              <label for="user" class="label">Username</label>
              <input id="username" name="username" type="text" class="input" required>
            </div>
            <div class="group">
              <label for="email" class="label">Email</label>
              <input id="email" name="email" type="text" class="input" required>
            </div>
            <div class="group">
              <label for="mnum" class="label">Mobile Number</label>
              <input id="mnum" name="mnum" type="text" class="input" required>
            </div>
            <div class="group">
              <label for="location" class="label">Location</label>
              <input id="location" name="location" type="text" class="input" required>
            </div>
            <div class="group">
              <label for="pass" class="label">Password</label>
              <input id="password" name="password" type="password" class="input" data-type="password" minlength="6" required>
            </div>
            <div class="group">
              <label for="pass" class="label">Confirm Password</label>
              <input id="pass" name="cpassword" type="password" class="input" data-type="password" minlength="6" required>
            </div>
            <div class="group">
              <input type="submit" class="button" value="Sign Up">
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
              <label for="tab-1">Already Member?</a>
            </div>
          </form>
        </div>
      </div>
    </div>
      
      
    </body>
    </html>