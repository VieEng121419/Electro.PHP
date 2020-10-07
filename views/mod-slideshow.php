<?php 
    $slider = loadModel('slider');
    $list_slider = $slider->slider_list(['status'=>1,'position'=>'slideshow']);
?>
<!-- SLIDER -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php $index1 = 0;?>
        <?php foreach ($list_slider as $row_slider):?>
        <?php if($index1 == 0 ):?>
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <?php else :?>
        <li data-target="#myCarousel" data-slide-to="0"></li>
        <?php endif;?>
        <?php $index1++;?>
        <?php endforeach;?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php $index = 0;?>
        <?php foreach ($list_slider as $row_slider):?>
        <?php if($index == 0 ):?>
        <div class="item active">
            <img src="public/img/<?php echo $row_slider['img'];?>" alt="Los Angeles" style="width:100%;">
        </div>
        <?php else :?>
        <div class="item">
            <img src="public/img/<?php echo $row_slider['img'];?>" alt="Los Angeles" style="width:100%;">
        </div>
        <?php endif;?>
        <?php $index++;?>
        <?php endforeach;?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <i class="fas fa-chevron-left" style="position: relative;top: 50%;right: 73px;"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <i class="fas fa-chevron-right" style="position: relative;top: 50%;right: -73px;"></i>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- /SLIDER -->