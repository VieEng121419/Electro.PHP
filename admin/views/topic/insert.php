<?php
   $topic = loadModel('topic');
   $listcat = $topic -> topic_list(['status' => 1]);
   $str_parentid = "";
   $str_orders = "";
   foreach ($listcat as $row)
   {
      $str_parentid .= "<option value='" . $row['id'] . "'>". $row['name'] . "</option>";
      $str_orders .= "<option value='" . $row['orders'] . "'>Sau:". $row['name'] . "</option>";
   }
?>
<?php require_once('views/header.php'); ?>
<form name="form1" action="index.php?option=topic&cat=process" enctype="multipart/form-data" method="post">
    <div class="content-wrapper my-2" style="min-height: 835px;">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong class="text-uppercase text-danger">Cập nhật loại sản phẩm</strong>
                    </h3>
                    <div class="card-tools">
                        <button type="submit" name="THEM" class="btn btn-success btn-sm"> <i class="far fa-save"></i>
                        </button>
                        <a class="btn btn-danger btn-sm" href="index.php?option=topic" role="button">
                            <i class="fas fa-times"></i> </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="">Tên loại sản phẩm</label>
                                <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm" required>
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea class="form-control" name="metadesc" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Từ khóa</label>
                                <textarea class="form-control" name="metakey" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Loại sản phẩm</label>
                                <select class="form-control" name="parentid" >
                                    <option value=0>-- Cấp cha --</option>
                                    <?php echo $str_parentid; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Sắp xếp</label>
                                <select class="form-control" name="orders" required>
                                    <option value=0>-- None --</option>
                                    <?php echo $str_orders; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <select class="form-control" name="status">
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Chưa xuất bản</option>
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