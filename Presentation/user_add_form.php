<?php

include_once 'header.php';

?>

<section class="signup-form">
    <br></br>   
    <br></br>
    <h2>Create user</h2>
    <br></br>
    <form action="../Application/addtodb.php" method="post">
        <input type="text" name="email" placeholder="Email..">
        <input type="text" name="username" placeholder="Username..">
        <input type="password" name="password" placeholder="Password..">
        <button type="submit" name="submit">Submit</button>
        
    </form>
    
    <?php
    
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
    }
    else if ($_GET["error"] == "invaliduid") {
        echo "<p>Choose a proper username!</p>";
    }
    else if ($_GET["error"] == "invalidemail") {
        echo "<p>Choose a proper email!</p>";
    }
    else if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p>Passwords does not match!!</p>";
    }
    else if ($_GET["error"] == "stmtfailed") {
        echo "<p>Something went wrong! Try again :(!</p>";
    }
    else if ($_GET["error"] == "usernametaken") {
        echo "<p>Choose another username!!</p>";
    }
    else if ($_GET["error"] == "none") {
        echo "<p>You have succesfully signed up! :)</p>";
    }
}



?>
</section>




<?php

include_once 'footer.php';

?>




