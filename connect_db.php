<?php
$host = "mysql5027.site4now.net";
$user = "a7b583_dbweb";
$password = "toan1532001";
$database = "db_a7b583_dbweb";
$con = mysqli_connect($host, $user, $password, $database);
mysqli_set_charset($con,"utf8");
if (mysqli_connect_errno()){
    echo "Connection Fail: ".mysqli_connect_errno();exit;
}
