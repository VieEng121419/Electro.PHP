<?php
    $id = $_REQUEST["id"];
    $product = loadModel('product');
    $row = $product -> product_row(['id' => $id, 'status' => 0]);
    if($row == null)
    {
        set_flash('message',['type' => 'danger','msg' => 'Thất Bại!','msgc' => 'Không tồn tại sản phẩm']);
        redirect("index.php?option=product&cat=trash");
    }
    if(file_exists('../public/front-end/img/product/'.$row['img']))
    {
        unlink('../public/front-end/img/product/'.$row['img']);
    }
    $product->product_delete($id);
    set_flash('message',['type' => 'success','msg' => 'Thành Công', 'msgc' => 'Xóa sản phẩm thành công']);
    redirect("index.php?option=product&cat=trash");