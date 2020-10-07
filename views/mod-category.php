<?php
    $category = loadModel('category');
    $list_category1 = $category->category_list(['parentid'=>0,'status'=>1]);
?>
<h3>DANH MỤC LOẠI</h3>
<ul class="cat">
    <?php 
        foreach( $list_category1  as $row_cat1):?>
    <div class="cat-content">
        <li class="depth-1">
            <div class="slide div-cat">
                <a class="slide header"
                    href="index.php?option=product&cat=<?php echo $row_cat1['slug'];?>"><?php echo $row_cat1['name'];?></a>
            </div>

            <?php 
            $list_category2 = $category->category_list(['parentid'=>$row_cat1['id'],'status'=>1]);
        ?>
            <?php if(count($list_category2)>0):?>
            <ul class="slideContent">
                <?php foreach( $list_category2  as $row_cat2):?>
                <div class="slideContent div-cat-child">
                    <li class="depth-2">
                        <a
                            href="index.php?option=product&cat=<?php echo $row_cat2['slug'];?>"><?php echo $row_cat2['name'];?></a>
                    </li>
                </div>
                <?php endforeach;?>
            </ul>
            <?php endif;?>
        </li>
    </div>
    <?php endforeach;?>
</ul>