<?php
   $category = loadModel('category');
   $product = loadModel('product');
   $id = $_REQUEST["id"];
   $row = $product -> product_row(['id' => $id]);
   $listcat = $category -> category_list(['status' => 1]);
   $strcatid = "";
   foreach ($listcat as $item)
   {
      if($item['id'] == $row['catid'])
      {
         $strcatid .= "<option selected value='" . $item['id'] . "'>". $item['name'] . "</option>";
      }
      else {
         {
            $strcatid .= "<option value='" . $item['id'] . "'>". $item['name'] . "</option>";
         }
      }
   }
?>
<?php require_once('views/header.php'); ?>
<form name="form1" action="index.php?option=product&cat=process&id=<?php echo $id?>" enctype="multipart/form-data" method="post">
    <div class="content-wrapper my-2" style="min-height: 835px;">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong class="text-uppercase text-danger">Cập nhật sản phẩm</strong>
                    </h3>
                    <div class="card-tools">
                        <button type="submit" name="CAPNHAT" class="btn btn-success btn-sm"> <i class="far fa-save"></i>
                        </button>
                        <a class="btn btn-danger btn-sm" href="index.php?option=product" role="button">
                            <i class="fas fa-times"></i> </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" value="<?php echo $row['name'];?>" class="form-control" name="name"
                                placeholder="Tên sản phẩm" required>
                        </div>
                        <div class="form-group">
                            <label for="">Chi tiết sản phẩm</label>
                            <textarea class="form-control" name="detail" rows="3"
                                required><?php echo $row['detail'];?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea class="form-control" name="metadesc" rows="3"
                                required><?php echo $row['metadesc'];?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Từ khóa</label>
                            <textarea class="form-control" name="metakey" rows="3"
                                required><?php echo $row['metakey'];?></textarea>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Loại sản phẩm</label>
                            <select class="form-control" name="catid">
                                <option>-- Chọn loại sản phẩm --</option>
                                <?php echo $strcatid; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Số lượng</label>
                            <input type="number" class="form-control" name="number" value="<?php echo $row['number'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Giá bán</label>
                            <input type="number" class="form-control" name="price" value="<?php echo $row['price'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Giá khuyến mãi</label>
                            <input type="number" class="form-control" name="pricesale" value="<?php echo $row['pricesale'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Hình đại diện</label>
                            <input type="file" class="form-control" name="img">
                        </div>
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <select class="form-control" name="status">
                                <option value="1" <?php if($row['status']==1){echo "selected";}?>>Xuất bản</option>
                                <option value="1" <?php if($row['status']==2){echo "selected";}?>>Chưa xuất bản</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>
<?php require_once('views/footer.php'); ?>