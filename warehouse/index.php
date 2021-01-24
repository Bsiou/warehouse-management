<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<script type="text/javascript">
	function deleteProduct(id) {
		document.getElementById("productId").value = id;
		document.forms["viewFrom"].action = "delete.php";
		document.forms["viewFrom"].submit(); 
	}
	function updateProduct(id) {
		document.getElementById("productId").value = id;
		document.forms["viewFrom"].action = "update.php";
		document.forms["viewFrom"].submit(); 
	}
	function viewProduct(id) {
		document.getElementById("productId").value = id;
		document.forms["viewFrom"].action = "view.php";
		document.forms["viewFrom"].submit(); 
	}
	function deleteProductCategory(category_id) {
		document.getElementById("categoryId").value = category_id;
		document.forms["categoryForm"].action = "delete_category.php";
		document.forms["categoryForm"].submit(); 
	}
	function updateProductCategory(category_id) {
		document.getElementById("categoryId").value = category_id;
		document.forms["categoryForm"].action = "update_category.php";
		document.forms["categoryForm"].submit(); 
	}
	function FillPack(id) {
		document.getElementById("productId").value = id;
		document.forms["viewFrom"].action = "fill_pack.php";
		document.forms["viewFrom"].submit(); 
	}
	</script>
</head>
	<body>
	<h3>Warehouse Management CRUD Application - UNIWA Database II lab</h3>
		<table border="1" cellpadding="10">
			<tr align='center'>
				<th>Name</th>
				<th>Quantity</th>
				<th>Action</th>
			</tr>
			<form id="viewFrom" method="POST">
			<input type="hidden" id="productId" name="productId" value=""/>
			  <?php
			   include 'database.php';
			   $pdo = Database::connect();
			   $sql = 'SELECT * FROM product ORDER BY name ASC';
			   foreach ($pdo->query($sql) as $row) {
						echo "<tr align='center'>";
						echo '<td>'. $row['name'] . '</td>';
						echo '<td>'. $row['quantity'] . '</td>';
						echo '<td><button type="button" onclick="viewProduct('.$row['id'].')">view</button><button type="button" onclick="updateProduct('.$row['id'].')">update</button><button type="button" onclick="deleteProduct('.$row['id'].')">delete</button><button type="button" onclick="FillPack('.$row['id'].')">Fill pack</button></td>';
						echo '</tr>';
			   }
			   Database::disconnect();
			  ?>
			  </form>

		</table>
		<form id="createFrom" action="create_choose.php" method="POST">
			<button type="submit">Create</button>
		</form>
		
		<h3>Warehouse Management Product Categories</h3>
		<table border="1" cellpadding="10">
			<tr align='center'>
				<th>Category Name</th>
				<th>Action</th>
			</tr>
			<form id="categoryForm" method="POST">
			<input type="hidden" id="categoryId" name="categoryId" value=""/>
			  <?php
			   $pdo = Database::connect();
			   $sql2 = 'SELECT * FROM product_category ORDER BY category_name ASC';
			   foreach ($pdo->query($sql2) as $row) {
						echo "<tr align='center'>";
						echo '<td>'. $row['category_name'] . '</td>';
						echo '<td><button type="button" onclick="updateProductCategory('.$row['category_id'].')">update</button><button type="button" onclick="deleteProductCategory('.$row['category_id'].')">delete</button></td>';
						echo '</tr>';
			   }
			   Database::disconnect();
			  ?>
			  </form>
			  <form id="createFrom" action="create_cat.html" method="POST">
			<button type="submit">Create category</button>
		</form>
		</table>
	</body>
	</body>
</html>