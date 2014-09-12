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
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css.map" rel="stylesheet">
		<link href="css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap.css.map" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.js" type="text/javascript"></script>
		<script src="js/main.js" type="text/javascript"></script>
	</head>
	<body>
	<?php include("nav.php");?>
		<div class="modal center" id="password_modal">
			<div class="modal-header">
				<h3>Change Password <span class="extra-title muted"></span></h3>
			</div>
			<div class="modal-body form-horizontal">
				<form role="form" action="controller/edit_password_handler.php" method="post">
					<?php echo $_SESSION['id']; ?>
					<div class="control-group">
						<label for="current_password" class="control-label">Current Password</label>
						<div class="controls">
							<input type="password" name="current_password">
						</div>
					</div>
					<div class="control-group">
						<label for="new_password" class="control-label">New Password</label>
						<div class="controls">
							<input type="password" name="new_password">
						</div>
					</div>
					<div class="control-group">
						<label for="confirm_password" class="control-label">Confirm Password</label>
						<div class="controls">
							<input type="password" name="confirm_password">
						</div>
					</div>
						<input type="hidden" name="userid" value="<?php echo $_SESSION['id']; ?>"/>
					<div class="modal-footer">
						<button href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						<button href="#" class="btn btn-primary" id="password_modal_save">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</body>    
</html>