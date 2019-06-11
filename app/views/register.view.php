<?php require 'layout/header.php'; ?>

	<div class="register">
	<div class="container">
		<h2>Register Here</h2>
		<div class="login-form-grids">
			<?php if (isset($form_data)): ?>
				<form action ="/validate" method ="POST">

					<input type="text" name="first_name" placeholder="First Name" 
					value=" <?= htmlspecialchars($form_data['first_name']); ?> ">

					<input type="text" name="second_name" placeholder="Last Name"
					value="<?= htmlspecialchars($form_data['second_name']); ?>">
				
					<input type="email" name="email" placeholder="Email Address"
					value=" <?= htmlspecialchars($form_data['email']); ?> ">
					<br>

					<input type="text" name="phone_number" placeholder="Phone Number"
					value=" <?= htmlspecialchars($form_data['phone_number']); ?> ">

					<input type="password" name="password" placeholder="Password">

					<br>
					<h3>Address</h3>
					<br>

					<input type="text" name="street_number" placeholder="Street Number"
					value=" <?= htmlspecialchars($form_data['street_number']); ?> ">
					<br>

					<input type="text" name="street_name" placeholder="Street Name"
					value=" <?= htmlspecialchars($form_data['street_name']); ?>" >
					<br>

					<input type="text" name="city" placeholder="City"
					value=" <?= htmlspecialchars($form_data['city']); ?> ">
					<br>

					<input type="text" name="state" placeholder="State"
					value=" <?= htmlspecialchars($form_data['state']); ?> ">

					<input type="submit" value="Register">
					<br>
				</form>	
			<?php else: ?>
				<?php require 'layout/registration_form.php'; ?>
			<?php endif; ?>
			<?php if (isset($error)): ?>
				<h3 class="text-danger" style="text-align: center;"><?= $error ?></h3>
			<?php endif; ?>	
			</div>
		</div>
	</div>

<?php require 'layout/footer.php'; ?>