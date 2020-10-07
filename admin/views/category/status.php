<?php
    $id = $_REQUEST["id"];
    $category = loadModel('category');
    $row = $category -> category_row(['id' => $id]);
    if($row == null)
    {
        set_flash('message',['type' => 'danger','msg' => 'Thất Bại!','msgc' => 'Không tồn tại sản phẩm']);
        redirect("index.php?option=category");
    }
    $tt = ($row['status']==1)?2:1;
    $userid=(isset($_SESSION["userid"]))?$_SESSION["userid"]:1;
    $data = array(
        'status' => $tt, 
        'updated_by' => $userid,
        'updated_at' => date('Y-m-d H:i-s')
    );
    $category->category_update($data, $id);

    set_flash('message',['type' => 'success','msg' => 'Thành Công', 'msgc' => 'Thay đổi trạng thái thành công']);
    redirect("index.php?option=category");
?>