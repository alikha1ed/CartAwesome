<?php 

require 'app/views/layout/header.php';
$index = 1;

?>

<div class="register">
	<div class="container">
    <h2>Admin Dashboard</h2>
    
		<form id="register" action="/profile/admin" method="POST">
			<div class="form-row">
				<div class="form-group col-md-12">
					<hr>
                    <br><h3>Add Category</h3><br>
					<label>Category Name</label>
					<input type="text" class="form-control" name="name" required
					value ="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
                    <br>
        			<button type="submit" class="btn btn-primary">Add</button>            
				</div>
		</form>

		<?php require 'app/views/layout/messages/errorMessage.php' ?>
		<?php require 'app/views/layout/messages/successMessage.php' ?>

	</div>
</div>

<div class="container">
	<hr>
	<br><h3>Categories</h3><br>
	<table class="table">
	<thead>
		<tr>
		<th scope="col">#</th>
		<th scope="col">Name</th>
		<th scope="col">Edit</th>
		<th scope="col">Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data as $category) : ?>
		<tr>
			<th scope="row"><?= $index++; ?></th>
			<td><?= $category->name; ?></td>
			<td><form action="edit/category" method="post">
				<button type="submit" class="btn btn-success">Edit</button>
			</form></td>
			<td><form action="delete/category" method="post">
				<button type="submit" class="btn btn-danger">Delete</button>
			</form></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	</table>
</div>
<br><br>

<?php require 'app/views/layout/footer.php'; ?>