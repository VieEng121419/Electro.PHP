<?php
	$user = loadModel('user');
	$list = $user->user_list(['status'=>'index']);
?>
<?php require_once('views/header.php'); ?>
<div class="content-wrapper my-2">
	<section class="content">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<strong class="text-info">DANH SÁCH THÀNH VIÊN</strong>
				</h3>
				<div class="card-tools">
					<a href="index.php?option=user&cat=insert" class="btn btn-sm btn-success">
						<i class="fas fa-plus"></i>
					</a>
					<a href="index.php?option=user&cat=trash" class="btn btn-sm btn-danger">
						<i class="fas fa-trash"></i>
					</a>
				</div>
			</div>
			<div class="card-body">
			<?php require_once("views/message.php");?>
				<table class="table table-bordered dataTable no-footer" id="myTable">
					<thead>
						<tr role="row">
							<th style="width:100px" class="sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Hình ảnh: activate to sort column descending">Họ và tên</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Tên sản phẩm: activate to sort column ascending" style="width: 527px;">Tên đăng nhập</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Loại sản phẩm: activate to sort column ascending" style="width: 549px;">email</th>
							<th style="width:160px" class="text-center sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Chức năng: activate to sort column ascending">Chức năng</th>
							<th style="width:30px" class="text-center sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending">ID</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($list as $row):?>
						<tr role="row" class="odd">
							<td class="sorting_1">
								<a href="#"><?php echo $row['fullname'];?></a>
								</td>
								<td>
									<a href="user_update.php"><?php echo $row['username'];?></a>
								</td>
								<td><?php echo $row['email'];?></td>
								<td class="text-center">
								<?php if($row['status']==1):?>
									<a class="btn btn-success btn-sm" href="index.php?option=user&cat=status&id=<?php echo $row['id'];?>" role="button">
										<i class="fa fa-toggle-on"></i>
									</a>
								<?php else:?>
									<a class="btn btn-danger btn-sm" href="index.php?option=user&cat=status&id=<?php echo $row['id'];?>" role="button">
										<i class="fa fa-toggle-off"></i>
								<?php endif;?>
									<a class="btn btn-info btn-sm" href="index.php?option=user&cat=update&id=<?php echo $row['id'];?>" role="button">
										<i class="fas fa-edit"></i>
									</a>
									<a class="btn btn-danger btn-sm" href="index.php?option=user&cat=deltrash&id=<?php echo $row['id'];?>" role="button">
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