<?php
$menu = loadModel('menu');
$userid=(isset($_SESSION["userid"])) ? $_SESSION["userid"] : 1;
if (isset($_POST['THEMCATEGORY']))
{
    $category = loadModel('category');
    if (!isset($_POST['nameCategory']))
    {
        set_flash('message', ['type' => 'danger', 'msg' => 'Thất Bại!', 'msgc' => 'Chưa chọn loại sản phẩm']);
        redirect("index.php?option=menu");
    }
    $listid = $_POST['nameCategory'];
    foreach ($listid as $id)
    {
        $row=$category->category_row(['id'=>$id]);
        $data = array(
            'name' => $row['name'] ,
            'link' => 'index.php?option=product&cat='. $row['slug'] ,
            'type' => 'category',
            'tableid' =>  $row['id'],
            'orders' => 1,
            'position' => $_POST['position'],
            'parentid'=> 0,
            'created_at' => date('Y-m-d H:i:s') ,
            'created_by' => $userid,
            'updated_at' => date('Y-m-d H:i:s') ,
            'updated_by' => $userid,
            'status' => 2
        );
        $menu->menu_insert($data);
        $data=null;
    }  
    set_flash('message', ['type' => 'success', 'msg' => 'Thành Công!', 'msgc' => 'Thêm thành công']);
    redirect('index.php?option=menu');
}

if (isset($_POST['THEMTOPIC']))
{
    $topic = loadModel('topic');
    if (!isset($_POST['nameTopic']))
    {
        set_flash('message', ['type' => 'danger', 'msg' => 'Thất Bại!', 'msgc' => 'Chưa chọn chủ đề']);
        redirect("index.php?option=menu");
    }
    $listid = $_POST['nameTopic'];
    foreach ($listid as $id)
    {
        $row=$topic->topic_row(['id'=>$id]);
        $data = array(
            'name' => $row['name'] ,
            'link' => 'index.php?option=post&cat='. $row['slug'] ,
            'type' => 'topic',
            'tableid' =>  $row['id'],
            'orders' => 1,
            'position' => $_POST['position'],
            'parentid'=> 0,
            'created_at' => date('Y-m-d H:i:s') ,
            'created_by' => $userid,
            'updated_at' => date('Y-m-d H:i:s') ,
            'updated_by' => $userid,
            'status' => 2
        );
        $menu->menu_insert($data);
        $data=null;
    }  
    set_flash('message', ['type' => 'success', 'msg' => 'Thành Công!', 'msgc' => 'Thêm thành công']);
    redirect('index.php?option=menu');
}

if (isset($_POST['THEMPAGE']))
{
    $post = loadModel('post');
    if (!isset($_POST['namePage']))
    {
        set_flash('message', ['type' => 'danger', 'msg' => 'Thất Bại!', 'msgc' => 'Chưa chọn trang đơn']);
        redirect("index.php?option=menu");
    }
    $listid = $_POST['namePage'];
    foreach ($listid as $id)
    {
        $row=$post->post_row(['id'=>$id,'type'=>'page']);
        $data = array(
            'name' => $row['title'] ,
            'link' => 'index.php?option=page&cat='. $row['slug'] ,
            'type' => 'page',
            'tableid' =>  $row['id'],
            'orders' => 1,
            'position' => $_POST['position'],
            'parentid'=> 0,
            'created_at' => date('Y-m-d H:i:s') ,
            'created_by' => $userid,
            'updated_at' => date('Y-m-d H:i:s') ,
            'updated_by' => $userid,
            'status' => 2
        );
        $menu->menu_insert($data);
        $data=null;
    }  
    set_flash('message', ['type' => 'success', 'msg' => 'Thành Công!', 'msgc' => 'Thêm thành công']);
    redirect('index.php?option=menu');
}

if (isset($_POST['THEMCUSTOM']))
{
    if(strlen($_POST['name']==0) || strlen($_POST['link'])==0)
    {
        set_flash('message', ['type' => 'danger', 'msg' => 'Thất Bại!', 'msgc' => 'Chưa nhập tên hoặc link']);
        redirect("index.php?option=menu");
    }
    $data = array(
        'name' => $_POST['name'] ,
        'link' => $_POST['link'] ,
        'type' => 'custom',
        'orders' => 1,
        'position' => $_POST['position'],
        'parentid'=> 0,
        'created_at' => date('Y-m-d H:i:s') ,
        'created_by' => $userid,
        'updated_at' => date('Y-m-d H:i:s') ,
        'updated_by' => $userid,
        'status' => 2
    );
    $menu->menu_insert($data);
    set_flash('message', ['type' => 'success', 'msg' => 'Thành Công!', 'msgc' => 'Thêm thành công']);
    redirect('index.php?option=menu');
}

if (isset($_POST['THEM']))
{
 $data = array(
'name' => trim($_POST['name']),
'slug' => str_slug(trim($_POST['name'])),
'parentid' => $_POST['parentid'],
'orders' => 1,
'metadesc' => $_POST['metadesc'],
'metakey' => $_POST['metakey'],
'created_at' => date('Y-m-d H:i:s'),
'created_by' => $userid,
'updated_at' => date('Y-m-d H:i:s'),
'updated_by' => $userid,
'status' => $_POST['status'],
);
$menu->menu_insert($data);
set_flash('message', ['type' => 'success', 'msg' => 'Thành Công!', 'msgc' => 'Thêm thành công']);
redirect('index.php?option=menu');
}

 if (isset($_POST['CAPNHAT']))
 $id=$_REQUEST['id'];
 $row = $menu->menu_row(['id' => $id]);
 if ($row == null) 
 {
    set_flash('message', ['type' => 'danger', 'msg' => 'Thất Bại!', 'msgc' => 'Loại sản phẩm không tồn tại']);
redirect('index.php?option=menu');
}
{
 $data = array(
'name' => trim($_POST['name']),
'slug' => str_slug(trim($_POST['name'])),
'parentid' => $_POST['parentid'],
'orders' => 1,
'metadesc' => $_POST['metadesc'],
'metakey' => $_POST['metakey'],
'updated_at' => date('Y-m-d H:i:s'),
'updated_by' => $userid,
'status' => $_POST['status'],
);
$menu->menu_update($data,$id);
set_flash('message', ['type' => 'success', 'msg' => 'Thành Công!', 'msgc' => 'Cập nhật thành công']);
redirect('index.php?option=menu');
}