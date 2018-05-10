<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-05-10 07:33:59
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-05-10 14:36:42
 */

/* Connect */
$conn = new mysqli('localhost', 'root', '', 'db');
/* thêm */
if(!empty($_POST)){
	var_dump($_POST);
die();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$a = $_POST['A'];
	print_r($a);
	$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
	if ($conn->query($sql) === TRUE) {
	    header('Location: index.php');
	} else {
	    echo "Error: $sql <br> {$conn->error}";
	}
}
$sql = "SELECT id,name from tacgias";
$result = $conn->query($sql);
?>
<form action="them.php" method="POST">
	Username: <input type="text" name="username"><br>
	Password: <input type="password" name="password"><br>
	<select name="tacgia" multiple>
		<?php while($row = $result->fetch_assoc()): ?>
			<option value="<?php echo$row['id'] ?>"><?php echo $row['name']; ?></option>
		<?php endwhile ?>
	</select>
	<button type="submit">Thêm</button>
</form>