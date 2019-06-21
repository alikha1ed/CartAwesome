<?php require 'app/views/layout/header.php'; ?>

<div class="register">
	<div class="container">
    <h2>Admin Dashboard</h2>
    
		<form id="register" action="/add/category" method="POST">
			<div class="form-row">
				<div class="form-group col-md-12">
					<hr>
                    <br><h3>Add Category</h3><br>
					<label>Category Name</label>
					<input type="text" class="form-control" name="name"                     value ="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
                    <br>
        			<button type="submit" class="btn btn-primary">Add</button>            
				</div>
		</form>

		<?php require 'app/views/layout/messages/errorMessage.php' ?>
		<?php require 'app/views/layout/messages/successMessage.php' ?>

	</div>
<hr>

</div>
<?php require 'app/views/layout/footer.php'; ?>