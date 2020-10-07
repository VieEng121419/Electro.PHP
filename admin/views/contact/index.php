<?php
	$contact = loadModel('contact');
	$list = $contact->contact_list(['status'=>'index']);
?>
<?php require_once('views/header.php'); ?>
<div class="content-wrapper my-2">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <strong class="text-info">TẤT CẢ LIÊN HỆ</strong>
				</h3>
				<div class="card-tools">					
					<a href="index.php?option=contact&cat=trash" class="btn btn-sm btn-danger">
						<i class="fas fa-trash"></i>
					</a>
				</div>

            </div>
            <div class="card-body">
                <table class="table table-bordered dataTable no-footer" id="myTable">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1"
                                aria-sort="ascending" aria-label="Hình ảnh: activate to sort column descending"
                                style="width: 292px;">Tiêu đề liên hệ</th>
                            <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1"
                                aria-label="Tên sản phẩm: activate to sort column ascending" style="width: 472px;">Email
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1"
                                aria-label="Loại sản phẩm: activate to sort column ascending" style="width: 214px;">Điện
                                thoại</th>
                            <th style="width:160px" class="text-center sorting" tabindex="0" aria-controls="myTable"
                                rowspan="1" colspan="1" aria-label="Chức năng: activate to sort column ascending">Trạng
                                thái</th>
                            <th style="width:240px" class="text-center sorting" tabindex="0" aria-controls="myTable"
                                rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending">Chức năng
                            </th>
                            <th style="width:30px" class="text-center sorting" tabindex="0" aria-controls="myTable"
                                rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($list as $row):?>
                        <tr role="row" class="odd">
                            <td class="sorting_1">
                                <a href="#"><?php echo $row['fullname'];?></a>
                            </td>
                            <td>
                                <a href="#"><?php echo $row['email'];?></a>
                            </td>
                            <td>
                                <a href="#"><?php echo $row['phone'];?></a>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-success">Chưa trả lời</span>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm" href="index.php?option=contact&cat=reply&id=<?php echo $row['id'];?>" role="button">
                                    <i class="fas fa-edit"></i> Trả lời</a>
                                <a class="btn btn-info btn-sm"
                                    href="index.php?option=contact&cat=update&id=<?php echo $row['id'];?>"
                                    role="button">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-sm"
                                    href="index.php?option=contact&cat=deltrash&id=<?php echo $row['id'];?>"
                                    role="button">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                            <td class="text-center"><?php echo $row['id'];?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                Footer
            </div>
        </div>
    </section>
</div>
<?php require_once('views/footer.php'); ?>