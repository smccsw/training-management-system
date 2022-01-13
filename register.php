<?php
require_once "connection.php";

session_start();

if(isset($_SESSION['user'])){
	header("location: welcome.php");
}

if(isset($_REQUEST['register_btn'])){

	echo "<pre>";
		print_r($_REQUEST);
	echo "</pre>";

	//  Possible date check function - to be tested
	//  function validateDate($date, $format = 'd-m-Y') {
	// 	$d = DateTime::createFromFormat($format, $date);
	// 	return $d && $d->format($format) === $date;
	// }



	$first_name = filter_var($_REQUEST['first_name'],FILTER_SANITIZE_STRING);
	$middle_name = filter_var($_REQUEST['middle_name'],FILTER_SANITIZE_STRING);
	$surname = filter_var($_REQUEST['surname'],FILTER_SANITIZE_STRING);
	$dob = $_REQUEST['dob']; //regex required
	$nino = $_REQUEST['nino']; //regex required
	$email = filter_var($_REQUEST['email'],FILTER_SANITIZE_EMAIL);
	$password = strip_tags($_REQUEST['password']);
	



	if(empty($first_name)) {
		$errorMsg[0][] = 'First Name required';
	}

	if(empty($surname)) {
		$errorMsg[1][] = 'Surname required';
	}

	if(empty($dob)) {
		$errorMsg[2][] = 'Date of Birth required';
	}

	if(empty($nino)) {
		$errorMsg[3][] = 'National Insurance Number required';
	}

	if(empty($email)) {
		$errorMsg[4][] = 'Email address required';
	}

	if(empty($password)) {
		$errorMsg[5][] = 'Password required';
	}

	//more checks required - a-z, A-Z, 0-9 etc.

	if(strlen($password) < 8)  {
		$errorMsg[5][] = 'Must be at least 8 characters and contain uppercase, lowercase, number and special characters';
	}
}


?>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<title>Register</title>
</head>

<body>
	<div class="container">
		
		<form action="register.php" method="post">
			<div class="mb-3">
				<label for="first_name" class="form-label">First Name</label>
				<input type="text" name="first_name" class="form-control" placeholder="Jane">
				
				<?php
					if(isset($errorMsg[0])) {
						foreach($errorMsg[0] as $firstNameErrors) {
							echo "<p class='small text-danger'>".$firstNameErrors."</p>";
						}
					}
				?>

			</div>
			<div class="mb-3">
				<label for="middle_name" class="form-label">Middle Name</label>
				<input type="text" name="middle_name" class="form-control" placeholder="Mildred">
			</div>
			<div class="mb-3">
				<label for="surname" class="form-label">Surname</label>
				<input type="text" name="surname" class="form-control" placeholder="Doe">
								
				<?php
					if(isset($errorMsg[1])) {
						foreach($errorMsg[1] as $surnameErrors) {
							echo "<p class='small text-danger'>".$surnameErrors."</p>";
						}
					}
				?>

			</div>
			<div class="mb-3">
				<label for="dob" class="form-label">Date of Birth</label>
				<input type="date" name="dob" class="form-control" placeholder="dd/mm/yyyy">
				
				<?php
					if(isset($errorMsg[2])) {
						foreach($errorMsg[2] as $dobErrors) {
							echo "<p class='small text-danger'>".$dobErrors."</p>";
						}
					}
				?>

			</div>
			<div class="mb-3">
				<label for="nino" class="form-label">National Insurance Number</label>
				<input type="text" name="nino" class="form-control" placeholder="eg. AA112233B">
				
				<?php
					if(isset($errorMsg[3])) {
						foreach($errorMsg[3] as $ninoErrors) {
							echo "<p class='small text-danger'>".$ninoErrors."</p>";
						}
					}
				?>

			</div>
			<div class="mb-3">
				<label for="email" class="form-label">Email address</label>
				<input type="email" name="email" class="form-control" placeholder="jane@doe.com">

				<?php
					if(isset($errorMsg[4])) {
						foreach($errorMsg[4] as $emailErrors) {
							echo "<p class='small text-danger'>".$emailErrors."</p>";
						}
					}
				?>

			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Password</label>
				<input type="password" name="password" class="form-control" placeholder="">
				
				<?php
					if(isset($errorMsg[5])) {
						foreach($errorMsg[5] as $passwordErrors) {
							echo "<p class='small text-danger'>".$passwordErrors."</p>";
						}
					}
				?>

			</div>
			<button type="submit" name="register_btn" class="btn btn-primary">Register Account</button>
		</form>
		Already Have an Account? <a class="register" href="index.php">Login Instead</a>
	</div>
</body>
</html>


<!--37:45-->