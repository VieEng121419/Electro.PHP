<?php require_once('views/header.php'); ?>
<div class="content-wrapper my-2">
	<section class="content">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<strong class="text-info">DANH SÁCH KHÁCH HÀNG</strong>
				</h3>
				
			</div>
			<div class="card-body">
				<table class="table table-bordered dataTable no-footer" id="myTable">
					<thead>
						<tr role="row">
							<th class="sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Hình ảnh: activate to sort column descending" style="width: 292px;">Tên khách hàng</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Tên sản phẩm: activate to sort column ascending" style="width: 472px;">Email</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Loại sản phẩm: activate to sort column ascending" style="width: 214px;">Điện thoại</th>
                            <th style="width:160px" class="text-center sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending">Chức năng</th>
                            <th style="width:30px" class="text-center sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending">ID</th>
						</tr>
					</thead>
					<tbody>
						<tr role="row" class="odd">
							<td class="sorting_1">
								<a href="#">Tiêu đề liên hệ 1</a>
								</td>
								<td>
									<a href="#">vietanh1419@gmail.com</a>
								</td>
								<td>
                                    <a href="#">0944853868</a>
                                </td>
								<td class="text-center">
								<a class="btn btn-success btn-sm" href="product_update.php" role="button">
										<i class="fa fa-toggle-off"></i>
									</a>
									<a class="btn btn-info btn-sm" href="product_update.php" role="button">
										<i class="fas fa-edit"></i>
									</a>
									<a class="btn btn-danger btn-sm" href="#" role="button">
										<i class="fas fa-trash-alt"></i>
									</a>
								</td>
								<td class="text-center">1</td>
							</tr>
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