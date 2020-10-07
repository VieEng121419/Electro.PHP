<?php
$slider = loadModel('slider');
$list = $slider->slider_list(['status'=>'index']);
$str_parentid = '';
$str_orders = '';
foreach ($list as $row) {
$str_parentid .= "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
$str_orders .= "<option value='" . $row['orders'] . "'>sau: " . $row['name'] . "</option>";

}
?>
<?php  require_once('views/header.php');?>
<form name="form1" action="index.php?option=slider&cat=process" method="post">
    <div class="content-wrapper my-2">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong class="text-danger">DANH SÁCH THÊM SLIDER</strong>
                    </h3>
                    <div class="card-tools">
                        <button type="submit" name="THEM" class="btn btn-success btn-sm"> <i class="far fa-save"></i>
                            Lưu[Thêm]</button>
                        <a class="btn btn-danger btn-sm" href="index.php?option=slider" role="button">
                            <i class="fas fa-times"></i> Thoát</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="">Tên Slide</label>
                                <input type="text" class="form-control" name="name" placeholder="Tên slider">
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea class="form-control" name="updated_by" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Link</label>
                                <textarea class="form-control" name="link" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Ngày Tạo</label>
                                <textarea class="form-control" name="created_at" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Loại slider cha</label>
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
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Chưa xuất bản</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Hình đại diện</label>
                                <input type="file" class="form-control" name="img" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>
<?php require_once('views/footer.php'); ?>