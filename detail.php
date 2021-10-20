<!DOCTYPE html>

<html>
    <head>
        <title>Shop AuGarden</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css//style.css" >

        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;500;600&family=Markazi+Text:wght@600&family=Merriweather:wght@300&family=Noto+Sans:wght@400;700&family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">


<link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;500;600&family=Markazi+Text:wght@600&family=Merriweather:wght@300&family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        

         <div class="main">
          <div class="top">
            <img src="images/topp.jpg" style="width: 1100px;height: 270px;">
          </div>

       <div id="menu">
    <ul>
      <li>
        <a href="index.php"> Trang Chủ</a>
      </li>
      <li>
        <a href="index.php"> Kỹ Thuật Gieo Trồng</a>
      </li>
      <li>
        <a href="#"> Danh Mục Sản Phẩm</a>
        <ul class="sub-menu">
          <a href="./index.php">Hạt Giống Cây Ăn Qủa</a>
          <a href="">Hạt Giống Cây Lấy Củ</a>
          <a href="">Hạt Giống Cây Lấy Lá</a>
        </ul>
      </li>
       <li>
        <a href="index.php">Kỹ Thuật Trồng Cây</a>
      </li>
        <li>
        <a href="index.php">Giới Thiệu</a>
      </li>
      
     
     
      <li>
        <!-- dang nhap -->
        
        
          <?php 
            if (!empty($_SESSION['current_user'])) {
              echo '<a >';
              echo " " .$_SESSION['current_user'];
              echo '<ul class="sub-menu">';
      if (!empty($_SESSION['current_admin']) && $_SESSION['current_admin'] == 1) {
                echo '<a href="admin/product_listing.php">Quản trị</a>';
              }
              ?>
              
                 <a href="#">Thông tin</a>
                   <a href="logout.php">Đăng xuất</a>   
              </ul>
          <?php
            }else{
             echo '<a href="Login-Form/index.html">'; 
             echo " Đăng nhập";
            }
            
          ?>
          
        </a>


      </li>

    </ul>
  </div>


        <?php
        include './connect_db.php';
        $result = mysqli_query($con, "SELECT * FROM `product` WHERE `id` = ".$_GET['id']);
        $product = mysqli_fetch_assoc($result);
        $imgLibrary = mysqli_query($con, "SELECT * FROM `image_library` WHERE `product_id` = ".$_GET['id']);
        $product['images'] = mysqli_fetch_all($imgLibrary, MYSQLI_ASSOC);
        ?>
        <div class="container">
      
            <strong><p>Chi tiết sản phẩm</p></strong>
            <div id="product-detail">
                <div id="product-img">
                    <img src="<?=$product['image']?>" />
                </div>
                <div id="product-info">
                    <h1><?=$product['name']?></h1>
 
                     <div class="mt">
                      <?=$product['mieuta']?>
                    </div>


                     <div class="gia">

                    <label>Giá: </label><span class="product-price"><?= number_format($product['price'], 0, ",", ".") ?> VND</span><br/>
                        </div>
                    <form id="add-to-cart-form" action="cart.php?action=add" method="POST">
                        <input type="text" value="1" name="quantity[<?=$product['id']?>]" size="2" />
                        <input type="submit" value="Thêm vào giỏ hàng" />
                    </form>
                    
                    <?php if(!empty($product['images'])){ ?>
                    <div id="gallery">
                        <ul>
                            <?php foreach($product['images'] as $img) { ?>
                                <li><img src="<?=$img['path']?>" /></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
                <div class="clear-both"></div>
                <?=$product['content']?>
            </div>
        </div>






<!-- -------------------------------footer--------------------- -->
 <div class="footer">
                        
                        <div class=f1>
                          <ul>
                            <li><a href="#" id="a">Giờ Bán hàng</a> </li>
                            <li><a href="#">Siêu Thị Hạt Giống Và Cây Trồng Như Ngọc</a><li>
                            <li><a href="#">Thứ 2 - Thứ 6: 8h sáng - 22h tối</a></li>
                            
                            <li><a href="#">Thứ 7: 10h sáng-21h tối(gọi khi cần gấp)               </a></li>
                            <li><a href="#">Chủ nhật: Đóng cửa</a></li><br>
                          </ul>

                        </div>

                        <div class=f2>
                          
                           <div class=f1>
                          <ul>
                            <li><a href="#" id="a">Liên hệ mua hàng</a> </li>
                            <li><a href="#">Địa chỉ: 1922,HH2H, Linh Đàm, Hoàng Mai, Hà Nội</a><li>
                            <li><a href="#">SĐT:0866795136</a></li>
                            
                            <li><a href="#">Email:shopnhungon@gmail.com<br></a></li>
                     
                          </ul>

                        </div>

                        </div>

                        <div class=f3>
                          
                            <div class=f1>
                          <ul>
                            <li><a href="#" id="a">Thông Tin </a> </li>
                            <li><a href="#">Địa chỉ:1922,HH2H, Linh Đàm, Hoàng Mai, Hà Nội</a><li>
                            <li><a href="#">SĐT:0866795136</a></li>
                            
                            <li><a href="#">Email:shopnhungon@gmail.com<br></a></li>
                         </ul>
 
                        </div>

                        </div>

                  </div>




    </body>
</html>