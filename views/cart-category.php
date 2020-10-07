<?php
$cart=loadClass('cart');
$product = loadModel('product');
if(!isset($_SESSION['user_customer']))
{
    redirect("index.php?option=customer&cat=login");
}
else{
    if(isset($_REQUEST['total']))
    {
        $total=$_REQUEST['total'];
	}
	require_once('views/cart-buy.php');
}
$title='Thanh Toán';
?>
