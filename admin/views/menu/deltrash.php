<?php
 $id = $_REQUEST['id'];
 $menu = loadModel('menu');
 $row = $menu->menu_row(['id' => $id]);
 if ($row == null) 
 {
    set_flash('message', ['type' => 'danger', 'msg' => 'Thất Bại','msgc' => 'Loại menu không tồn tại!']);
redirect('index.php?option=menu');
}

$userid=(isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
$data = array(
'status' =>0,
'updated_at' => date('Y-m-d H:i:s'),
'updated_by' =>$userid ,
);
$menu->menu_update($data, $id);
set_flash('message', ['type' => 'success', 'msg' => 'Thành Công!', 'msgc' => 'Xóa thành công']);
redirect('index.php?option=menu');