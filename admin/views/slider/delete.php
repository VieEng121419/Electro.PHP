<?php
 $slider = loadModel('slider');
 $id = $_REQUEST['id'];

 $row = $slider->slider_row(['id' => $id]);
 if ($row == null) 
 {
set_flash('message', ['type' => 'danger', 'msg' => 'Thất Bại','msgc'=>'Loại sản phẩm không tồn tại!']);
redirect('index.php?option=slider&cat=trash');
}

$slider->slider_delete($id);
set_flash('message', ['type' => 'success', 'msg' => 'Thành Công!','msgc'=>'Xóa thành công!']);
redirect('index.php?option=slider&cat=trash');