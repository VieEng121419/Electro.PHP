<?php
    $id = $_REQUEST["id"];  
    $topic = loadModel('topic');
   $post = loadModel('post');   
   $row = $post -> post_row(['id' => $id,'type'=>'post']);
   $list_topic = $topic -> topic_list(['status' => 'index']);
   $strtopid = "";
   foreach ($list_topic as $item)
   {
       if($row['topid']==$item['id'])
       {
            $strtopid .= "<option selected value='" . $item['id'] . "'>". $item['name'] . "</option>";
       }
       else{
        $strtopid .= "<option value='" . $item['id'] . "'>". $item['name'] . "</option>";
       }
   }
?>
<?php require_once('views/header.php'); ?>
<form name="form1" action="index.php?option=post&cat=process&id=<?php echo $id;?>" enctype="multipart/form-data"
    method="POST">
    <div class="content-wrapper my-2" style="min-height: 835px;">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong class="text-uppercase text-danger">Cập nhật bài viết</strong>
                    </h3>
                    <div class="card-tools">
                        <button type="submit" name="CAPNHAT" class="btn btn-success btn-sm"> <i class="far fa-save"></i>
                        </button>
                        <a class="btn btn-danger btn-sm" href="index.php?option=post" role="button">
                            <i class="fas fa-times"></i> </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="">Tên bài viết</label>
                                <input type="text" value="<?php echo $row['title'];?>" class="form-control" name="title"
                                    placeholder="Tên sản phẩm" required>
                            </div>
                            <div class="form-group">
                                <label for="">Chi tiết bài viết</label>
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
                                <label for="">Chủ đề bài viết</label>
                                <select class="form-control" name="topid">
                                    <option>-------Chọn Chủ Đề--------</option>
                                    <?php echo $strtopid; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Hình đại diện</label>
                                <input type="file" class="form-control" name="img">
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <select class="form-control" name="status">
                                    <option value="1" <?php if($row['status']==1){echo "selected";}?>>Xuất bản</option>
                                    <option value="2" <?php if($row['status']==2){echo "selected";}?>>Chưa xuất bản
                                    </option>
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