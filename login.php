<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page Description">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

	<div class="container h-100">
	<div class="d-flex justify-content-center h-100">
		<div class="user_card">
			<div class="d-flex justify-content-center">
				<div class="brand_logo_container">
					<img src="img/logo.png" class="brand_logo" alt="Share Note">
				</div>
			</div>
			<div class="d-flex justify-content-center form_container">
				<form action="loginprocess.php" method="POST">
					<div class="input-group mb-3">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" name="myemail" id="myemail" class="form-control input_user" placeholder="abc@gmail.com" required>
					</div>
					<div class="input-group mb-2">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="mypass" id="mypass" class="form-control input_pass"
						placeholder="Password...." required>
					</div>
					<div class="form-group">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" name="rememberme" class="custom-control-input" id="customControlInline">
							<label class="custom-control-label" for="customControlInline">Remember me</label>
						</div>
					</div>

				</div>
				<div class="d-flex justify-content-center mt-3 login_container">
					<button type="submit" name="button" id="login" class="btn login_btn">Login</button>
				</div>
				</form>
			
			
				<div class="mt-4">
					<div class="d d-flex justify-content-center links">
						Don't have an account? <a href="LabDbmsPeoject/register.php" class="ml-2">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center">
						<a href="#">Forgot your password?</a>
					</div>
				</div>
		</div>
	</div>
</div>

</body>
</html>