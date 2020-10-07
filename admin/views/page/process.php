<?php
$post = loadModel('post');
$topic = loadModel('topic');
  $userid=(isset($_SESSION["userid"])) ? $_SESSION["userid"] : 1;
    if(isset($_POST['THEM']))
    {
        $slug = str_slug($_POST['title']);
        $data=array(
            'title' => $_POST['title'],
            'slug' => $slug,
            'detail' => $_POST['detail'],
            'type' => 'page',
            'metakey' => $_POST['metakey'],
            'metadesc' => $_POST['metadesc'],
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $userid,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $userid,
            'status' => $_POST['status'],
        );
        $path_upload = '../public/img/';
        $target_file = $path_upload . basename($_FILES["img"]["name"]);
        $type_file = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       
        if (in_array($type_file,['jpg','png','gif','jpeg']))
        {
            $file_name = $slug.".".$type_file;
            move_uploaded_file($_FILES["img"]["tmp_name"], $path_upload.$file_name);
            $data['img'] =  $file_name;
        }
        $post->post_insert($data);
        print_r($data);
        set_flash('message',['type' => 'success','msg' => 'Thành Công', 'msgc' => 'Thêm thành công']);
        redirect("index.php?option=page");
    }
    if(isset($_POST['CAPNHAT']))
    {
        $id = $_REQUEST['id'];
        $row = $post->post_row(['id'=>$id,'type' => 'page']);
        $slug = str_slug($_POST['title']);
        if($row==null)
        {
            set_flash('message',['type' => 'danger','msg' => 'Thất Bại', 'msgc' => 'Mẩu tin không tồn tại']);
            redirect("index.php?option=page");
        }
        $data=array(
            'title' => $_POST['title'],
            'slug' => $slug,
            'detail' => $_POST['detail'],
            'type' => 'page',
            'metakey' => $_POST['metakey'],
            'metadesc' => $_POST['metadesc'],
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $userid,
            'status' => $_POST['status'],
        );
        if(strlen($_FILES["img"]["name"]))
        {
            $path_upload = '../public/img/';
            $target_file = $path_upload . basename($_FILES["img"]["name"]);
            $type_file = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if (in_array($type_file,['jpg','png','gif','jpeg']))
            {   
                if(file_exists($path_upload.$row['img']))
                {
                    unlink($path_upload.$row['img']);
                }
                $file_name = $slug.".".$type_file;
                move_uploaded_file($_FILES["img"]["tmp_name"], $path_upload.$file_name);
                $data['img'] =  $file_name;
            }
        }
        $post->post_update($data,$id);
        print_r($data);
        set_flash('message',['type' => 'success','msg' => 'Thành Công', 'msgc' => 'Thêm thành công']);
        redirect("index.php?option=page");
    }
    