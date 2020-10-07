<?php require_once('views/header.php'); ?>
<form name="form1" action="index.php?option=page&cat=process" enctype="multipart/form-data" method="post">
   <div class="content-wrapper my-2" style="min-height: 835px;">
      <section class="content">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">
                  <strong class="text-uppercase text-danger">Thêm mới bài viết</strong>
               </h3>
               <div class="card-tools">
                  <button type="submit" name="THEM" class="btn btn-success btn-sm" > <i class="far fa-save"></i> </button>
                  <a class="btn btn-danger btn-sm" href="index.php?option=page" role="button">
                  <i class="fas fa-times"></i> </a>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-9">
                  <div class="form-group">
                     <label for="">Tên bài viết</label>
                     <input type="text" class="form-control" name="title" placeholder="Tên sản phẩm" >
                  </div>
                  <div class="form-group">
                     <label for="">Chi tiết bài viết</label>
                     <textarea class="form-control" name="detail" rows="3" ></textarea>
                  </div>
                  <div class="form-group">
                     <label for="">Mô tả</label>
                     <textarea class="form-control" name="metadesc" rows="3" ></textarea>
                  </div>
                  <div class="form-group">
                     <label for="">Từ khóa</label>
                     <textarea class="form-control" name="metakey" rows="3" ></textarea>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-group">
                     <label for="">Hình đại diện</label>
                     <input type="file" class="form-control" name="img" >
                  </div>
                  <div class="form-group">
                     <label for="">Trạng thái</label>
                     <select class="form-control" name="status" >
                        <option value="1">Xuất bản</option>
                        <option value="2">Chưa xuất bản</option>
                     </select>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</form>
<?php require_once('views/footer.php'); ?>