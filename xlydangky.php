<?php
	$conn=mysqli_connect("localhost","root","","demo_db");
	mysqli_query($conn,'SET NAMES "utf8"');
	session_start();
	$errors = array(); 
	if (isset($_POST['submit']) && $_POST["username"] != '' && $_POST["fullname"] != ''   && $_POST["psw"] != ''  && $_POST["psw2"] != '' && $_POST["address"] != '' && $_POST["phone"] != '') {
		
		$username = $_POST["username"];
		$fullname=$_POST["fullname"];
		$password = $_POST["psw"];
		$password2 = $_POST["psw2"];
		$address = $_POST["address"];
		$phone = $_POST["phone"];

		$level = 0;

		if ($password != $password2) {
			array_push($errors, "Mật khẩu không khớp nhau!");
		 }

		$user_check_query = "SELECT * FROM user WHERE username='$username' LIMIT 1";
		$result = mysqli_query($conn, $user_check_query);
	 	$user = mysqli_fetch_assoc($result);
	  
	  	if ($user) { // if user exists
		    if ($user['username'] === $username) {
		      array_push($errors, "Tên tài khoản đã tồn tại!");
		    }

		  
	  	}

	  	if (count($errors) == 0) {
		  	$password =($password);//encrypt the password before saving in the database

		  	$query = "insert into user(username,fullname,password,diachi,sdt,level) 
		  	values('$username','$fullname','$password','$address','$phone','$level')";

		  	mysqli_query($conn, $query);
		  	$_SESSION['username'] = $username;
		  	echo "<script>alert('Đăng ký thành công!');
		  	location.href='./Login-Form/index.html'
				</script>";
	  		// header('location: index2.php');
	  }
	  else echo "<script>alert('Đăng ký thất bại!');
				location.href='./Login-Form/dangky.html'</script>";
	}
?>