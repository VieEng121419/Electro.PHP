<?php
    $id = $_REQUEST["id"];
    $contact = loadModel('contact');
    $row = $contact -> contact_row(['id' => $id]);
?>
<?php require_once('views/header.php'); ?>
<div class="content-wrapper my-2">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <strong class="text-info">THÙNG RÁC LIÊN HỆ </strong>
                </h3>
                <div class="card-tools">
                    <a href="index.php?option=contact" class="btn btn-sm btn-success">
                        <i class="fas fa-reply"></i>
                        <span class="close"
                            style="display: none; font-size: 18px; margin-left: 9px; margin-top: 1px; text-shadow: none;color:#fff; opacity:1;">Trả
                            Lời</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered dataTable no-footer" id="myTable">
                    <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1"
                                aria-label="Tên sản phẩm: activate to sort column ascending" style="width: 107px;">Nội dung khách hàng gửi</th>
                            <th style="width:160px" class="text-center sorting" tabindex="0" aria-controls="myTable"
                                rowspan="1" colspan="1" aria-label="Chức năng: activate to sort column ascending">Nhân viên phản hồi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr role="row" class="odd">
                            <td>
                                <?php echo $row['detail'];?> </a>
                            </td>
                            <td> <textarea class="form-control" name="contentreply"
                                    rows="3"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<?php require_once('views/footer.php'); ?>