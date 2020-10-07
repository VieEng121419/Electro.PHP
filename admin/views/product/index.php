<?php
	$product = loadModel('product');
    $list = $product->product_list(['type' => 'product','status'=>'index','sort' => ['orderby' => 'created_at','order' => 'DESC']]);
?>
<?php require_once('views/header.php'); ?>
<div class="content-wrapper my-2">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <strong class="text-info">DANH SÁCH SẢN PHẨM</strong>
                </h3>
                <div class="card-tools">
                    <a title="Thêm" href="index.php?option=product&cat=insert" class="btn btn-sm btn-success">
                        <i class="fas fa-plus"></i>
                    </a>
                    <a href="index.php?option=product&cat=trash" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <?php require_once("views/message.php");?>
                <table class="table table-bordered dataTable no-footer" id="myTable">
                    <thead>
                        <tr role="row">
                            <th style="width:100px" class="sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Hình ảnh: activate to sort column descending">Hình ảnh</th>
                            <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1"
                                aria-label="Tên sản phẩm: activate to sort column ascending" style="width: 527px;">Tên
                                sản phẩm</th>
                            <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1"
                                aria-label="Loại sản phẩm: activate to sort column ascending" style="width: 549px;">Loại
                                sản phẩm</th>
                            <th style="width:160px" class="text-center sorting" tabindex="0" aria-controls="myTable"
                                rowspan="1" colspan="1" aria-label="Chức năng: activate to sort column ascending">Chức
                                năng</th>
                            <th style="width:30px" class="text-center sorting" tabindex="0" aria-controls="myTable"
                                rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($list as $row):?>
                        <tr role="row" class="odd">
                            <td class="sorting_1">
                                <img src="../public/front-end/img/product/<?php echo $row['img'];?>" class="img-fluid" alt="">
                            </td>
                            <td>
                                <a href="product_update.php"> <?php echo $row['name'];?> </a>
                            </td>
                            <td>Giầy nam</td>
                            <td class="text-center">
                                <?php if($row['status']==1):?>
                                <a class="btn btn-success btn-sm showw"
                                    href="index.php?option=product&cat=status&id=<?php echo $row['id'];?>"
                                    role="button">
                                    <i class="fa fa-toggle-on"></i>
                                </a>
                                <?php else:?>
                                <a class="btn btn-danger btn-sm"
                                    href="index.php?option=product&cat=status&id=<?php echo $row['id'];?>"
                                    role="button">
                                    <i class="fa fa-toggle-off"></i>
                                    <?php endif;?>
                                    <a class="btn btn-info btn-sm"
                                        href="index.php?option=product&cat=update&id=<?php echo $row['id'];?>"
                                        role="button">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm"
                                        href="index.php?option=product&cat=deltrash&id=<?php echo $row['id'];?>"
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

        </div>
    </section>
</div>
<?php require_once('views/footer.php'); ?>