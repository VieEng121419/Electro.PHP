<?php 
   $product = loadModel('product');
   $cart = loadClass('cart');
   //THÊM GIỎ HÀNG
       if(isset($_REQUEST['addcart']))
       {
           $id = $_REQUEST['addcart'];
           $row = $product -> product_row(['id'=>$id,'status'=> 1]);
           $qty = (isset($_POST['DATMUA'])) ? $_POST['qty'] : 1;
           $data = array(
               'id'=>$id,
               'name'=>$row['name'],
               'img'=>$row['img'],
               'price'=>$row['price'],
               'qty' => $qty,
               'amount' => ($row['price'] * $qty)
           );
    
           $cart-> cart_add($data);
           redirect("index.php?option=cart");
       }
       //XÓA GIỎ HÀNG
       if(isset($_REQUEST['delcart']))
       {
           $id = $_REQUEST['delcart'];
           if($id == 'all')
           { 
               $cart->cart_delete();
           }
           else{
               $cart->cart_delete($id);
           }
           redirect("index.php?option=cart");
       }
        //UPDATE GIỎ HÀNG
        if(isset($_REQUEST['updatecart']) && isset($_POST['CAPNHAT']))
        {   
            $qty = $_POST['qty'];
            $cart_list=$cart->cart_content();  
            $i=0;    
            $data=array();   
            foreach($cart_list as $cart_row)
            {
                $row=array(
                    'id'=>$cart_row['id'],
                    $row_product = $product -> product_row(['id'=>$cart_row['id'],'status'=> 1]),
                    'price'=> $row_product['price'],
                    'qty'=>$qty[$i],
                    'amount' => ($row_product['price'] * $qty[$i])
                );
                $data[]=$row;
                $i++;              
            }
            $cart->cart_update($data);
            redirect("index.php?option=cart");
        }
   ?>
<?php $title='Giỏ Hàng';?>
<?php require_once('views/header.php'); ?>
<style class="cp-pen-styles">

html,
body,
div,
span,
applet,
object,
iframe,
h1,
h2,
h3,
h4,
h5,
h6,
p,
blockquote,
pre,
a,
abbr,
acronym,
address,
big,
cite,
code,
del,
dfn,
em,
img,
ins,
kbd,
q,
s,
samp,
small,
strike,
strong,
sub,
sup,
tt,
var,
b,
u,
i,
center,
dl,
dt,
dd,
ol,
ul,
li,
fieldset,
form,
label,
legend,
table,
caption,
tbody,
tfoot,
thead,
tr,
th,
td,
article,
aside,
canvas,
details,
embed,
figure,
figcaption,
footer,
header,
hgroup,
menu,
nav,
output,
ruby,
section,
summary,
time,
mark,
audio,
video {
    margin: 0;
    padding: 0;
    border: 0;
    font: inherit;
    font-size: 100%;
    vertical-align: baseline;
}

html {
    line-height: 1;
}

ol,
ul {
    list-style: none;
}

table {
    border-collapse: collapse;
    border-spacing: 0;
}

caption,
th,
td {
    text-align: left;
    font-weight: normal;
    vertical-align: middle;
}

q,
blockquote {
    quotes: none;
}

q:before,
q:after,
blockquote:before,
blockquote:after {
    content: "";
    content: none;
}

a img {
    border: none;
}

article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
main,
menu,
nav,
section,
summary {
    display: block;
}

* {
    box-sizing: border-box;
}

body {
    color: #333;
    -webkit-font-smoothing: antialiased;
}

img {
    max-width: 100%;
}

.cf:before,
.cf:after {
    content: " ";
    display: table;
}

.cf:after {
    clear: both;
}

.cf {
    *zoom: 1;
}

.wrap {
    width: 100%;
    max-width: 960px;
    margin: 0 auto;
    padding: 1% 0;
    margin-bottom: 5em;
}

.projTitle {
    font-weight: bold;
    text-align: center;
    font-size: 2em;
    padding: 1em 0;
    border-bottom: 1px solid #dadada;
    letter-spacing: 3px;
    text-transform: uppercase;
}

.projTitle span {

    font-weight: normal;
    font-style: italic;
    text-transform: lowercase;
    color: #777;
}

.heading {
    padding: 9px;
    float: left;
}

.heading h1 {

    font-size: 2em;
    float: left;
}

.heading a.continue:link,
.heading a.continue:visited {
    text-decoration: none;

    letter-spacing: -.015em;
    font-size: .75em;
    padding: 1em;
    color: #fff;
    background: #82ca9c;
    font-weight: bold;
    border-radius: 50px;
    float: right;
    text-align: right;
    -webkit-transition: all 0.25s linear;
    -moz-transition: all 0.25s linear;
    -ms-transition: all 0.25s linear;
    -o-transition: all 0.25s linear;
    transition: all 0.25s linear;
}

.heading a.continue:after {
    content: "\276f";
    padding: .5em;
    position: relative;
    right: 0;
    -webkit-transition: all 0.15s linear;
    -moz-transition: all 0.15s linear;
    -ms-transition: all 0.15s linear;
    -o-transition: all 0.15s linear;
    transition: all 0.15s linear;
}

