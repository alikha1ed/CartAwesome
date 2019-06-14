<?php require 'layout/header.php'; ?>

<div class="login">
	<div class="container">
		<h2>Login Form</h2>
		<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
			<form>
				<input type="email" placeholder="Email Address" required=" " >
				<input type="password" placeholder="Password" required=" " >
				<input type="submit" value="Login">
			</form>
			<br>
			<p>New Account?<a href="/register">Register Here</a></p>
		</div>

		<?php require 'layout/message.php' ?>
		
	</div>
</div>

<?php require 'layout/footer.php'; ?>