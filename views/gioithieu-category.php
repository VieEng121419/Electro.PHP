<?php 
    $title='Liên hệ, hỗ trợ khách hàng';  
    if(isset($_POST['GUI']))
    {
        $contact=loadModel('contact');
        $data_contact= array(
            'fullname'=> $_POST['fullname'],
            'email'=>$_POST['email'],
            'phone'=>$_POST['phone'],
            'title'=>'Thư khách hàng',
            'detail'=>$_POST['detail'],
            'replaydetail'=>null,
            'created_at'=>date('Y-m-d H:i:s'),        
            'updated_at'=>date('Y-m-d H:i:s'),
            'updated_by'=> $userid,
            'status'=>1
        );
       $contact->contact_insert($data_contact);
       redirect('index.php?option=gioithieu&cat=gioithieu');
    }
?>
<?php require_once('views/header.php');?>
<div class="container">
    <div class="row" style="margin-top:20px;margin-bottom:20px;">
        <div class="col-md-5">
            <div>
                <h2 class='tieude'>ELECTRO. HÂN HẠNH PHỤC VỤ QUÝ KHÁCH </h2>
            </div>
            <form action="index.php?option=gioithieu&cat=gioithieu" method='post'>
                <div>
                    <input class='input1' type="text" name="detail" placeholder="Nội dung">
                </div>
                <div>
                    <input class='input1' type="text" name="fullname" placeholder="Họ và tên của quý khách ">
                </div>
                <div>
                    <input class='input1' type="tel" name="phone" placeholder="Số điện thoại của quý khách ">
                </div>
                <div>
                    <input class='input1' type="text" name="email" placeholder="Email của quý khách">
                </div>
                <div>
                    <button class='submit' type="submit" name="GUI">GỬI GÓP Ý</button>
                </div>
            </form>
        </div>
        <div class="col-md-7">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.751763977546!2d106.77278475023331!3d10.83029929224707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752701a34a5d5f%3A0x30056b2fdf668565!2zVHLGsOG7nW5nIENhbyDEkOG6s25nIEPDtG5nIFRoxrDGoW5nIFRQLkhDTQ!5e0!3m2!1svi!2s!4v1597760776154!5m2!1svi!2s"
                width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
        </div>
    </div>
</div>
<?php require_once('views/footer.php');?>