<?php require 'layout/header.php'; ?>

<div class="register">
	<div class="container">
	<h2>Create Account</h2>

		<form id="register" action="/register" method="POST">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label>First Name</label>
					<input type="text" class="form-control" name="first_name"
					value ="<?= isset($form_data['first_name']) ? htmlspecialchars($form_data['first_name']) : '' ?>">
				</div>
				<div class="form-group col-md-6">
					<label>Second Name</label>
					<input type="text" class="form-control" name="second_name"
					value ="<?= isset($form_data['second_name']) ? htmlspecialchars($form_data['second_name']) : '' ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label>Email</label>
					<input type="email" class="form-control"  name="email"
					value ="<?= isset($form_data['email']) ? htmlspecialchars($form_data['email']) : '' ?>">
				</div>
				<div class="form-group col-md-6">
					<label>Phone Number</label>
					<small>(11 digits at minimum)</small>
					<input type="text" class="form-control" name="phone_number"
					value ="<?= isset($form_data['phone_number']) ? htmlspecialchars($form_data['phone_number']) : '' ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					<label>Password</label>
					<small>(minimum 8 characters, one small letter, one capital letter, one number)</small>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="form-group col-md-4">
					<label>Street Number</label>
					<input type="number" class="form-control" name="street_number"
					value ="<?= isset($form_data['street_number']) ? htmlspecialchars($form_data['street_number']) : '' ?>">
				</div>
				<div class="form-group col-md-8">
					<label>Street Name</label>
					<input type="text" class="form-control" name="street_name"
					value ="<?= isset($form_data['street_name']) ? htmlspecialchars($form_data['street_name']) : '' ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label>Area</label>
					<input type="text" class="form-control" name="area"
					value ="<?= isset($form_data['area']) ? htmlspecialchars($form_data['area']) : '' ?>">
				</div>
				<div class="form-group col-md-6">
					<label>City</label>
					<input type="text" class="form-control" name="city"
					value ="<?= isset($form_data['city']) ? htmlspecialchars($form_data['city']) : '' ?>">
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Register</button>
		</form>

		<?php require 'layout/errorMessage.php' ?>

	</div>
</div>

<?php require 'layout/footer.php'; ?>