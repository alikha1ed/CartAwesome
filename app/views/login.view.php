<?php require 'layout/header.php'; ?>

<div class="login">
	<div class="container">
		<h2>Login</h2>
		<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
			<form action="/login" method="POST">
				<label>Email Address</label>
				<input type="email" name="email" required
				value ="<?= isset($data['email']) ? htmlspecialchars($data['email']) : '' ?>">
				
				<label>Password</label>
				<input type="password" name="password" required>

				<input type="submit" value="Login">
			</form>
			<br>
			<p>New Account?<a href="/register">Register Here</a></p>
		</div>

		<?php require 'layout/errorMessage.php' ?>
		
	</div>
</div>

<?php require 'layout/footer.php'; ?>