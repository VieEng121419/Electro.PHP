<?php
	$order = loadModel('order');
	$list = $order->order_list(['status'=>'index']);
?>
<?php require_once('views/header.php'); ?>
<div class="content-wrapper my-2">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <strong class="text-info">DANH SÁCH ĐƠN HÀNG</strong>
                </h3>
                <div class="card-tools">
                    <a href="#" class="btn btn-sm btn-success">
                        <i class="fas fa-plus"></i>
                    </a>
                    <a href="index.php?option=order&cat=trash" class="btn btn-sm btn-danger">
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
                                aria-label="Hình ảnh: activate to sort column descending">Code đơn hàng</th>
                            <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1"
                                aria-label="Tên sản phẩm: activate to sort column ascending" style="width: 160px;">Họ
                                tên khách hàng</th>
                            <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1"
                                aria-label="Tên sản phẩm: activate to sort column ascending" style="width: 160px;">Mã
                                khách hàng</th>
                            <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1"
                                aria-label="Tên sản phẩm: activate to sort column ascending" style="width: 160px;">Ngày
                                đặt hàng</th>
                            <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1"
                                aria-label="Tên sản phẩm: activate to sort column ascending" style="width: 160px;">Ngày
                                nhận</th>
                            <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1"
                                aria-label="Loại sản phẩm: activate to sort column ascending" style="width: 160px;">
                                Trạng thái</th>
                            <th style="width:160px" class="text-center sorting" tabindex="0" aria-controls="myTable"
                                rowspan="1" colspan="1" aria-label="Chức năng: activate to sort column ascending">Địa
                                chỉ</th>
                            <th style="width:160px" class="text-center sorting" tabindex="0" aria-controls="myTable"
                                rowspan="1" colspan="1" aria-label="Chức năng: activate to sort column ascending">Số
                                điện thoại</th>
                            <th style="width:160px" class="text-center sorting" tabindex="0" aria-controls="myTable"
                                rowspan="1" colspan="1" aria-label="Chức năng: activate to sort column ascending">Địa
                                chỉ emai</th>
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
                                <a
                                    href="index.php?option=order&cat=detail&id=<?php echo $row['id'];?>"><?php echo $row['code'];?></a>
                            </td>
                            <td>
                                <a href="order_update.php"><?php echo $row['deliveryname'];?></a>
                            </td>
                            <td>
                                <a href="#"><?php echo $row['userid'];?></a>
                            </td>
                            <td>
                                <a href="#"><?php echo $row['createdate'];?></a>
                            </td>
                            <td>
                                <a href="#"><?php echo $row['exportdate'];?></a>
                            </td>
                            <td>
                                <?php if($row['status']==1):?>
                                <span class="badge badge-success">Đã đặt hàng</span>
                                <?php endif;?>
                                <?php if($row['status']==2):?>
                                <span class="badge badge-danger">Đã hủy hàng</span>
                                <?php endif;?>
                            </td>

                            <td>
                                <a href="#"><?php echo $row['deliveryaddress'];?></a>
                            </td>
                            <td>
                                <a href="#"><?php echo $row['deliveryphone'];?></a>
                            </td>
                            <td>
                                <a href="#"><?php echo $row['deliveryemail'];?></a>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm" href="index.php?option=order&cat=update&id=<?php echo $row['id'];?>" role="button">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-sm" href="index.php?option=order&cat=deltrash&id=<?php echo $row['id'];?>" role="button">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <?php if($row['status']==1):?>
                                <a class="btn btn-success btn-sm"
                                    href="index.php?option=order&cat=status&id=<?php echo $row['id'];?>" role="button">
                                    <i class="fas fa-toggle-on"></i>
                                </a>
                                <?php else:?>
                                <a class="btn btn-danger btn-sm"
                                    href="index.php?option=order&cat=status&id=<?php echo $row['id'];?>" role="button">
                                    <i class="fas fa-toggle-off"></i>
                                </a>
                                <?php endif;?>                                                          
                            </td>
                            <td class="text-center"><?php echo $row['id'];?></>
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