<?php
    require_once('system/core.php');
    unset($_SESSION["user_customer"]);
    unset($_SESSION["userid_customer"]);
    unset($_SESSION["fullname_customer"]);
    unset($_SESSION["img_customer"]);
    redirect("index.php");
?>