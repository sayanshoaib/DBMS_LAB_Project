<?php 

session_start();
if(
    isset($_SESSION['myemail'])
    && !empty($_SESSION['myemail'])
) {
    unset($_SESSION['myemail']);
    session_destroy();

    ?>
        <script>location.assign("login.php");</script>
    <?php
}
else{
    ?>
        <script>location.assign("login.php");</script>
    <?php
}

?>