<?php 
$post = loadModel('post');
$id = $_REQUEST['id'];
$post_row=  $post->post_row(['id'=>$id,'status'=>1]);
$topic = loadModel('topic');
$topid=$post_row['topid'];
$list_post = $post->post_list(['topid'=> $topid,'type' => 'post','status'=>'index']);
$topic_row=$topic->topic_row();
    $title = $post_row['title'];
?>
<?php require_once('views/header.php');?>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 post_header">
            <img style="width: 100%; " src="public/front-end/img/post/<?php echo $post_row['img'];?>" alt="1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="news_title">
                            <div class="news_topic">
                                <p><?php echo $topic_row['name'];?></p>
                            </div>
                            <h1 class="title_detail"><?php echo $post_row['title'];?></h1>
                            <div class="news_date">
                                <?php echo $post_row['created_at'];?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="content_detail">
                <?php echo $post_row['detail'];?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="fb-comments" data-href="index.php?option=product&id=<?php echo $row['slug']?>"
                        data-numposts="5" data-width="100%"></div>
                    <div class="fb-like" data-href="index.php?option=product&id=<?php echo $row['slug']?>" data-width=""
                        data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
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