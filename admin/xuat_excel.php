<?php 
session_start();
error_reporting(0);
$conn=mysqli_connect("mysql5027.site4now.net","a7b583_dbweb","toan1532001","db_a7b583_dbweb");
mysqli_query($conn,'SET NAMES "utf8"'); // hiển thị tiếng việt
$sql="select * from orders";
$kq=mysqli_query($conn,$sql);
$output='';
$output.='<span style="width:150px;color:green;text-align: center;">
                     Siêu Thị Hạt Giống và Cây Trồng Như Ngọc</span>
           <br><span style="width:150px;color:green;text-align: center;">SDT:0866795136</span>
          <br><span style="width:150px;color:green;text-align: center;">Địa chỉ: Phú Lâm Tiên Du Bắc Ninh</span>
           ';
    if (mysqli_num_rows($kq)) {
        $output.='<table class="table" bordered="1">
            
           <tr></tr>
           <tr></tr>
            <tr style="background:rgb(160, 224, 154)">
                
                <th>Số TT</th>
                <th>ID</th>
                <th>Khách Hàng</th>
                <th>SĐT</th>
                <th>Địa Chỉ</th>
                <th>Ghi Chú</th>
                <th>Tổng Tiền</th>
            </tr>';
            $i=1;
        while($hang=mysqli_fetch_object($kq))
        {
            $output.='
            <tr><td>'.$i.'</td>
                <td>'.$hang->id.'</td>
                <td>'.$hang->name.'</td>
               <td>'.$hang->phone.'</td>
                <td>'.$hang->address.'</td>
                   <td>'.$hang->note.'</td>
                   <td>'.$hang->total.'</td>
            </tr>
            ';
            $i++;
        }
        $output.='</table>';
        header("Content-Type:application/xls");
        header("Content-Disposition: attachment; filename=download.xls");
        echo $output;
    }
?>