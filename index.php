<?php

include_once 'header.php';
include_once 'feed.php';

?>

<section class="index-intro">
<?php

if (isset($_SESSION["useruid"])) {
    echo "<p>Welcome here " . $_SESSION["useruid"] . "</p>";
} 

?>


<?php

include_once 'footer.php';

?>