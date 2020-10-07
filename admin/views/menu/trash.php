<?php
   $menu=loadModel('menu');
   $list = $menu->menu_list(['status'=>'trash']);
?>
<?php  require_once('views/header.php');?>
  <div class="content-wrapper my-2">
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <strong class="text-danger">THÙNG RÁC CỦA MENU</strong>
          </h3>
          <div class="card-tools">
          <a class="btn btn-sm btn-danger" href="index.php?option=menu"><i class="fas fa-times"></i> Thoát</a>
          </div>
        </div>
        <div class="card-body">
		<?php require_once('views/message.php'); ?>
        <table class="table table-bordered dataTable no-footer" id="myTable">
					<thead>
						<tr role="row">
							<th style="width:100px" class="sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Hình ảnh: activate to sort column descending">Hình ảnh</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Tên loại sản phẩm: activate to sort column ascending" style="width: 527px;">Tên loại sản phẩm</th>
							<th style="width:160px" class="text-center sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Chức năng: activate to sort column ascending">Chức năng</th>
							<th style="width:30px" class="text-center sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending">ID</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($list as $row ): ?>
						<tr role="row" class="odd">
							<td class="sorting_1">
								<img src="../public/images/menu/<?php echo $row['img']; ?>" class="img-fluid" alt="hinh">
								</td>
								<td>
								<?php echo $row['name']; ?>
								</td>
								
								<td class="text-center">
								
									<a class="btn btn-info btn-sm" href="index.php?option=menu&cat=retrash&id=<?php echo $row['id']; ?>" role="button">
										<i class="fas fa-edit"></i>
									</a>
									<a class="btn btn-danger btn-sm" href="index.php?option=menu&cat=delete&id=<?php echo $row['id']; ?>" role="button">
										<i class="fas fa-trash-alt"></i>
									</a>
								</td>
								<td class="text-center"><?php echo $row['id']; ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
        </div>
      </div>    
    </section>
  </div>
  <?php  require_once('views/fooder.php');?>

  