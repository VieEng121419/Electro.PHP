<?php
    $category = loadModel('category');
    $product = loadModel('product');
    $pagination= loadClass('pagination');
    $slug = $_REQUEST['cat'];
    $row_cat = $category->category_row(['slug'=>$slug,'status'=>1]);
    $catid=  $row_cat['id'];
    $arr_listcatid = array();
    $arr_listcatid[] = $catid;
    $list_cat1 = $category->category_list(['parentid'=>$catid,'status'=>1]);
    foreach ($list_cat1 as $cat1)
    {
        $arr_listcatid[] = $cat1['id'];
        $list_cat2 = $category->category_list(['parentid'=> $cat1['id'],'status'=>1]);
        foreach ($list_cat2 as $cat2)
        {
            $arr_listcatid[] = $cat2['id'];
        }
    }
?>
<?php 
    $limit = 6;
    $pageCurrent = $pagination -> pageCurrent();
    $offset = $pagination->pageFirst($pageCurrent, $limit);
    $args=array(
        'status'=>1,
        'catid_in'=>$arr_listcatid,
        'sort'=>['orderby'=>'created_at','order'=>'DESC'],
        'offset'=>$offset,
        'limit'=>$limit
    );
    $total = $product->product_count($args);   
    $list = $product->product_list($args);
    $split_list = array_chunk($list, 3);
    $title = $row_cat['name'];
?>
<?php require_once("views/header.php");?>
<section class="clearfix content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php require_once('views/mod-category.php');?>
            </div>
            <div class="col-md-9">
                <h1><?php echo $title ?> </h1>
                <?php foreach($split_list as $split):?>
                <div class="row">
                    <?php foreach($split as $row):?>

                    <div class="col-md-4 col-md" ">
                            <!-- product -->
                            <div class=" product">
                        <div class="product-img" style="min-height:252px;">
                            <a href="index.php?option=product&id=<?php echo $row['slug'];?>">
                                <img style="width:252px;position: absolute;left: 50%;top: 50%;transform: translate(-50%, -50%);"
                                    src="public/front-end/img/product/<?php echo $row['img'];?>" alt="hinh1">
                            </a>
                            <div class="product-label">
                                <span class="sale">-30%</span>
                                <span class="new">NEW</span>
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category"><?php echo $category->category_name($row['catid']);?></p>
                            <h3 class="product-name"><a
                                    href="index.php?option=product&id=<?php echo $row['slug'];?>"><?php echo $row['name'];?></a>
                            </h3>
                            <h4 class="product-price"><?php echo number_format($row['price']);?><sup>đ</sup>
                            </h4>
                            <div class="product-btns">
                               
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                        view</span></button>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> <a
                                    href="index.php?option=cart&addcart=<?php echo $row['id'];?>">
                                    Thêm</a></button>
                        </div>
                    </div>
                    <!-- /product -->
                </div>

                <?php endforeach;?>
            </div>

            <?php endforeach;?>
            <?php echo $pageLink= $pagination->pageLink($total, $pageCurrent, $limit, 'index.php?option=product&cat='.$slug);?>
        </div>
    </div>
    </div>
</section>
<?php require_once("views/footer.php");?>
<script>
$(document).ready(function() {
    $(".slide").click(function() {

        var target = $(this).parent().children(".slideContent");
        $(target).slideToggle();
    });
});
</script>