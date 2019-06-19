<?php require 'layout/header.php'; ?>

<div class="login">
	<div class="container">
		<h2>Login</h2>
		<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
			<form action="/login" method="POST">
				<label>Email Address</label>
				<input type="email" name="email" required
				value ="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
				
				<label>Password</label>
				<input type="password" name="password" required
				value ="<?= isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '' ?>">

				<input type="submit" value="Login">
			</form>
			<br>
			<p>New Account?<a href="/register">Register Here</a></p>
		</div>

		<?php require 'layout/messages/errorMessage.php' ?>
		<?php require 'layout/messages/successMessage.php' ?>
		
	</div>
</div>

<?php require 'layout/footer.php'; ?>