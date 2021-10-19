<?php 

    session_start();

    $code=$_SESSION['captcha'];

    echo $code;

?>