<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
	<body>
	<h3>Warehouse Management CRUD Application - UNIWA Database II lab</h3>
	<form id="updateFrom" action="create.php" method="POST">
		<table border="1" cellpadding="10">
			<tr align='center'>
				<td>Name</th>
				<td><input name="name" type="text" value=""/></td>
			</tr>
			<tr align='center'>
				<td>Quantity</th>
				<td><input name="quantity" type="text" value=""/></td>
			</tr>
				<tr align='center'>
				<td>price</th>
				<td><input name="price" type="text" value=""/></td>
			</tr>
		</table>
		 <h3>Choose Category</h3> 
		<select name="category">
		<?php
			   include 'database.php';
			   $pdo = Database::connect();
			   $sql = 'SELECT * FROM product_category ORDER BY category_name ASC';
			   foreach ($pdo->query($sql) as $row) {
						echo '<option value="'. $row['category_id'].'">'.$row['category_name'].'</option>'  ;
			   }
			   Database::disconnect();
			  ?>
			</select>
			<br>
		<button type="submit">create</button>
		</form>
	</body>
</html>