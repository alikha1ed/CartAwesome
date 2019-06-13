<?php require 'layout/header.php'; ?>

<div class="register">
	<div class="container">
	<h2>Register Here</h2>
	<div class="login-form-grids">
		<form action ="/register" method ="POST">

			<label>First Name</label>
			<input type="text" name="first_name"
			value ="<?= isset($form_data['first_name']) ? htmlspecialchars($form_data['first_name']) : '' ?>">

			<label>Second Name</label>		
			<input type="text" name="second_name"
			value ="<?= isset($form_data['second_name']) ? htmlspecialchars($form_data['second_name']) : '' ?>">

			<label>E-Mail</label>	
			<input type="email" name="email"
			value ="<?= isset($form_data['email']) ? htmlspecialchars($form_data['email']) : '' ?>">

			<label>Phone Number</label>
			<small>(11 digits at minimum)</small>
			<input type="text" name="phone_number"
			value ="<?= isset($form_data['phone_number']) ? htmlspecialchars($form_data['phone_number']) : '' ?>">

			<label>Password</label><br>
			<small>(minimum 8 characters, one small letter, one capital letter, one number)</small>
			<input type="password" name="password">
			<h3 id="address">Address</h3>

			<label>Street Number</label>
			<input type="text" name="street_number"
			value ="<?= isset($form_data['street_number']) ? htmlspecialchars($form_data['street_number']) : '' ?>">

			<label>Street Name</label>
			<input type="text" name="street_name"
			value ="<?= isset($form_data['street_name']) ? htmlspecialchars($form_data['street_name']) : '' ?>">

			<label>Area</label>
			<input type="text" name="area"
			value ="<?= isset($form_data['area']) ? htmlspecialchars($form_data['area']) : '' ?>">
			
			<label>City</label>
			<input type="text" name="city"
			value ="<?= isset($form_data['city']) ? htmlspecialchars($form_data['city']) : '' ?>">

			<input type="submit" value="Register">
			<br>
		</form>	
		
		<?php require 'layout/message.php' ?>

	</div>
	</div>
</div>

<?php require 'layout/footer.php'; ?>