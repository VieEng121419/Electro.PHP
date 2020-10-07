<?php
    if(isset($_REQUEST['cat']))
    {
        $cat=$_REQUEST['cat'];
        if($cat =='login')
        {
            require_once('views/customer-login.php');
        }
    }
?>