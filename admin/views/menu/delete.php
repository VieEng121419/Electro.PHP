<?php
 $menu = loadModel('menu');
 $id = $_REQUEST['id'];

 $row = $menu->menu_row(['id' => $id]);
 if ($row == null) 
 {
set_flash('message', ['type' => 'danger', 'msg' => 'Thất Bại','msgc' => 'Loại sản phẩm không tồn tại!']);
redirect('index.php?option=menu&cat=trash');
}

$menu->menu_delete($id);
set_flash('message', ['type' => 'success', 'msg' => 'Thành Công!', 'msgc' => 'Xóa thành công']);
redirect('index.php?option=menu&cat=trash');