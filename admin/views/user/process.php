<?php
$user = loadModel('user'); 
    if(isset($_POST['THEM']))
    {
        $data=array(
            'fullname' => $_POST['fullname'],         
            'username'=>$_POST['username'],
            'password'=>sha1($_POST['password']),
            'email' => $_POST['email'],
            'gender' => $_POST['gender'],
            'phone' => $_POST['phone'],
            'img' => '123.jpg',
            'access' => $_POST['access'],
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $userid,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $userid,
            'status' => $_POST['status']
        );
        $user->user_insert($data);
        set_flash('message',['type' => 'success','msg' => 'Thành Công!','msgc' => 'Cập nhật thành công']);
        redirect("index.php?option=user");
        
    }
    if (isset($_POST['CAPNHAT']))
    {
        $id = $_REQUEST["id"];
        $row = $user -> user_row(['id' -> $id]);
        if($row == null)
        {
             set_flash('message',['type' => 'danger','msg' => 'Thất Bại!','msgc' => 'Không tồn tại sản phẩm']);
             redirect("index.php?option=user");
        }
        $data=array(
            'name' => $_POST['name'],
            'slug' => str_slug($_POST['name']),
            'parentid'=>$_POST['parentid'],
            'orders'=>($_POST['orders']+1),
            'metakey' => $_POST['metakey'],
            'metadesc' => $_POST['metadesc'],
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $userid,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $userid,
            'status' => $_POST['status']
        );
        $user->user_update($data,$id);
        set_flash('message',['type' => 'success','msg' => 'Thành Công!','msgc' => 'Cập nhật thành công']);
        redirect("index.php?option=user");
    }
    