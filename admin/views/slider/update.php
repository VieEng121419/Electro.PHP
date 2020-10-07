<?php
$slider = loadModel('slider');
$id = $_REQUEST['id'];
$row = $slider->slider_row(['id' => $id]);
$list = $slider->slider_list(['status'=>'index']);
$str_id = '';
$str_orders = '';
foreach ($list as $item) {
    if($item['id']==$row['id'])
    {
        $str_id .= "<option selected value='" . $item['id'] . "'>" . $item['name'] . "</option>";
    }
    else
    {
        $str_id .= "<option value='" . $item['id'] . "'>" . $item['name'] . "</option>";
    }
   $str_orders .= "<option value='" . $item['orders'] . "'>sau: " . $item['name'] . "</option>";

}
?>
<?php  require_once('views/header.php');?>
<form name="form1" action="index.php?option=slider&cat=process&id=<?php echo $id;?>" method="POST">
<div class="content-wrapper my-2" >
    <section class="content">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">
            <strong class="text-danger">CẬP NHẬT SLIDE</strong>
          </h3>
                <div class="card-tools">
                <button type="submit" name="CAPNHAT" class="btn btn-success btn-sm"> <i class="far fa-save"></i>
                        </button>
                    <a class="btn btn-danger btn-sm" href="index.php?option=slider&cat=delete" role="button">
                        <i class="fas fa-times"></i> Thoát</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <label for="">Tên Slide</label>
                            <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="name" placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea class="form-control" name="updated_by" rows="3"><?php echo $row['updated_by']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Link</label>
                            <textarea class="form-control" name="link" rows="3"><?php echo $row['link']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Ngày Tạo</label>
                            <textarea class="form-control" name="created_at" rows="3"><?php echo $row['created_at']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Loại sản phẩm cha</label>
                            <select class="form-control" name="id">
                                <option value="0">-- Cấp cha --</option>
                                <?php echo  $str_id;?>
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
<?php require_once('views/footer.php'); ?>