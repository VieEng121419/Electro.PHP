<?php
$topic = loadModel('topic');
  $userid=(isset($_SESSION["userid"])) ? $_SESSION["userid"] : 1;
    if(isset($_POST['THEM']))
    {
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
        $topic->topic_insert($data);
        set_flash('message',['type' => 'success','msg' => 'Thành Công!','msgc' => 'Cập nhật thành công']);
        redirect("index.php?option=topic");
        
    }
    if (isset($_POST['CAPNHAT']))
    {
        $id = $_REQUEST["id"];
        $row = $topic -> topic_row(['id' -> $id]);
        if($row == null)
        {
             set_flash('message',['type' => 'danger','msg' => 'Thất Bại!','msgc' => 'Không tồn tại sản phẩm']);
             redirect("index.php?option=topic");
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
        $topic->topic_update($data,$id);
        set_flash('message',['type' => 'success','msg' => 'Thành Công!','msgc' => 'Cập nhật thành công']);
        redirect("index.php?option=topic");
    }
    