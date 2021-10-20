
<?php
	session_start();
	$conn=mysqli_connect("mysql5027.site4now.net","a7b583_dbweb","toan1532001","db_a7b583_dbweb");
	mysqli_query($conn,'SET NAMES "utf8"'); // hiển thị tiếng việt
	if (isset($_POST['submit'])) {
	 	$username = $_POST["username"];
		$password = $_POST["password"];
		

		$sql = mysqli_query($conn,"SELECT * FROM user WHERE username='$username' AND password = '$password'");
		
		if (mysqli_num_rows($sql) > 0) {
			$row = mysqli_fetch_array($sql);
			$_SESSION['current_user'] = $row['username'];
			if ($row['level'] == 1) {
				$_SESSION['current_admin'] = $row['level'];
				echo "<script>alert('Đăng nhập thành công!');
				location.href='admin/product_listing.php'</script>";
			}
			else{
				echo "<script>alert('Đăng nhập thành công!');
				location.href='index.php'</script>";
			}
		}else
		{
			 echo "<script>alert('Đăng nhập thất bại!');location.href='./Login-Form/index.html'</script>";
		}

				
		

	} else echo "<script>alert('Đăng nhập thất bại!');
				</script>";
 ?>
