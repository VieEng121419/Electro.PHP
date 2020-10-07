<?php
    $product= loadModel('product');
    $category= loadModel('category');
    $slug=$_REQUEST['id'];
    $row=$product->product_row(['slug'=>$slug, 'status'=>1]);
    $catid= $row['catid'];
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
    $args=array(
        'status'=>1,
        'catid_in'=>$arr_listcatid,
        'sort'=>['orderby'=>'created_at','order'=>'DESC'],
        'limit' =>4
    );
    $list_other = $product -> product_list($args);
    $title=$row['name'];
    ?>

<?php require_once("views/header.php");?>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">All Categories</a></li>
                    <li><a href="#">Accessories</a></li>
                    <li><a href="#">Headphones</a></li>
                    <li class="active"><?php echo $row['name'];?></li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="public/front-end/img/product/<?php echo $row['img'];?>">
                    </div>


                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="public/front-end/img/product/<?php echo $row['img'];?>">
                    </div>


                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h1 class="product-name"><?php echo $row['name'];?></h1>
                    <div>
                        <div>
                            <h3 class="product-price"><?php echo number_format($row['price']);?><sup>đ</sup></h3>
                            <span class="product-available">In Stock</span>
                        </div>
                        <p><?php echo $row['detail'];?></p>

                        <div class="product-options">
                            <label>
                                Size
                                <select class="input-select">
                                    <option value="0">X</option>
                                </select>
                            </label>
                            <label>
                                Color
                                <select class="input-select">
                                    <option value="0">Red</option>
                                </select>
                            </label>
                        </div>
                        <div class="add-to-cart">
                            <form action="index.php?option=cart&addcart=<?php echo $row['id'];?>" method="post">
                                <div class="qty-label">
                                    Qty
                                    <input type="number" value="1" name="qty" min="1">
                                    <button type="submit" class="add-to-cart-btn" name="DATMUA"><i
                                            class="fa fa-shopping-cart"></i> ĐẶT MUA</button>
                                </div>
                            </form>
                        </div>
                        <ul class="product-btns">
                            <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                        </ul>

                        <ul class="product-links">
                            <li>Category:</li>
                            <li><a href="#">Headphones</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>

                        <ul class="product-links">
                            <li>Share:</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>

                    </div>
                </div>
                <!-- /Product details -->

                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab2">Details</a></li>
                            <li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
                        </ul>
                        <!-- /product tab nav -->

                        <!-- product tab content -->
                        <div class="tab-content">
                            <!-- tab1  -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                            eu
                                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                            in
                                            culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab1  -->

                            <!-- tab2  -->
                            <div id="tab3" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="fb-like" data-href="index.php?option=product&id=<?php echo $row['slug']?>"
                                            data-width="" data-layout="standard" data-action="like" data-size="small"
                                            data-share="true"></div>
                                        <div class="fb-comments"
                                            data-href="index.php?option=product&id=<?php echo $row['slug']?>"
                                            data-numposts="5" data-width="100%"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab2  -->
                        </div>
                        <!-- /product tab content  -->
                    </div>
                </div>
                <!-- /product tab -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- Section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Sản Phẩm Tương Tự</h3>
                    </div>
                </div>
                <?php foreach($list_other as $item):?>
                <!-- product -->
                <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img" style="min-height:252px;">
                            <a href="index.php?option=product&id=<?php echo $item['slug'];?>">
                                <img style="width:252px;position: absolute;left: 50%;top: 50%;transform: translate(-50%, -50%);"
                                    src="public/front-end/img/product/<?php echo $item['img'];?>" alt="hinh1">
                            </a>
                            <div class="product-label">
                                <span class="sale">-30%</span>
                                <span class="new">NEW</span>
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category"><?php echo $category->category_name($item['catid']);?></p>
                            <h3 class="product-name"><a
                                    href="index.php?option=product&id=<?php echo $item['slug'];?>"><?php echo $item['name'];?></a>
                            </h3>
                            <h4 class="product-price"><?php echo number_format($item['price']);?><sup>đ</sup>
                            </h4>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="far fa-heart"></i><span class="tooltipp">add
                                        to
                                        wishlist</span></button>
                                <button class="add-to-compare"><i class="fas fa-exchange-alt"></i><span
                                        class="tooltipp">add
                                        to compare</span></button>
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                        view</span></button>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> <a
                                    href="index.php?option=cart&addcart=<?php echo $item['id'];?>">
                                    ĐẶT MUA</a></button>
                        </div>
                    </div>
                    <!-- /product -->
                </div>
                <?php endforeach;?>
                <div id="slick-nav" class="products-slick-nav"></div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /Section -->
    <?php require_once("views/footer.php");?>