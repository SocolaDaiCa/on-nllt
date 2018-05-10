<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-05-10 07:21:57
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-05-10 08:07:08
 */
/* Connect*/
$conn = new mysqli('localhost', 'root', '', 'db');
/* Delete */
if(!empty($_GET['delete'])){
	$id = $_GET['delete'];
	$sql = "DELETE FROM users WHERE id = $id";
	if ($conn->query($sql) === TRUE) {
	    echo "Xóa thành công";
	} else {
	    echo "Error deleting record: " . $conn->error;
	}	
}
/* Select */
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>
	<a href="them.php" title="">Thêm</a>
	<a href="dangnhap.php" title="">Đăng nhập</a>
	<table border="1">
		<thead>
			<tr>
				<th>Username</th>
				<th>Password</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while($row = $result->fetch_assoc()): ?>
				<tr>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['password']; ?></td>
					<td>
						<a href="sua.php?id=<?php echo $row['id']; ?>" title="">Sửa</a>
						<a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete?')">Xóa</a>
					</td>
				</tr>
			<?php endwhile ?>
		</tbody>
	</table>