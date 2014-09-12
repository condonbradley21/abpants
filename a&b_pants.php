<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Twitter Bootstrap Basic Tab Based Navigation Example">  
		<link href="css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.js" type="text/javascript"></script>
		<script src="js/main.js" type="text/javascript"></script>
	</head>

	<body>
		<?php include("nav.php");?>
		<div class="well center">
			<form role="form" action="controller/front_page_handler.php" method="post">
				<div class="form-group">
					<label for="email">Email address</label>
					<input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="name">First Name</label>
					<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
				</div>
				<div class="form-group">
					<label for="name">Last name</label>
					<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="Enter passwword">               
				</div>
				<button type="submit" class="btn btn-success center">Submit</button>
			</form>
		</div>
	</body>
</html>