.heading a.continue:hover,
.heading a.continue:focus,
.heading a.continue:active {
    background: #f69679;
}

.heading a.continue:hover:after,
.heading a.continue:focus:after,
.heading a.continue:active:after {
    right: -10px;
}

.tableHead {
    display: table;
    width: 100%;
    font-family: 'Montserrat', sans-serif;
    font-size: .75em;
}

.tableHead li {
    display: table-cell;
    padding: 1em 0;
    text-align: center;
}

.tableHead li.prodHeader {
    text-align: left;
}

.cart {
    padding: 1em 0;
}

.cart .items {
    display: block;
    width: 100%;
    vertical-align: middle;
    padding: 1.5em;
    border-bottom: 1px solid #fafafa;
}

.cart .items.even {
    background: #fafafa;
}

.cart .items .infoWrap {
    display: table;
    width: 100%;
    margin-left: 19px;
}

.cart .items .cartSection {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
}

.cart .items .cartSection .itemNumber {
    font-size: .75em;
    color: #777;
    margin-bottom: .5em;
}

.cart .items .cartSection h3 {
    font-size: 1em;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: .025em;
}

.cart .items .cartSection p {
    display: inline-block;
    font-size: .85em;
    color: #777777;
}

.cart .items .cartSection p .quantity {
    font-weight: bold;
    color: #333;
}

.cart .items .cartSection p.stockStatus {
    color: #82CA9C;
    font-weight: bold;
    padding: .5em 0 0 1em;
    text-transform: uppercase;
}

.cart .items .cartSection p.stockStatus.out {
    color: #F69679;
}

.cart .items .cartSection .itemImg {
    width: 4em;
    float: left;
}

.cart .items .cartSection.qtyWrap,
.cart .items .cartSection.prodTotal {
    text-align: center;
}

.cart .items .cartSection.qtyWrap p,
.cart .items .cartSection.prodTotal p {
    font-weight: bold;
    font-size: 1.25em;
}

.cart .items .cartSection input.qty {
    width: 3em;
    text-align: center;
    font-size: 1em;
    padding: .25em;
    margin: 1em .5em 0 0;
}

.cart .items .cartSection .itemImg {
    width: 8em;
    display: inline;
    padding-right: 1em;
}

.special {
    display: block;
}

.special .specialContent {
    padding: 1em 1em 0;
    display: block;
    margin-top: .5em;
    border-top: 1px solid #dadada;
}

.special .specialContent:before {
    content: "\21b3";
    font-size: 1.5em;
    margin-right: 1em;
    color: #6f6f6f;
}

a.remove {
    text-decoration: none;
    color: #ffffff;
    font-weight: bold;
    background: #e0e0e0;
    padding: .5em;
    font-size: .75em;
    display: inline-block;
    border-radius: 100%;
    line-height: .85;
    -webkit-transition: all 0.25s linear;
    -moz-transition: all 0.25s linear;
    -ms-transition: all 0.25s linear;
    -o-transition: all 0.25s linear;
    transition: all 0.25s linear;
}

a.remove:hover {
    background: #f30;
}

.promoCode {
    border: 2px solid #efefef;
    float: left;
    width: 35%;
    padding: 2%;
}

.promoCode label {
    display: block;
    width: 100%;
    font-style: italic;
    font-size: 1.15em;
    margin-bottom: .5em;
    letter-spacing: -.025em;
}

.promoCode input {
    width: 85%;
    font-size: 1em;
    padding: .5em;
    float: left;
    border: 1px solid #dadada;
}

.promoCode input:active,
.promoCode input:focus {
    outline: 0;
}

.promoCode a.btn {
    float: left;
    width: 15%;
    padding: .75em 0;
    border-radius: 0 1em 1em 0;
    text-align: center;
    border: 1px solid #82ca9c;
}

.promoCode a.btn:hover {
    border: 1px solid #f69679;
    background: #f69679;
}

.btn:link,
.btn:visited {
    text-decoration: none;
    font-family: 'Montserrat', sans-serif;
    letter-spacing: -.015em;
    font-size: 1em;
    padding: 1em 3em;
    color: #fff;
    background: #82ca9c;
    font-weight: bold;
    border-radius: 50px;
    float: right;
    text-align: right;
    -webkit-transition: all 0.25s linear;
    -moz-transition: all 0.25s linear;
    -ms-transition: all 0.25s linear;
    -o-transition: all 0.25s linear;
    transition: all 0.25s linear;
}

.btn:after {
    content: "\276f";
    padding: .5em;
    position: relative;
    right: 0;
    -webkit-transition: all 0.15s linear;
    -moz-transition: all 0.15s linear;
    -ms-transition: all 0.15s linear;
    -o-transition: all 0.15s linear;
    transition: all 0.15s linear;
}

.btn:hover,
.btn:focus,
.btn:active {
    background: #f69679;
}

.btn:hover:after,
.btn:focus:after,
.btn:active:after {
    right: -10px;
}

.promoCode .btn {
    font-size: .85em;
    paddding: .5em 2em;
}

