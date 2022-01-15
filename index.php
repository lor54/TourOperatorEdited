<?php
    require('db.php');
    include("auth.php");

    if($_SESSION["tipo"] == "staff") {
        include "admin.php";
    } else {
        include "user.php";
    }
?>