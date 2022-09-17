<?php 
	include dirname(__DIR__) . '/src/inc/header.php';
	include dirname(__DIR__) . '/src/inc/navbar.php';
?>

<!-- login - form -->

<style>
	.main-sigin-form {
		padding-top: 40px;
	}

	.form-signin {
		width: 100%;
		max-width: 330px;
		margin: auto;
	}
</style>

<body>

<div class="text-center pt-5">
	<div class="main-signin-form">

		<div class="form-signin">
			<!-- pass the control to userSignin.php -->
			<form action="./../src/controller/userSignin.php" method="post">
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="emailAddress" name="userId" placeholder="name@example.com">
					<label for="emailAddress">Email Address</label>

				</div>
				<div class="form-floating mb-3">
					<input type="password" class="form-control" id="password" name="userPassword" placeholder="Password">
					<label for="password">Password</label>

				</div>
				<!-- button type should be submit -->
				<button type="submit" class="btn btn-primary w-100">Log In</button>

				<div class="register mt-3">
					New User ?
					<a href="../src/createAccount.php">Sign Up Here</a>
				</div>
			</form>
		</div>
	</div>
</div>
</form>

</body>