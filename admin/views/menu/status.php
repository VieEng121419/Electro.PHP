<?php
 $id = $_REQUEST['id'];
 $menu = loadModel('menu');
 $row = $menu->menu_row(['id' => $id]);
 if ($row == null) 
 {
set_flash('message', ['type' => 'danger', 'msg' => 'Loại sản phẩm không tồn tại!']);
redirect('index.php?option=menu');
}
$tt= ($row['status'] == 1) ? 2 : 1;
$userid=(isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
$data = array(
'status' =>$tt,
'updated_at' => date('Y-m-d H:i:s'),
'updated_by' =>$userid ,
);
$menu->menu_update($data, $id);
set_flash('message', ['type' => 'success', 'msg' => 'Thành Công!']);
redirect('index.php?option=menu');