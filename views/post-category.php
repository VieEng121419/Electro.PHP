<?php
$post = loadModel('post');
$pagination = loadClass('pagination');
$limit = 3;
    $pageCurrent = $pagination -> pageCurrent();
    $offset = $pagination->pageFirst($pageCurrent, $limit);
$args=array(
    'status'=>'index',
    'type'=>'post',
    'offset'=>$offset,
    'limit'=>$limit
);
$total = $post->post_count($args);   
$list_post = $post->post_list($args);
$title = 'Tin tức';
?>
<?php require_once('views/header.php');?>
<div class="container">
    <div class="row">
        <div class="news_header">
            <h1>Electro. News</h1>
        </div>
        <div class="col-md-8">
            <?php foreach($list_post as $row):?>
            <div class="col-md-12 news_content1">
                <div class="row">
                    <div class="col-md-4">
                        <a href="index.php?option=post&cat=tin-tuc&id=<?php echo $row['id'];?>">
                            <img style="width: 220px; height:124px;"
                                src="public/front-end/img/post/<?php echo $row['img'];?>" alt="1"></a>
                    </div>
                    <div class="col-md-8">
                        <a href="index.php?option=post&cat=tin-tuc&id=<?php echo $row['id'];?>">
                            <h4><?php echo $row['title'];?></h4>
                        </a>
                        <p><?php echo $row['created_at'];?></p>
                        <div class="content_news">
                            <p><?php echo substr($row['detail'],0,99);?>...</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <div class="pagination1" style="position: relative;left: 660px;">
                <?php echo $pageLink= $pagination->pageLink($total, $pageCurrent, $limit, 'index.php?option=post&cat=tin-tuc');?>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row content2">
                <div class="col-md-6 news_header1">
                    <h5>BÀI VIẾT PHỔ BIẾN</h5>
                </div>
                <div class="col-md-6"></div>
            </div>
            <?php foreach($list_post as $row):?>
            <div class="col-md-12 news_content2">
                <div class="row">
                    <div class="col-md-4">
                        <a href="index.php?option=post&cat=tin-tuc&id=<?php echo $row['id'];?>"><img
                                style="width: 100px; height:70px;"
                                src="public/front-end/img/post/<?php echo $row['img'];?>" alt="1"></a>
                    </div>
                    <div class="col-md-8">
                        <a href="index.php?option=post&cat=tin-tuc&id=<?php echo $row['id'];?>">
                            <h5><?php echo substr($row['title'],0,60);?>...</h5>
                        </a>
                        <p><?php echo $row['created_at'];?></p>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<?php require_once('views/footer.php');?>