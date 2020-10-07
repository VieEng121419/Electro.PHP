<?php
$id=$_REQUEST['id'];
   $category = loadModel('category');
   $row=$category->category_row(['id'=>$id]);
   $listcat = $category -> category_list(['status' => 1]);
   $str_parentid = "";
   $str_orders = "";
   foreach ($listcat as $item)
   {
	   if($item['id']==$row['parentid'])
	   {
		$str_parentid .= "<option selected value='" . $item['id'] . "'>". $item['name'] . "</option>";
	   }
      else{
		$str_parentid .= "<option value='" . $item['id'] . "'>". $item['name'] . "</option>";
	  }
      $str_orders .= "<option value='" . $item['orders'] . "'>Sau:". $item['name'] . "</option>";
   }
?>
<?php require_once('views/header.php'); ?>
<form name="form1" action="index.php?option=category&cat=process&id=<?php echo $id; ?>" enctype="multipart/form-data"
    method="post">
    <div class="content-wrapper my-2" style="min-height: 835px;">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong class="text-uppercase text-danger">Thêm mới loại sản phẩm</strong>
                    </h3>
                    <div class="card-tools">
                        <button type="submit" name="CAPNHAT" class="btn btn-success btn-sm"> <i class="far fa-save"></i>
                        </button>
                        <a class="btn btn-danger btn-sm" href="index.php?option=category" role="button">
                            <i class="fas fa-times"></i> </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="">Tên loại sản phẩm</label>
                                <input type="text" class="form-control" value="<?php echo $row['name'];?>" name="name"
                                    placeholder="Tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea class="form-control" name="metadesc"
                                    rows="3"><?php echo $row['metadesc'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Từ khóa</label>
                                <textarea class="form-control" name="metakey"
                                    rows="3"><?php echo $row['metakey'];?></textarea>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Loại sản phẩm</label>
                                <select class="form-control" name="parentid">
                                    <option value=0>-- Cấp cha --</option>
                                    <?php echo $str_parentid; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Sắp xếp</label>
                                <select class="form-control" name="orders">
                                    <option value=0>-- None --</option>
                                    <?php echo $str_orders; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <select class="form-control" name="status">
                                    <option <?php if($row['status']==1){echo 'selected';}?> value="1" >Xuất bản</option>
                                    <option <?php if($row['status']==2){echo 'selected';}?> value="2" >Chưa xuất bản</option>
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