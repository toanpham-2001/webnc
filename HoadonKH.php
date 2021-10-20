<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<link rel="stylesheet" type="text/css" href="css//styleHoaDon.css">
<script src="../resources/ckeditor/ckeditor.js"></script>
    </head>
    <body>
      <div class="main">
        <?php
        session_start();
        if (!empty($_SESSION['current_user'])) {
            include 'config.php';
            $orders = mysqli_query($conn, "SELECT orders.name, orders.address, orders.phone, orders.note, order_detail.*, product.name as product_name 
FROM orders
INNER JOIN order_detail ON Orders.id = order_detail.order_id
INNER JOIN product ON product.id = order_detail.product_id
WHERE orders.id = " . $_GET['id']);
            $orders = mysqli_fetch_all($orders, MYSQLI_ASSOC);
        }
        ?>


<div id="page" class="page">
    <div class="header">
       <div class="logo"><img src="images/logooo.png"/ style="width: 140px"></div>
        <div class="company"><p1>SIÊU THỊ HẠT GIỐNG VÀ HOA QUẢ AUGARDEN</p1><br><p2>Mã số thuế:1221343444</p2><br><p3>Địa chỉ: Phú Lâm Tiên Du Bắc Ninh</p3></div>
    </div>
  <br/>
  <div class="title">
    <br><h2>
        HÓA ĐƠN THANH TOÁN</h2>
        <br/>
       <br>
  </div>
  <div id="infor-khachhang">
  <label>Khách hàng: </label><span> <?= $orders[0]['name'] ?></span><br/>
                <label>Điện thoại: </label><span> <?= $orders[0]['phone'] ?></span><br/>
                <label>Địa chỉ: </label><span> <?= $orders[0]['address'] ?></span><br/>
                <hr/>
  </div>
  <br/>
  <br/>
  <table class="TableData">
    <tr>
      <th>STT</th>
      <th>Tên</th>
      <th>Đơn giá</th>
      <th>Số lượng</th>
      <th>Thành tiền</th>
    </tr>
    <?php
$tongsotien = 0;
    $pos = 1;
    $tongsotien = 0;
    foreach($orders as $row)
    {
        $tongsotien += $row['quantity']*$row['price'];
        echo "<tr>";
        echo "<td class=\"cotSTT\">".$pos++."</td>";
        echo "<td class=\"cotTenSanPham\">".$row['product_name']."</td>";
        echo "<td class=\"cotTenSanPham\">".$row['price']."</td>";

        
        echo "<td class=\"cotSoLuong\" align='center'>".$row['quantity']."</td>";
        echo "<td class=\"cotSo\">".number_format(($row['quantity']*$row['price']),0,",",".")."</td>";
        echo "</tr>";
    }       
?>
    <tr>
      <td colspan="4" class="tong">Tổng cộng</td>
      <td class="cotSo"><?php echo number_format(($tongsotien),0,",",".")?></td>
    </tr>
  </table>
  <div class="footer-left"><!--  Nam Định, ngày 16 tháng 12 năm 2020<br/> -->
    Khách hàng </div>
  <div class="footer-right"> Nam Định, ngày 16 tháng 12 năm 2020<br/>
    Nhân viên </div>
</div>

</div>
</body>