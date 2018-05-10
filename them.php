<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-05-10 07:33:59
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-05-10 07:50:15
 */
/* Connect */
$conn = new mysqli('localhost', 'root', '', 'db');
/* thêm */
if(!empty($_POST)){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
	if ($conn->query($sql) === TRUE) {
	    header('Location: index.php');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>
<form action="them.php" method="POST" accept-charset="utf-8">
	Username: <input type="text" name="username"><br>
	Password: <input type="password" name="password"><br>
	<button type="submit">Thêm</button>
</form>