<?php
 $id = $_REQUEST['id'];
 $slider = loadModel('slider');
 $row = $slider->slider_row(['id' => $id]);
 if ($row == null) 
 {
    set_flash('message', ['type' => 'danger', 'msg' => 'Thất Bại','msgc'=>'Loại sản phẩm không tồn tại!']);
redirect('index.php?option=slider&cat=trash');
}

$userid=(isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
$data = array(
'status' =>2,
'updated_at' => date('Y-m-d H:i:s'),
'updated_by' =>$userid ,
);
$slider->slider_update($data, $id);
set_flash('message', ['type' => 'success', 'msg' => 'Thành Công!','msgc'=>'Thay đổi thành công!']);
redirect('index.php?option=slider&cat=trash');