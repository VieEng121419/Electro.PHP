 <?php
    $title='Thanh Toán';
    $user=loadModel('user');
	$userid= $_SESSION['userid_customer'];
	$fullname=  $_SESSION['user_customer'];
    $row_user=$user->user_row(['username'=>$fullname,'access'=>0,'status'=>1 ]);
    // echo $row_user['id'];
	if(isset($_POST['LUU']))
	{
		$order=loadModel('order');
		$orderdetail=loadModel('orderdetail');
		$data_order=array(
			'code'=>date('YmdHis'),
			'userid'=>$userid,
			'exportdate'=> date('Y-m-d'),
			'deliveryaddress'=> (strlen($_POST['deliveryaddress']))?$_POST['deliveryaddress']:$row_user['address'],
			'deliveryname'=>(strlen($_POST['deliveryname']))?$_POST['deliveryname']:$row_user['fullname'],
			'deliveryemail'=>(strlen($_POST['deliveryemail']))?$_POST['deliveryemail']:$row_user['email'],
			'deliveryphone'=> (strlen($_POST['deliveryphone']))?$_POST['deliveryphone']:$row_user['phone'],			
			'updated_at'=>date('Y-m-d H:i:s'),
			'updated_by'=> $userid,
			'status'=>2
		);
        $orderid=$order->order_insert($data_order,$insert=TRUE);
        $index=0;
        
        if($orderid != null)
        {
            foreach($_SESSION['order_detail'] as $order)
            {
            $data_orderdetail = array(
                'orderid'=> $orderid,
                'productid'=>$_SESSION['orderdetail'.$index]['0'],
                'price'=>$_SESSION['orderdetail'.$index]['4'],
                'quantity'=>$_SESSION['orderdetail'.$index]['2'],
                'amount'=>$_SESSION['orderdetail'.$index]['3']
            );
            $index++;
            $orderdetail->orderdetail_insert($data_orderdetail);
            }
        }      
        unset($_SESSION['cart']);
        redirect('index.php');
	}
 ?>
 <?php require_once("views/header.php")?>
 <!-- SECTION -->
 <div class="section">

     <!-- container -->
     <div class="container">
         <!-- row -->
         <div class="row">
             <form action="index.php?option=cart&cat=buy" method="post">

                 <div class="col-md-7">

                     <!-- Billing Details -->
                     <div class="billing-details">
                         <div class="section-title">
                             <h3 class="title">Địa Chỉ Thanh Toán</h3>
                         </div>
                         <div class="form-group">
                             <input class="input" type="text" name="fullname"
                                 value="<?php echo $row_user['fullname'];?>">
                         </div>
                         <div class="form-group">
                             <input class="input" type="email" name="email" value="<?php echo $row_user['email'];?>">
                         </div>
                         <div class="form-group">
                             <input class="input" type="text" name="address" value="<?php echo $row_user['address'];?>">
                         </div>
                         <div class="form-group">
                             <input class="input" type="tel" name="phone" value="<?php echo $row_user['phone'];?>">
                         </div>
                         <div class="form-group">
                             <input class="input" type="text" name="deliveryname" placeholder="Người Nhận">
                         </div>
                         <div class="form-group">
                             <input class="input" type="text" name="deliveryphone" placeholder="Số ĐT Người Nhận">
                         </div>
                         <div class="form-group">
                             <input class="input" type="text" name="deliveryemail" placeholder="Email Người Nhận">
                         </div>
                         <div class="form-group">
                             <input class="input" type="text" name="deliveryaddress" placeholder="Địa Chỉ Người Nhận">
                         </div>
                         <div class="form-group">
                             <input class="input" type="tel" name="tel" placeholder="Số ĐT">
                         </div>
                     </div>
                     <!-- /Billing Details -->

                 </div>

                 <!-- Order Details -->
                 <div class="col-md-5 order-details">
                     <div class="section-title text-center">
                         <h3 class="title">Đơn Hàng Của Bạn</h3>
                     </div>
                     <div class="order-summary">
                         <div class="order-col">
                             <div><strong>SẢN PHẨM</strong></div>
                             <div><strong>TỔNG</strong></div>
                         </div>
                         <div class="order-products">
                             <?php $index=0;?>
                             <?php foreach($_SESSION['order_detail'] as $order):?>
                             <div class="order-col">
                                 <div><?php echo $_SESSION['orderdetail'.$index]['2'];?> x
                                     <?php echo $_SESSION['orderdetail'.$index]['1'];?></div>
                                 <div><?php  echo number_format($_SESSION['orderdetail'.$index]['3']);?><sup>đ</sup>
                                 </div>
                             </div>
                             <?php $index++;?>
                             <?php endforeach;?>
                         </div>
                         <div class="order-col">
                             <div>Phí Vận Chuyển</div>
                             <div><strong>Miễn Phí</strong></div>
                         </div>
                         <div class="order-col">
                             <div><strong>TỔNG</strong></div>
                             <div><strong
                                     class="order-total"><?php echo number_format($_SESSION['total']);?><sup>đ</sup></strong>
                             </div>
                         </div>
                     </div>
                     <div class="input-checkbox">
                         <input type="checkbox" id="terms">
                         <label for="terms">
                             <span></span>
                             Tôi đã đọc <a href="#">và đồng ý với các điều khoản</a>
                         </label>
                     </div>
                     <button type='submit' name='LUU' class="primary-btn order-submit">Đặt Hàng</button>
                 </div>
                 <!-- /Order Details -->
             </form>
         </div>
         <!-- /row -->
     </div>
     <!-- /container -->
 </div>
 <!-- /SECTION -->
 <?php require_once("views/footer.php")?>