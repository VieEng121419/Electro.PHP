<?php 
    $title = "Trang Chủ"; 
    $category = loadModel('category');
    $product = loadModel('product');
    $list_category = $category->category_list(['parentid'=>0,'status'=>1]);
?>
<?php require_once("views/header.php");?>
<?php require_once("views/mod-slideshow.php");?>
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="public/front-end/img/shop01.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Laptop<br>Collection</h3>
                        <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="public/front-end/img/shop03.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Accessories<br>Collection</h3>
                        <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="public/front-end/img/shop02.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Cameras<br>Collection</h3>
                        <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản Phẩm Mới</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <?php $index = 0;?>
                            <?php foreach($list_category as $cat):?>
                            <?php if ($index ==0):?>
                            <li class="active">
                                <a data-toggle="tab"
                                    href="#tab<?php echo $cat['tabid'];?>"><?php echo $cat['name'];?></a>
                            </li>
                            <?php $index++;?>
                            <?php else:?>
                            <li>
                                <a data-toggle="tab"
                                    href="#tab<?php echo $cat['tabid'];?>"><?php echo $cat['name'];?></a>
                            </li>
                            <?php endif;?>

                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <?php $index1 = 0;?>
                        <?php foreach($list_category as $cat):?>
                        <?php
                            $catid= $cat['id'];
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
                            $catid = $cat['id'];
                            $args=array(
                                'status'=>1,
                                'catid_in'=>$arr_listcatid,
                                'sort'=>['orderby'=>'created_at','order'=>'DESC'],
                                'limit' =>8
                            );
                            $list = $product -> product_list($args);
                        ?>
                        <?php if ($index1 ==0):?>
                        <!-- tab -->
                        <div id="tab<?php echo $cat['tabid'];?>" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-<?php echo $cat['tabid'];?>">
                                <?php foreach($list as $row):?>
                                <!-- product -->
                                <div class="product">
                                    <div class="product-img" style="min-height:252px;">
                                        <a href="index.php?option=product&id=<?php echo $row['slug'];?>">
                                            <img style="width:252px;position: absolute;left: 50%;top: 50%;transform: translate(-50%, -50%);"
                                                src="public/front-end/img/product/<?php echo $row['img'];?>"
                                                alt="hinh1">
                                        </a>
                                        <div class="product-label">
                                            <span class="new">mới</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">
                                            <?php echo $category->category_name($row['catid']);?></p>
                                        <h3 class="product-name"><a
                                                href="index.php?option=product&id=<?php echo $row['slug'];?>"><?php echo $row['name'];?></a>
                                        </h3>
                                        <h4 class="product-price"><?php echo number_format($row['price']);?><sup>đ</sup>
                                        </h4>
                                        <div class="product-btns">
                                            <button class="add-to-compare"><i class="fas fa-exchange-alt"></i><span
                                                    class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span
                                                    class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> <a
                                                href="index.php?option=cart&addcart=<?php echo $row['id'];?>">
                                                Add</a></button>
                                    </div>
                                </div>
                                <!-- /product -->
                                <?php endforeach;?>
                            </div>
                            <div id="slick-nav-<?php echo $cat['tabid'];?>" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                        <?php $index1++;?>
                        <?php else:?>
                        <!-- tab -->
                        <div id="tab<?php echo $cat['tabid'];?>" class="tab-pane">
                            <div class="products-slick" data-nav="#slick-nav-<?php echo $cat['tabid'];?>">
                                <?php foreach($list as $row):?>
                                <!-- product -->
                                <div class="product">
                                    <div class="product-img" style="min-height:252px;">
                                        <a href="index.php?option=product&id=<?php echo $row['slug'];?>">
                                            <img style="width:252px;position: absolute;left: 50%;top: 50%;transform: translate(-50%, -50%);"
                                                src="public/front-end/img/product/<?php echo $row['img'];?>"
                                                alt="hinh1">
                                        </a>
                                        <div class="product-label">
                                            <span class="new">MỚI</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">
                                            <?php echo $category->category_name($row['catid']);?></p>
                                        <h3 class="product-name"><a
                                                href="index.php?option=product&id=<?php echo $row['slug'];?>"><?php echo $row['name'];?></a>
                                        </h3>
                                        <h4 class="product-price"><?php echo number_format($row['price']);?><sup>đ</sup>
                                        </h4>
                                        <div class="product-btns">
                                            <button class="add-to-compare"><i class="fas fa-exchange-alt"></i></i><span
                                                    class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span
                                                    class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> <a
                                                href="index.php?option=cart&addcart=<?php echo $row['id'];?>">
                                                Add</a></button>
                                    </div>
                                </div>
                                <!-- /product -->
                                <?php endforeach;?>
                            </div>
                            <div id="slick-nav-<?php echo $cat['tabid'];?>" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                        <?php endif;?>
                        <?php endforeach;?>
                    </div>

                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                <h3>02</h3>
                                <span>Days</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>10</h3>
                                <span>Hours</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>34</h3>
                                <span>Mins</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>60</h3>
                                <span>Secs</span>
                            </div>
                        </li>
                    </ul>
                    <h2 class="text-uppercase">KHUYẾN MÃI CUỐI TUẦN</h2>
                    <p>Giảm Tới 50%</p>
                    <a class="primary-btn cta-btn" href="#">Mua Ngay</a>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản Phẩm Khuyến Mãi</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <?php $index = 0;?>
                            <?php foreach($list_category as $cat):?>
                            <?php if ($index ==0):?>
                            <li class="active">
                                <a data-toggle="tab"
                                    href="#tab1<?php echo $cat['tabid'];?>"><?php echo $cat['name'];?></a>
                            </li>
                            <?php $index++;?>
                            <?php else:?>
                            <li>
                                <a data-toggle="tab"
                                    href="#tab1<?php echo $cat['tabid'];?>"><?php echo $cat['name'];?></a>
                            </li>
                            <?php endif;?>

                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <?php $index1 = 0;?>
                        <?php foreach($list_category as $cat):?>
                        <?php
                            $catid= $cat['id'];
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
                            $catid = $cat['id'];
                            $args=array(
                                'status'=>1,
                                'catid_in'=>$arr_listcatid,
                                'sort'=>['orderby'=>'created_at','order'=>'DESC'],
                                'limit' =>8
                            );
                            $list = $product -> product_list($args);
                        ?>
                        <?php if ($index1 ==0):?>
                        <!-- tab -->
                        <div id="tab1<?php echo $cat['tabid'];?>" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-<?php echo $cat['tabid'];?>">
                                <?php foreach($list as $row):?>
                                <!-- product -->
                                <div class="product">
                                    <div class="product-img" style="min-height:252px;">
                                        <a href="index.php?option=product&id=<?php echo $row['slug'];?>">
                                            <img style="width:252px;position: absolute;left: 50%;top: 50%;transform: translate(-50%, -50%);"
                                                src="public/front-end/img/product/<?php echo $row['img'];?>"
                                                alt="hinh1">
                                        </a>
                                        <div class="product-label">
                                            <span class="new">mới</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">
                                            <?php echo $category->category_name($row['catid']);?></p>
                                        <h3 class="product-name"><a
                                                href="index.php?option=product&id=<?php echo $row['slug'];?>"><?php echo $row['name'];?></a>
                                        </h3>
                                        <h4 class="product-price"><?php echo number_format($row['price']);?><sup>đ</sup>
                                        </h4>
                                        <div class="product-btns">
                                            <button class="add-to-compare"><i class="fas fa-exchange-alt"></i><span
                                                    class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span
                                                    class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> <a
                                                href="index.php?option=cart&addcart=<?php echo $row['id'];?>">
                                                Add</a></button>
                                    </div>
                                </div>
                                <!-- /product -->
                                <?php endforeach;?>
                            </div>
                            <div id="slick-nav1-<?php echo $cat['tabid'];?>" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                        <?php $index1++;?>
                        <?php else:?>
                        <!-- tab -->
                        <div id="tab1<?php echo $cat['tabid'];?>" class="tab-pane">
                            <div class="products-slick" data-nav="#slick-nav-<?php echo $cat['tabid'];?>">
                                <?php foreach($list as $row):?>
                                <!-- product -->
                                <div class="product">
                                    <div class="product-img" style="min-height:252px;">
                                        <a href="index.php?option=product&id=<?php echo $row['slug'];?>">
                                            <img style="width:252px;position: absolute;left: 50%;top: 50%;transform: translate(-50%, -50%);"
                                                src="public/front-end/img/product/<?php echo $row['img'];?>"
                                                alt="hinh1">
                                        </a>
                                        <div class="product-label">
                                            <span class="new">MỚI</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">
                                            <?php echo $category->category_name($row['catid']);?></p>
                                        <h3 class="product-name"><a
                                                href="index.php?option=product&id=<?php echo $row['slug'];?>"><?php echo $row['name'];?></a>
                                        </h3>
                                        <h4 class="product-price"><?php echo number_format($row['price']);?><sup>đ</sup>
                                        </h4>
                                        <div class="product-btns">
                                            <button class="add-to-compare"><i class="fas fa-exchange-alt"></i></i><span
                                                    class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span
                                                    class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> <a
                                                href="index.php?option=cart&addcart=<?php echo $row['id'];?>">
                                                Add</a></button>
                                    </div>
                                </div>
                                <!-- /product -->
                                <?php endforeach;?>
                            </div>
                            <div id="slick-nav1-<?php echo $cat['tabid'];?>" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                        <?php endif;?>
                        <?php endforeach;?>
                    </div>

                </div>
            </div>
            <!-- Products tab & slick -->

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- NEWSLETTER -->
<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Đăng ký để nhận được<strong> tin mới nhất</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Email của bạn">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Theo Dõi</button>
                    </form>                 
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /NEWSLETTER -->
<?php require_once("views/footer.php");?>