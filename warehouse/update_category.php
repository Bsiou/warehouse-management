<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
	<body>
	<h3>Warehouse Management CRUD Application - UNIWA Database II lab</h3>
	<?php
		include 'database.php';
		$category_id = $_POST['categoryId'];
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM product_category where category_id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($category_id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$category_name = $data['category_name'];
		Database::disconnect();
	  ?>
		<form id="updateFrom" action="update2_category.php" method="POST">
		<table border="1" cellpadding="10">
			<tr align='center'>
				<td>Name</th>
				<td><input name="category_name" type="text" value="<?php echo $category_name;?>"/></td>
			</tr>
		</table>
		<input type="hidden" id="categoryId" name="categoryId" value="<?php echo $category_id;?>"/>
		<button type="submit">update</button>
		</form>

	</body>
</html>