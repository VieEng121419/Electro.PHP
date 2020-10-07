<?php
$menu = loadModel('menu');
$id = $_REQUEST['id'];
$row = $menu->menu_row(['id' => $id]);
$list = $menu->menu_list(['status'=>'index']);
$str_parentid = '';
$str_orders = '';
foreach ($list as $item) {
    if($item['id']==$row['parentid'])
    {
        $str_parentid .= "<option selected value='" . $item['id'] . "'>" . $item['name'] . "</option>";
    }
    else
    {
        $str_parentid .= "<option value='" . $item['id'] . "'>" . $item['name'] . "</option>";
    }
   $str_orders .= "<option value='" . $item['orders'] . "'>sau: " . $item['name'] . "</option>";

}
?>
<?php  require_once('views/header.php');?>
<form name="form1" action="index.php?option=menu&cat=process&id=<?php  echo $id; ?>" method="post">
<div class="content-wrapper my-2" >
    <section class="content">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">
            <strong class="text-danger">CẬP NHẬT MENU</strong>
          </h3>
                <div class="card-tools">
                <button type="submit" name="CAPNHAT" class="btn btn-success btn-sm"><i class="far fa-save"></i> Lưu[Cập Nhật]</button>
                    <a class="btn btn-danger btn-sm" href="index.php?option=menu" role="button">
                        <i class="fas fa-times"></i> Thoát</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <label for="">Tên menu</label>
                            <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="name" placeholder="Tên menu">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea class="form-control" name="updated_by" rows="3"><?php echo $row['updated_by']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Từ khóa</label>
                            <textarea class="form-control" name="created_at" rows="3"><?php echo $row['created_at']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">  Menu cha</label>
                            <select class="form-control" name="parentid">
                                <option value="0">-- Cấp cha --</option>
                                <?php echo  $str_parentid;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Sắp xếp</label>
                            <select class="form-control" name="orders">
                                <option value="0">-- None --</option>
                                <?php echo  $str_orders;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <select class="form-control" name="status">
                                <option value="1"<?php if ($row['status']== 1 ) {echo 'selected';} ?>>Xuất bản</option>
                                <option value="2"<?php if ($row['status']== 2 ) {echo 'selected';} ?>>Chưa xuất bản</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</form>
<?php  require_once('views/footer.php');?>