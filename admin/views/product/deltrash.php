<?php
    $id = $_REQUEST["id"];
    $product = loadModel('product');
    $row = $product -> product_row(['id' => $id]);
    if($row == null)
    {
        set_flash('message',['type' => 'danger','msg' => 'Thất Bại!','msgc' => 'Không tồn tại sản phẩm']);
        redirect("index.php?option=product");
    }
    $userid=(isset($_SESSION["userid"]))?$_SESSION["userid"]:1;
    $data = array(
        'status' => 0, 
        'updated_by' => $userid,
        'updated_at' => date('Y-m-d H:i-s')
    );
    $product->product_update($data, $id);
    set_flash('message',['type' => 'success','msg' => 'Thành Công', 'msgc' => 'Xóa sản phẩm thành công']);
    redirect("index.php?option=product");