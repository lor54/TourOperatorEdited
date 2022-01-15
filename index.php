<?php
    require('db.php');
    include("auth.php");

    if($_SESSION["email"] == "staff") {
        include "admin.php";
    } else {
        include "user.php";
    }
?>