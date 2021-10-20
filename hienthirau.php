<!DOCTYPE html>
<html>
<head>
  <title>Shop AuGarden</title>
  <link rel="stylesheet" type="text/css" href="css/rauqua.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;500;600&family=Markazi+Text:wght@600&family=Merriweather:wght@300&family=Noto+Sans:wght@400;700&family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;500;600&family=Markazi+Text:wght@600&family=Merriweather:wght@300&family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">






</head>
<body>
  <?php
  session_start();
  $search = isset($_GET['name']) ? $_GET['name'] : "";
  if ($search) {
    $where = "WHERE `loai` LIKE '%" . $search . "%'";
  }
  include './connect_db.php';
  $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 8;
        $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
        $offset = ($current_page - 1) * $item_per_page;
        if ($search) {
          $products = mysqli_query($con, "SELECT * FROM `product` WHERE `name` LIKE '%" . $search . "%' ORDER BY `id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
          $totalRecords = mysqli_query($con, "SELECT * FROM `product` WHERE `name` LIKE '%" . $search . "%'");
        } else {
          $products = mysqli_query($con, "SELECT * FROM `product` where loai = 'rau' ORDER BY `id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
          $totalRecords = mysqli_query($con, "SELECT * FROM `product` where loai = 'rau'");
        }
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        ?>
        
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
                   <a href="./index.php">Tất Cả Sản Phẩm</a>
                  <a href="./hienthiqua.php">Hạt Giống Cây ăn quả</a>
                  <a href="./hienthirau.php">Các Loại Rau</a>
                  <a href="./hienthicu.php">Hạt Giống Cây Lấy Củ</a>
                  <a href="./hienthihoaqua.php">Hoa Qủa Tươi</a>
                </ul>
              </li>
              <li>
                <a href="gioithieu.php">Kỹ Thuật Trồng Cây</a>
              </li>
              <li>
                <a href="gioithieu.php">Giới Thiệu</a>
              </li>



              <li>
                <!-- dang nhap -->


                <?php 
                if (!empty($_SESSION['current_user'])) {


                  echo '<a>Xin chào: ';
                  echo " " .$_SESSION['current_user'];
                  echo '<ul class="sub-menu">';
                  if (!empty($_SESSION['current_admin']) && $_SESSION['current_admin'] == 1) {
                    // echo '<a href="admin/product_listing.php">Quản trị</a>';
                  }
                  ?>
                  <!--  <a href="#">Đăng Ký</a> -->
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


     <div class="introduce">

       <div class="left-container">
        <ul>
         <li id="danhsach" ><img src="images/checklist.png" style="width: 40px; height: 40px; float: left; margin-top: 5px;margin-left: 3px;"><strong><p>TIN TỨC NỔI BẬT<p></strong></li>
           <li id="nd"><a href="./index.php">Sản Phẩm</a></li>
           <li id="nd"><a href="./cart.php">Giỏ Hàng</a>       </li>
           <li id="nd">Cẩm Nang Trồng Cây</li>
           <li id="nd">Giới Thiệu Phân Bón</li>
           <li id="nd">Liên Hệ</li>
         </ul>


       </div>





       <div class="slideshow-container">


        <div class="mySlides fade">
         <!--  <div class="numbertext">3 / 3</div> -->
         <div id="tin-phoi-giong">
          <div id="anh">
           <img src="images/sile1.jpg" >
         </div>


       </div>
     </div>

     <div class="mySlides fade">
       <!--  <div class="numbertext">2 / 3</div> -->
       <div id="tin-phoi-giong">
         <div id="anh">
          <img src="images/sidle10.jpg" >
        </div>


      </div>
    </div>

    <div class="mySlides fade">
      <!--   <div class="numbertext">1 / 3</div> -->
      <div id="tin-phoi-giong">
       <div id="anh">
        <img src="images/hatgiong1.jpg" >
      </div>


    </div>
  </div>





</div>

</div>

<br>


<
              



<!-- -----------------------------tin tuong---------------------------  
             <div class="trust">



                   <div id="top-trust">
                     <img src="images/imagin.jpg">

                          <h2>Miễn Phí Giao Hàng Toàn Quốc</h2>
                          <p>với hàng nghìn sản phẩm uy tín</p>
             </div>

            <div  id="top-trust">
                  <img src="images/image_box_2.jpg">
                    <h2>Những Sản Phẩm Chất Lượng</h2><br>
                    <p>chúng tôi đem đến cho Gia Đình bạn</p>

            </div>


               <div id="top-trust">
                     <img src="images/image.jpg">
                     <h2>CAM KẾT hoàn tiền</h2><br>
                       <p>nếu sản phẩm không đạt chuẩn</p>

              </div>







           </div>




<!-- <div id="dott" style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
-->
<script>
  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
      }

      var slideIndex = 0;
      showSlides();

      function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
          slides[slideIndex-1].style.display = "block";
                      setTimeout(showSlides, 2000); // Change image every 2 seconds
                    }

                  </script>






                  <div id="wrapper-product" class="container">
                    <h1>Hạt Giống Cây Rau</h1>
                    <form id="product-search" method="GET">
                      <label>Tìm kiếm sản phẩm</label>
                      <input type="text" value="<?=isset($_GET['name']) ? $_GET['name'] : ""?>" name="name" />
                      <input type="submit" value="Tìm kiếm" />
                    </form>
                    <div class="product-items">
                      <?php
                      while ($row = mysqli_fetch_array($products)) {
                        ?>
                        <div class="product-item">
                          <div class="product-img">
                            <a href="detail.php?id=<?= $row['id'] ?>"><img src="<?= $row['image'] ?>" title="<?= $row['name'] ?>" /></a>
                          </div>
                          <strong><a href="detail.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></strong><br/>
                          <label>Giá: </label><span class="product-price"><?= number_format($row['price'], 0, ",", ".") ?> đ</span><br/>
                          <p><?= $row['content'] ?></p>
                          <div class="buy-button">
                            <a href="detail.php?id=<?= $row['id'] ?>">Mua sản phẩm</a>
                          </div>
                        </div>
                      <?php } ?>
                      <div class="clear-both"></div>
                      <?php
                      include './pagination.php';
                      ?>
                      <div class="clear-both"></div>
                    </div>



                  </div>










                  <!-- -----------------------------San Pham Noi Bat------------------------- -->

                  



         <!-----------------------------footer------------------------------------------- -->

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