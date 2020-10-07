<?php
$slider = loadModel('slider');
$userid = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
if (isset($_POST['THEM']))
{
        $data=array(
            'name' => trim($_POST['name']) ,
            'link' => $_POST['link'],
            'orders' => 1,
            'created_at' => date('Y-m-d H:i:s') ,
            'created_by' => $userid,
            'updated_at' => date('Y-m-d H:i:s') ,
            'updated_by' => $userid,
            'status' => $_POST['status'],
        );
        $path_upload = '../public/img/';
        $target_file = $path_upload . basename($_FILES["img"]["name"]);
        $type_file = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       
        if (in_array($type_file,['jpg','png','gif','jpeg']))
        {
            $file_name = trim($_POST['name']).".".$type_file;
            move_uploaded_file($_FILES["img"]["tmp_name"], $path_upload.$file_name);
            $data['img'] =  $file_name;
        }
        $slider->slider_insert($data);
        set_flash('message',['type' => 'success','msg' => 'Thành Công', 'msgc' => 'Thêm thành công']);
        echo $file_name;
        // redirect("index.php?option=slider");
}
$slider = loadModel('slider');
$userid = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);

if (isset($_POST['CAPNHAT'])) 
{
    $id = $_REQUEST['id'];
    $row = $slider->slider_row(['id' => $id]);
    if ($row == null)
    {
        set_flash('message', ['type' => 'danger', 'msg' => 'Thất Bại','msgc'=>'Loại sản phẩm không tồn tại!']);
        redirect('index.php?option=slider');
    }
    $data = array(
        'name' => trim($_POST['name']) ,
        'link' => $_POST['link'],
        'orders' => 1,
        'created_at' => date('Y-m-d H:i:s') ,
        'created_by' => $userid,
        'updated_at' => date('Y-m-d H:i:s') ,
        'updated_by' => $userid,
        'status' => $_POST['status'],
    );
    if(strlen($_FILES["img"]["name"])>0)
    {
    $path_upload = '../public/img/';
    $target_file = $path_upload . basename($_FILES["img"]["name"]);
    $type_file = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $file_name = trim($_POST['name']).".".$type_file;
    if (in_array($type_file,['jpg','png']))
    {
        if(file_exists($path_upload.$row['img']))
        {
            unlink('../public/front-end/img/slider/'.$row['img']);
        }
        move_uploaded_file($_FILES["img"]["tmp_name"], $path_upload.$file_name);
        $data['img'] =  $file_name;
    }
    }
    $slider->slider_update($data, $id);
    set_flash('message',['type' => 'success','msg' => 'Thành Công!','msgc' => 'Cập nhật thành công']);
         redirect("index.php?option=slider");
}