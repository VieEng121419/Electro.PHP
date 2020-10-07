<?php
 $user = loadModel('user');
 $listuser = $user -> user_list(['status' => 1]);
?>
<?php require_once('views/header.php'); ?>
<form name="form1" action="index.php?option=user&cat=process" enctype="multipart/form-data" method="post">
<div class="content-wrapper my-2">
   <section class="content">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">
               <strong class="text-info">THÊM MỚI THÀNH VIÊN</strong>
            </h3>
            <div class="card-tools">
            <button type="submit" name="THEM" class="btn btn-success btn-sm"> <i class="far fa-save"></i>
                        </button>
                        <a class="btn btn-danger btn-sm" href="index.php?option=user" role="button">
                            <i class="fas fa-times"></i> </a>
            </div>
         </div>
         <div class="card-body">
            <div class="row my-2 mx-2">
               <div class="col-9">
                  <div class="form-group">
                     <label for="">Họ tên thành viên</label>
                     <input type="text" class="form-control" name="fullname" placeholder="Họ và tên">
                  </div>
                  <div class="form-group">
                     <label for="">Email</label>
                     <input type="email" class="form-control" name="email" placeholder="Thư điện tử">
                  </div>
                  <div class="form-group">
                     <label for="">Số điện thoại</label>
                     <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
                  </div>
                  <div class="form-group">
                     <label for="">Tên đăng nhập</label>
                     <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập">
                  </div>
                  <div class="form-group">
                     <label for="">Mật khẩu</label>
                     <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                  </div>
                  <div class="form-group">
                     <label for="">Xác nhận Mật khẩu</label>
                     <input type="password" class="form-control" name="password" placeholder="Xác nhận mật khẩu">
                  </div>
               </div>
               <div class="col-3">
                        <div class="form-group">
                            <label for="">Giới tính</label>
                            <select class="form-control" name="gender" required>
                                <option>-- Chọn giới tính --</option>
                                <option value=1>Nam</option>
                                <option value=0>Nữ</option>             
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Xét quyền</label>
                            <select class="form-control" name="access" required>
                                <option>-- Chọn quyền --</option>
                                <option value=1>Administrator</option>
                                <option value=0>Editor</option>
                            </select>
                        </div>                       
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <select class="form-control" name="status" required>
                            <option value="1">Xuất bản</option>
                                    <option value="2">Chưa xuất bản</option>
                            </select>
                        </div>
                    </div>
            </div>
         </div>
   </section>
   </div>
</div>
</form>
<?php require_once('views/footer.php'); ?>
