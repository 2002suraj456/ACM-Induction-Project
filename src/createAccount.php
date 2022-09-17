<?php include dirname(__DIR__) . '/src/inc/header.php' ?>

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

<div class="text-center pt-5">
	<div class="main-signin-form">

		<div class="form-signin">
			<form action="createAccountnew.php" method="post">
				<div class="head-text m-4">
					Enter your details
				</div>
				<div class="form-floating mb-3">
					<input name="userId" type="email" class="form-control" id="emailAddress" placeholder="name@example.com">
					<label for="emailAddress">Email Address</label>

				</div>
				<div class="form-floating mb-3">
					<input name="userPassword" type="password" class="form-control" id="password" placeholder="Password">
					<label for="password">Password</label>

				</div>
				<button class="btn btn-primary w-100">Register</button>

			</form>
		</div>
	</div>
</div>
</form>