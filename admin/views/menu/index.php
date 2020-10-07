<?php
   $menu = loadModel('menu');
   $category = loadModel('category');
   $topic = loadModel('topic');
   $post = loadModel('post');
   $list_menu = $menu->menu_list(['type' => 'menu','status'=> 'index','sort' => ['orderby' => 'created_at','order' => 'DESC']]);
   $list_category = $category -> category_list(['status'=>'index']);
   $list_topic = $topic -> topic_list(['status'=>'index']);
   $list_page = $post -> post_list(['status'=>'index','type'=>'page']);
?>
<form action="index.php?option=menu&cat=process" method="post" name="form1">
    <?php require_once('views/header.php'); ?>
    <div class="content-wrapper my-2">
        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong class="text-info">DANH SÁCH MENU</strong>
                    </h3>
                    <div class="card-tools">
                        <a href="index.php?option=menu&cat=trash" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>
                <?php require_once('views/message.php');?>
                <div class="row my-4 mx-2">
                    <div class="col-3">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-body">
                                    <label for="">Vị trí menu</label>
                                    <select name="position" class="form-control">
                                        <option value="mainmenu">MainMenu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingCategory">
                                    <span>Loại sản phẩm</span>
                                    <span class="float-right btn btn-sm btn-info" data-toggle="collapse"
                                        data-target="#collapseCategory" aria-expanded="true"
                                        aria-controls="collapseCategory">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                                <div id="collapseCategory" class="collapse p-2 m-2" aria-labelledby="headingCategory"
                                    data-parent="#accordionExample">
                                    <?php foreach ($list_category as $row_cat): ?>
                                    <fieldset class="form-group">
                                        <input name="nameCategory[]" value="<?php echo $row_cat['id'];?>"
                                            id="category<?php echo $row_cat['id'];?>" type="checkbox">
                                        <label
                                            for="category<?php echo $row_cat['id'];?>"><?php echo $row_cat['name'];?></label>
                                    </fieldset>
                                    <?php endforeach; ?>
                                    <fieldset class="form-group">
                                        <input type="submit" name="THEMCATEGORY" value="Thêm"
                                            class="btn btn-success form-control">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTopic">
                                    <span>Chủ đề bài viết</span>
                                    <span class="float-right btn btn-sm btn-info" data-toggle="collapse"
                                        data-target="#collapseTopic" aria-expanded="true" aria-controls="collapseTopic">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                                <div id="collapseTopic" class="collapse p-2 m-2" aria-labelledby="headingTopic"
                                    data-parent="#accordionExample">
                                    <?php foreach ($list_topic as $row_topic):?>
                                    <fieldset class="form-group">
                                        <input name="nameTopic[]" value="<?php echo $row_topic['id'];?>"
                                            id="topic<?php echo $row_topic['id'];?>" type="checkbox">
                                        <label
                                            for="topic<?php echo $row_topic['id'];?>"><?php echo $row_topic['name'];?></label>
                                    </fieldset>
                                    <?php endforeach?>
                                    <fieldset class="form-group">
                                        <input type="submit" name="THEMTOPIC" value="Thêm"
                                            class="btn btn-success form-control">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingPage">
                                    <span>Trang đơn</span>
                                    <span class="float-right btn btn-sm btn-info" data-toggle="collapse"
                                        data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                                <div id="collapsePage" class="collapse p-2 m-2" aria-labelledby="headingPage"
                                    data-parent="#accordionExample">
                                    <?php foreach ($list_page as $row_page):?>
                                    <fieldset class="form-group">
                                        <input name="namePage[]" value="<?php echo $row_page['id'];?>"
                                            id="Page<?php echo $row_page['id'];?>" type="checkbox">
                                        <label
                                            for="Page<?php echo $row_page['id'];?>"><?php echo $row_page['title'];?></label>
                                    </fieldset>
                                    <?php endforeach ?>
                                    <fieldset class="form-group">
                                        <input type="submit" name="THEMPAGE" value="Thêm"
                                            class="btn btn-success form-control">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingCustom">
                                    <span>Tùy chỉnh</span>
                                    <span class="float-right btn btn-sm btn-info" data-toggle="collapse"
                                        data-target="#collapseCustom" aria-expanded="true"
                                        aria-controls="collapseCustom">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                                <div id="collapseCustom" class="collapse p-2 m-2" aria-labelledby="headingCustom"
                                    data-parent="#accordionExample">
                                    <fieldset class="form-group">
                                        <label>Tên menu</label>
                                        <input name="name" class="form-control" id="checkid" type="text">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label>Liên kết</label>
                                        <input name="link" class="form-control" type="text">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input type="submit" name="THEMCUSTOM" value="Thêm"
                                            class="btn btn-success form-control">
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9 ">
                        <div class="card-body " style="border: 2px solid #cccccc">
                            <table class="table table-bordered dataTable no-footer" id="myTable">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1"
                                            aria-label="Tên sản phẩm: activate to sort column ascending"
                                            style="width: 527px;">Tên menu</th>
                                        <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1"
                                            aria-label="Tên sản phẩm: activate to sort column ascending"
                                            style="width: 160px;">Link</th>
                                        <th style="width:160px" class="text-center sorting" tabindex="0"
                                            aria-controls="myTable" rowspan="1" colspan="1"
                                            aria-label="Chức năng: activate to sort column ascending">Chức năng</th>
                                        <th style="width:30px" class="text-center sorting" tabindex="0"
                                            aria-controls="myTable" rowspan="1" colspan="1"
                                            aria-label="ID: activate to sort column ascending">ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($list_menu as $row):?>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="#"><?php echo $row['name'];?></a>
                                        </td>
                                        <td>
                                            <a href="#"><?php echo $row['link'];?></a>
                                        </td>
                                        <td class="text-center">
                                            <?php if($row['status']==1):?>
                                            <a class="btn btn-success btn-sm"
                                                href="index.php?option=menu&cat=status&id=<?php echo $row['id'];?>"
                                                role="button">
                                                <i class="fa fa-toggle-on"></i>
                                            </a>
                                            <?php else:?>
                                            <a class="btn btn-danger btn-sm"
                                                href="index.php?option=menu&cat=status&id=<?php echo $row['id'];?>"
                                                role="button">
                                                <i class="fa fa-toggle-off"></i>
                                                <?php endif;?>
                                                <a class="btn btn-info btn-sm"
                                                    href="index.php?option=menu&cat=update&id=<?php echo $row['id'];?>"
                                                    role="button">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm"
                                                    href="index.php?option=menu&cat=deltrash&id=<?php echo $row['id'];?>"
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
                </div>
        </section>
    </div>
    </div>
</form>
<?php require_once('views/footer.php'); ?>