<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-05-10 07:44:30
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-05-10 14:36:37
 */
if(!empty($_POST)){
	/* Connect */
	$conn = new mysqli('localhost', 'root', '', 'db');

	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT count(*) as c from users where username = '$username' and password = '$password'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if($row['c'] > 0){
		echo "đăng nhập thành công";
	} else {
		echo "đăng nhập thất bại";
	}
}

?>
<form action="dangnhap.php" method="POST" accept-charset="utf-8">
	Username: <input type="text" name="username"><br>
	password: <input type=password" name="password"><br>
	<button type="submit">Login</button>
</form>