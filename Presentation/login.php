<?php

include_once 'header.php';

?>

<section class="login-form">
    <h2>LOG IN</h2>
    <br></br>
    <form action="../Application/login.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username..">  
        <input type="password" name="pwd" placeholder="Password..">
        <button type="submit" name="submit">Log In</button>
    </form>
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