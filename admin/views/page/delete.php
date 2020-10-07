<?php
    $id = $_REQUEST["id"];
    $post = loadModel('post');
    $row = $post -> post_row(['id' => $id, 'status' => 0]);
    if($row == null)
    {
        set_flash('message',['type' => 'danger','msg' => 'Thất Bại!','msgc' => 'Không tồn tại sản phẩm']);
        redirect("index.php?option=page&cat=trash");
    }
    $post->post_delete($id);
    set_flash('message',['type' => 'success','msg' => 'Thành Công', 'msgc' => 'Xóa sản phẩm thành công']);
    redirect("index.php?option=page&cat=trash");