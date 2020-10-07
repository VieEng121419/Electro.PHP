<?php
    $menu = loadModel('menu');
    $list_menu1 = $menu -> menu_list(['parentid'=>0,'status'=>1,'position'=>'mainmenu']);
?>
<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <?php foreach ($list_menu1 as $row_menu1):?>
                <?php 
                    $list_menu2 = $menu -> menu_list(['parentid'=>$row_menu1['id'],'status'=>1,'position'=>'mainmenu']);
               ?>
                <?php if(count( $list_menu2 )>0):?>
                    <li class="dropdown">
                        <a href="<?php echo $row_menu1['link'];?>" class="dropdown-toggle">
                        <?php echo $row_menu1['name'];?>
                        </a>
                        <div class="dropdown-content">
                            <?php foreach($list_menu2 as $row_menu2):?>
                                <a href="<?php echo $row_menu2['link'];?>"><?php echo $row_menu2['name'];?></a>
                            <?php endforeach;?>
                        </div>
                    </li>
                <?php else:?>
                <li><a href="<?php echo $row_menu1['link'];?>"><?php echo $row_menu1['name'];?></a></li>
                <?php endif;?>
                <?php endforeach;?>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->

