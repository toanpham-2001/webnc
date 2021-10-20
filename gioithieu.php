

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
    $where = "WHERE `name` LIKE '%" . $search . "%'";
  }
  include './connect_db.php';
  $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 8;
        $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
        $offset = ($current_page - 1) * $item_per_page;
        if ($search) {
          $products = mysqli_query($con, "SELECT * FROM `product` WHERE `name` LIKE '%" . $search . "%' ORDER BY `id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
          $totalRecords = mysqli_query($con, "SELECT * FROM `product` WHERE `name` LIKE '%" . $search . "%'");
        } else {
          $products = mysqli_query($con, "SELECT * FROM `product` ORDER BY `id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
          $totalRecords = mysqli_query($con, "SELECT * FROM `product`");
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


              echo '<a >Xin chào: 
              ';
              echo " " .$_SESSION['current_user'];
              echo '<ul class="sub-menu">';
      if (!empty($_SESSION['current_admin']) && $_SESSION['current_admin'] == 1) {
                echo '<a href="admin/product_listing.php">Quản trị</a>';
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

<!-- --------------------------------------------NOI DUNG GIOI THIEU------------------------------------- -->



<div class="imformation">
    <div id="top-imformation">
    Công ty Cổ phần Thương mại và Đầu tư Au-Garden- đơn vị chuyên cung cấp phân phối giống cây trồng và các loại trái cây cao cấp trong nước và từ các nước trên thế giới đang từng bước phát triển và chiếm được lòng tin của người tiêu dùng Việt Nam.
    <br>
      <img src="images/gioithieu1.jpg" >

      <br>

    <strong><p>
        Tên công ty: Công ty Cổ phần Thương mại và đầu tư Au-Garden
        <br><br></p></strong> 

      <strong><p>   Mã số thuế: 0101628217
        <br><br></p></strong> 


          <strong><p>  Địa chỉ: Phú Lâm - Tiên Du - Bắc Ninh - Việt Nam
        <br><br></p></strong> 

      <strong><p> Số điện thoại:0866795136<br><br></p></strong> 

        <strong><p>Hotline: 02438313999/0972747899<br><br></p></strong> 

        <strong><p>Số máy bàn: 02437956090<br><br></p></strong> 

        <strong><p>Website: http://augarden.com.vn/<br><br></p></strong> 


    </div>
</div>

                  <!-- -------------------------footer------------------------------------------- -->

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