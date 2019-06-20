<?php 

killSession();

require 'layout/header.php'; ?>

<div class="register">
	<div class="container">
		<h2>Create Account</h2>
		<form id="register" action="/add/user" method="POST">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label>First Name</label>
					<input type="text" class="form-control" name="first_name" required
					value ="<?= isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name']) : '' ?>">
				</div>
				<div class="form-group col-md-6">
					<label>Second Name</label>
					<input type="text" class="form-control" name="second_name" required
					value ="<?= isset($_POST['second_name']) ? htmlspecialchars($_POST['second_name']) : '' ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label>Email</label>
					<input type="email" class="form-control"  name="email" required
					value ="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
				</div>
				<div class="form-group col-md-6">
					<label>Phone Number</label>
					<small>(11 digits at minimum)</small>
					<input type="text" class="form-control" name="phone_number" required
					value ="<?= isset($_POST['phone_number']) ? htmlspecialchars($_POST['phone_number']) : '' ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					<label>Password</label>
					<small>(minimum 8 characters, one small letter, one capital letter, one number)</small>
					<input type="password" class="form-control" name="password" required
					value ="<?= isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '' ?>">
				</div>
				<div class="form-group col-md-4">
					<label>Street Number</label>
					<input type="number" class="form-control" name="street_number" required
					value ="<?= isset($_POST['street_number']) ? htmlspecialchars($_POST['street_number']) : '' ?>">
				</div>
				<div class="form-group col-md-8">
					<label>Street Name</label>
					<input type="text" class="form-control" name="street_name" required
					value ="<?= isset($_POST['street_name']) ? htmlspecialchars($_POST['street_name']) : '' ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label>Area</label>
					<input type="text" class="form-control" name="area" required
					value ="<?= isset($_POST['area']) ? htmlspecialchars($_POST['area']) : '' ?>">
				</div>
				<div class="form-group col-md-6">
					<label>City</label>
					<input type="text" class="form-control" name="city" required
					value ="<?= isset($_POST['city']) ? htmlspecialchars($_POST['city']) : '' ?>">
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Register</button>
		</form>

		<?php require 'layout/messages/errorMessage.php' ?>

	</div>
</div>

<?php require 'layout/footer.php'; ?>