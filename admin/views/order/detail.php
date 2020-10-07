<?php
$orderid=$_REQUEST['id'];
	$order_detail = loadModel('orderdetail');
	$row = $order_detail->orderdetail_row(['orderid'=>$orderid]);
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
                    <a href="#" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered dataTable no-footer" id="myTable">
                    <thead>
                        <tr role="row">
                            <th style="width:100px" class="sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Hình ảnh: activate to sort column descending">Mã đơn hàng</th>
                            <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1"
                                aria-label="Tên sản phẩm: activate to sort column ascending" style="width: 160px;">Mã sản phẩm</th>
                            <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1"
                                aria-label="Tên sản phẩm: activate to sort column ascending" style="width: 160px;">Giá sản phẩm</th>
                            <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1"
                                aria-label="Tên sản phẩm: activate to sort column ascending" style="width: 160px;">Số lượng</th>
                            <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1"
                                aria-label="Tên sản phẩm: activate to sort column ascending" style="width: 160px;">Thành tiền</th>
                            <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1"
                                aria-label="Loại sản phẩm: activate to sort column ascending" style="width: 160px;">
                               ID</th>
                        </tr>
                    </thead>
                    <tbody>                      
                        <tr role="row" class="odd">                  
                            <td>
                                <a href="#"><?php echo $row['orderid'];?></a>
                            </td>
                            <td>
                                <a href="#"><?php echo $row['productid'];?></a>
                            </td>
                            <td>
                                <a href="#"><?php echo $row['price'];?></a>
                            </td>
                            <td>
                                <a href="#"><?php echo $row['quantity'];?></a>
                            </td>
                            <td>
                                <a href="#"><?php echo $row['amount'];?></a>
                            </td>
                            <td class="text-center"><?php echo $row['id'];?></>
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