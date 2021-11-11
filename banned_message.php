<?php
    session_start();


?>
<link rel="stylesheet" href="style.css">
<nav>
    <div class="wrapper">
        <a href="index.php"><img src="img/logo2.png" alt="Logo" class="logo"></a>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <?php

                if (isset($_SESSION["useruid"])) {
                    echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
                }
                

                ?>



            
        </ul>

    </div>
</nav>

<div>
<h1>You are banned bratan,unlucky</h1>
</div>