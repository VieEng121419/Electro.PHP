<?php
    $id = $_REQUEST["id"];
    $contact = loadModel('contact');
    $row = $contact -> contact_row(['id' => $id]);
    if($row == null)
    {
        set_flash('message',['type' => 'danger','msg' => 'Thất Bại!','msgc' => 'Không tồn tại sản phẩm']);
        redirect("index.php?option=contact&cat=trash");
    }
    $contact->contact_delete($id);
    set_flash('message',['type' => 'success','msg' => 'Thành Công', 'msgc' => 'Xóa sản phẩm thành công']);
    redirect("index.php?option=contact&cat=trash");