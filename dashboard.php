<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset ($_SESSION["username"]))
    include("logged_dashboard.php");
else
    include("public_dashboard.php");
?>