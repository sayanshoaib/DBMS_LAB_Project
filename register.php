<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page Description">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	

</head>
<body>


<div>
	
	<form action="registeruser.php" method="POST">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
				<h1>Registration</h1>
				<p>Fill up the form with correct values.</p>
				<hr class="mb-3">
				<label for="firstname"><b>First Name</b></label>
				<input class="form-control"  id="firstname" type="text" name="firstname" required>
				
				<label for="lastname"><b>Last Name</b></label>
				<input class="form-control" id="lastname" type="text" name="lastname" required>
				
				<label for="myemail"><b>Email</b></label>
				<input class="form-control" type="Email" id="myemail" name="myemail" placeholder="xyz@gmail.com" required> 
			
				<label for="phonenumber"><b>Phone Number</b></label>
				<input class="form-control" id="phonenumber" type="text" name="phonenumber" required>
				
				<label for="mypass"><b>Password<b></label>:
				<input class="form-control" type="password" id="mypass" name="mypass" required> 
				
				<hr class="mb-3">
				<input class="btn btn-primary" type="submit" value="Click to Register">
				</div>
			</div>

		</div>
	</form>
</div>

	

	

</body>
</html>