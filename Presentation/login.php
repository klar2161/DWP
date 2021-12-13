<?php

include_once 'header.php';

?>
<html>
<section class="login-form">
    <h2>LOG IN</h2>
    <br></br>




        <form method="post" action="../Application/login.inc.php" id="demo-form">
                   <input type="text" name="uid" placeholder="Username..">  
            <input type="password" name="pwd" placeholder="Password.."> <input type="hidden" value="sub" name="sub">
        <?php
          include_once('../Application/recaptchalib.php');
          $publickey = "6LdYQ48dAAAAAGCYA5Gza-EbqpaV29KiSdrIc-7C"; // you got this from the signup page
          echo recaptcha_get_html($publickey);
          
        ?>
        <button class="g-recaptcha" 
        data-sitekey="6LdYQ48dAAAAAGCYA5Gza-EbqpaV29KiSdrIc-7C" 
        data-callback='onSubmit' 
        data-action='submit'>Submit</button>

      </form>
      </html>
    
    <?php

if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
    }
    else if ($_GET["error"] == "wronglogin") {
        echo "<p>Incorrect login, please try again!</p>";
    }
}

?>


</section>


<?php

include_once 'footer.php';

?>