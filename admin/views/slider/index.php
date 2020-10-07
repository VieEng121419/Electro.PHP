<?php
   $slider=loadModel('slider');
   $list = $slider->slider_list(['type' => 'slider','status'=>'index']);
?>
<?php  require_once('views/header.php');?>
      <div class="content-wrapper my-2" style="min-height: 767px;">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <strong class="text-uppercase text-danger">DANH SÁCH SLIDER</strong>
                </h3>
                <div class="card-tools">
                    <a class="btn btn-success btn-sm" href="index.php?option=slider&cat=insert" role="button">
                        <i class="fas fa-plus"></i> Thêm mới</a>
                    <a class="btn btn-danger btn-sm" href="index.php?option=slider&cat=delete" role="button">
                        <i class="fas fa-trash-alt"></i> Thùng rác</a>
                </div>
            </div>
            <div class="card-body">
            <?php  require_once('views/message.php');?>
            <table class="table table-bordered dataTable no-footer" id="myTable">
                <thead>
                        <tr role="row"><th style="width:100px" class="sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Hình ảnh: activate to sort column descending">Hình ảnh</th>
                        <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Tên slider: activate to sort column ascending" style="width: 150px;">Tên slider</th>
                        <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Vị trí: activate to sort column ascending" style="width: 224px;">Link</th>
                        <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Vị trí: activate to sort column ascending" style="width: 224px;">Vị trí</th>
                        <th style="width:160px" class="text-center sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Chức năng: activate to sort column ascending">Chức năng</th>
                        <th style="width:30px" class="text-center sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending">ID</th></tr>
                    </thead>
                    <tbody>
                    <?php foreach($list as $row ): ?> 
                    <tr role="row" class="odd">
                                <td class="sorting_1">
                                    <img src="../public/img/<?php echo $row['img']; ?>" class="img-fluid" alt="hinh">
                                </td>
                                <td><a href="<?php echo $row['link']; ?>"><?php echo $row['name']; ?></a></td>
                                <td><?php echo $row['link']; ?></td>
                                <td><?php echo $row['position']; ?></td>
                                <td class="text-center">
                                <?php if ( $row['status'] == 1 ) : ?>
									<a class="btn btn-success btn-sm" href="index.php?option=slider&cat=status&id=<?php echo $row['id']; ?>" role="button">
										<i class="fa fa-toggle-on"></i>
									</a>
									<?php else : ?>
										<a class="btn btn-danger btn-sm" href="index.php?option=slider&cat=status&id=<?php echo $row['id']; ?>" role="button">
										<i class="fa fa-toggle-off"></i>
									<?php endif ; ?>
									<a class="btn btn-info btn-sm" href="index.php?option=slider&cat=update&id=<?php echo $row['id']; ?>" role="button">
										<i class="fas fa-edit"></i>
									</a>
									<a class="btn btn-danger btn-sm" href="index.php?option=slider&cat=deltrash&id=<?php echo $row['id']; ?>" role="button">
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