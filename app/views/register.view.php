<?php 

killSession();

require 'layout/header.php'; ?>

<div class="register">
	<div class="container">
		<h2>Create Account</h2>
		<form id="register" action="/register" method="POST">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label>First Name</label>
					<input type="text" class="form-control" name="first_name" required
					value ="<?= isset($formData['first_name']) ? htmlspecialchars($formData['first_name']) : '' ?>">
				</div>
				<div class="form-group col-md-6">
					<label>Second Name</label>
					<input type="text" class="form-control" name="second_name" required
					value ="<?= isset($formData['second_name']) ? htmlspecialchars($formData['second_name']) : '' ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label>Email</label>
					<input type="email" class="form-control"  name="email" required
					value ="<?= isset($formData['email']) ? htmlspecialchars($formData['email']) : '' ?>">
				</div>
				<div class="form-group col-md-6">
					<label>Phone Number</label>
					<small>(11 digits at minimum)</small>
					<input type="text" class="form-control" name="phone_number" required
					value ="<?= isset($formData['phone_number']) ? htmlspecialchars($formData['phone_number']) : '' ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					<label>Password</label>
					<small>(minimum 8 characters, one small letter, one capital letter, one number)</small>
					<input type="password" class="form-control" name="password" required
					value ="<?= isset($formData['password']) ? htmlspecialchars($formData['password']) : '' ?>">
				</div>
				<div class="form-group col-md-4">
					<label>Street Number</label>
					<input type="number" min="0" class="form-control" name="street_number" required
					value ="<?= isset($formData['street_number']) ? htmlspecialchars($formData['street_number']) : '' ?>">
				</div>
				<div class="form-group col-md-8">
					<label>Street Name</label>
					<input type="text" class="form-control" name="street_name" required
					value ="<?= isset($formData['street_name']) ? htmlspecialchars($formData['street_name']) : '' ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label>Area</label>
					<input type="text" class="form-control" name="area" required
					value ="<?= isset($formData['area']) ? htmlspecialchars($formData['area']) : '' ?>">
				</div>
				<div class="form-group col-md-6">
					<label>City</label>
					<input type="text" class="form-control" name="city" required
					value ="<?= isset($formData['city']) ? htmlspecialchars($formData['city']) : '' ?>">
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Register</button>
		</form>

		<?php require 'layout/messages/errorMessage.php' ?>

	</div>
</div>

<?php require 'layout/footer.php'; ?>