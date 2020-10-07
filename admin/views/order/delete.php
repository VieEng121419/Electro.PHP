<?php
    $id = $_REQUEST["id"];
    $order = loadModel('order');
    $row = $order -> order_row(['id' => $id]);
    if($row == null)
    {
        set_flash('message',['type' => 'danger','msg' => 'Thất Bại!','msgc' => 'Không tồn tại sản phẩm']);
        redirect("index.php?option=order&cat=trash");
    }
    $order->order_delete($id);
    set_flash('message',['type' => 'success','msg' => 'Thành Công', 'msgc' => 'Khôi phục đơn hàng thành công']);
    redirect("index.php?option=order&cat=trash");