/* TOTAL AND CHECKOUT  */
.subtotal {
    float: right;
    width: 100%;
}

.subtotal .totalRow {
    padding: .5em;
    text-align: right;
}

.subtotal .totalRow.final {
    font-size: 1.25em;
    font-weight: bold;
}

.subtotal .totalRow span {
    display: inline-block;
    padding: 0 0 0 1em;
    text-align: right;
}

.subtotal .totalRow .label {
    font-size: .85em;
    text-transform: uppercase;
    color: #777;
}

.subtotal .totalRow .value {
    letter-spacing: -.025em;
    width: 35%;
}

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td,
th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

@media only screen and (max-width: 39.375em) {
    .wrap {
        width: 98%;
        padding: 2% 0;
    }

    .projTitle {
        font-size: 1.5em;
        padding: 10% 5%;
    }

    .heading {
        padding: 1em;
        font-size: 90%;
    }

    .cart .items .cartSection {
        width: 90%;
        display: block;
        float: left;
    }

    .cart .items .cartSection.qtyWrap {
        width: 10%;
        text-align: center;
        padding: .5em 0;
        float: right;
    }

    .cart .items .cartSection.qtyWrap:before {
        content: "QTY";
        display: block;
        padding: .25em;
        font-size: .75em;
    }

    .cart .items .cartSection.prodTotal,
    .cart .items .cartSection.removeWrap {
        display: block;
        margin-top: 28px;
        text-align: center;
    }

    .cart .items .cartSection .itemImg {
        width: 25%;
    }

    .promoCode,
    .subtotal {
        width: 100%;
    }

    a.btn.continue {
        width: 100%;
        text-align: center;
    }

}
</style>
<?php 
   $cart_list=$cart->cart_content();
   $total_money= 0;
   ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 wrap cf">
                <form action="index.php?option=cart&updatecart=1" method='post'>
                    <div class="cart">
                        <ul class="cartWrap">
                            <?php $index=0;?>
                            <?php if($cart_list != null):?>
                            <?php $_SESSION['order_detail']=array();?>
                            <?php foreach($cart_list as $cart_row):?>
                            <li class="items odd">
                                <div class="row infoWrap">
                                    <div class="col-12 col-md-6 cartSection">
                                        <img src="public/front-end/img/product/<?php echo $cart_row['img'];?>"
                                            alt="hinh1" class="itemImg" />
                                        <p class="itemNumber"><?php echo $cart_row['id'];?></p>
                                        <h3><?php echo $cart_row['name'];?></h3>
                                        <p> <input name="qty[]" type="number" min='1' class="qty"
                                                value="<?php echo $cart_row['qty'];?>"> x
                                            <?php echo number_format($cart_row['price']);?><sup>đ</sup>
                                        </p>
                                        <p class="stockStatus">Còn Hàng</p>
                                    </div>
                                    <div class="col-12 col-md-4 prodTotal cartSection">
                                        <p><?php echo number_format($cart_row['amount']);?><sup>đ</sup></p>
                                    </div>
                                    <div class="col-12 col-md-2 cartSection removeWrap">
                                        <a href="index.php?option=cart&delcart=<?php echo $cart_row['id'];?>"
                                            class="remove">x</a>
                                    </div>
                                </div>
                            </li>
                            <?php $total_money+= $cart_row['amount'];?>
                            <?php 
                                $id=$cart_row['id'];
                                $name=$cart_row['name'];
                                $qty=$cart_row['qty'];
                                $amount=$cart_row['amount'];
                                $price=$cart_row['price'];
                            ?>
                            <?php $_SESSION['orderdetail'.$index] = array();
                                array_push($_SESSION['orderdetail'.$index],$id,$name,$qty,$amount,$price);?>
                                <?php array_push($_SESSION['order_detail'],$index);?>
                            <?php $index++;?>
                            <?php endforeach;?>   
                            
                            <?php 
                                $_SESSION['total']=$total_money;?>              
                            <?php endif;?>                      
                            <!--<li class="items even">Item 2</li>-->
                        </ul>
                    </div>
                    <div class="subtotal cf">
                        <div class="heading cf">
                            <a href="index.php" class="continue">Tiếp Tục Mua Sắm</a>
                        </div>
                        <div class="heading cf">
                            <button name="CAPNHAT" type="submit" class="btn btn-danger">Cập Nhật</button>
                        </div>
                        <div class="heading cf">
                            <a href="index.php?option=cart&delcart=all" class="continue">Xóa Giỏ Hàng</a>
                        </div>
                        <ul>
                            <li class="totalRow final"><span class="label">Tổng</span><span
                                    class="value"><?php echo number_format($total_money);?></span></li>
                            <li class="totalRow"><a
                                    href="index.php?option=cart&cat=buy"
                                    class="btn continue">Thanh Toán</a></li>
                        </ul>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<script
    src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'>
</script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
// Remove Items From Cart


// Just for testing, show all items
$('a.btn.continue').click(function() {
    $('li.items').show(400);
})


//# sourceURL=pen.js
</script>
<?php require_once('views/footer.php');?>