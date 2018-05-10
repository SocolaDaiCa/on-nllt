<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-05-10 07:33:59
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-05-10 08:04:30
 */
/* Connect */
$conn = new mysqli('localhost', 'root', '', 'db');
/* cập nhật thông tin*/
if(!empty($_POST)){
	$id = $_GET['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "UPDATE `users` SET username = '$username', password = '$password' WHERE id = $id";
	// die($sql);
	if ($conn->query($sql) === TRUE) {
	    header('Location: index.php');
	} else {
	    echo "Error updating record: " . $conn->error;
	}
}
/* lấy thông tin để sửa*/
$id = $_GET['id'];
$sql = "SELECT * FROM users where id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<form action="sua.php?id=<?php echo$_GET['id'] ?>" method="POST" accept-charset="utf-8">
	Username: <input type="text" name="username" value="<?php echo$row['username'] ?>"><br>
	Password: <input type="password" name="password" value="<?php echo$row['username'] ?>"><br>
	<button type="submit">Save</button>
</form>