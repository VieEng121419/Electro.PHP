<?php
    $menu = loadModel('menu');
    $list_menu = $menu -> menu_list(['parentid'=>0,'status'=>1,'position'=>'footer']);
?>
<!-- FOOTER -->
<footer id="footer">
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Về Chúng Tôi</h3>
                        <p>CÔNG TY TNHH CÔNG NGHỆ ELECTRO</p>
                        <p>EMAIL: CSKH@ELECTRO.COM</p>
                        <p>HỆ THỐNG TỔNG ĐÀI: (Làm việc từ 8h30 - 20h30)</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>78-80-82 Hoàng Hoa Thám, Phường 12, Quận Tân
                                    Bình.</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>1800 6975</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Danh Mục</h3>
                        <ul class="footer-links">
                            <?php foreach ($list_menu as $row_menu):?>
                            <li><a href="<?php echo $row_menu['link'];?>"><?php echo $row_menu['name'];?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Thông Tin</h3>
                        <ul class="footer-links">
                            <li><a href="index.php?option=page&cat=gioi-thieu">Giới Thiệu</a></li>
                            <li><a href="index.php?option=gioithieu&cat=gioi-thieu">Liện Hệ</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">FANPAGE</h3>
                        <div class="fb-page" data-href="https://www.facebook.com/gearvnhcm/" data-tabs="timeline"
                            data-width="" data-height="300" data-small-header="false" data-adapt-container-width="true"
                            data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/gearvnhcm/" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/gearvnhcm/">Electro.</a></blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <span class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Bản Quyền &copy;<script>
                        document.write(new Date().getFullYear());
                        </script> DƯƠNG VIỆT ANH
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->
<!-- jQuery Plugins -->
<script src="public/front-end/js/jquery.min.js"></script>
<script src="public/front-end/js/bootstrap.min.js"></script>
<script src="public/front-end/js/slick.min.js"></script>
<script src="public/front-end/js/nouislider.min.js"></script>
<script src="public/front-end/js/jquery.zoom.min.js"></script>
<script src="public/front-end/js/main.js"></script>
<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

</body>

</html>