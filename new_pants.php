<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html> <!--<![endif]-->
	<head>
		<?php include("javascriptcss.php");?>
	</head>
	<body>
		<?php include("nav.php");?>
		<div class="wrapper01">
			<div class="container ">
				<div class="row right well welll heightdiv">
					<form role="form" id="mainform" action="controller/new_pants_handler.php" method="post">
						<div class="middletext"><label>Create Listing</label></div>
						<div class="col-md-12 right">
							<label for="headline">Headline</label>
							<input type="headline" class="form-control" name="headline" id="headline" placeholder="Enter Headline">
						</div>	
						<input type="hidden"  class="form-control" name="userid" id="userid" value="<?php  echo $_SESSION['id']; ?>">
						<div class="col-md-12 right">
							<label for="description">Description</label>
							<input type="description" class="form-control" name="description" id="description" placeholder="Enter Description">

						</div>
						<div class="col-md-6 right">
							<label for="price">Price</label>
							<input type="price" class="form-control" name="price" id="price" placeholder="Enter Price">
						</div>
						<div class="col-md-6 right">
							<label for=""></label>
							<input type="" class="form-control" name="" id="" placeholder="">
						</div>
						<div class="form-group">					
							<input type="hidden"  class="form-control" name="image01" id="image01" placeholder="Upload Image 1">
						</div>
						<div class="form-group">
							<input type="hidden"  class="form-control" name="image02" id="image02" placeholder="Upload Image 2">
						</div>
						<div class="form-group">					
							<input type="hidden"  class="form-control" name="image03" id="image03" placeholder="Upload Image 3">
						</div>
						<div class="form-group">
							<input type="hidden"  class="form-control" name="image04" id="image04" placeholder="Upload Image 3">
						</div>
					</form>					
				<div class="col-md-12">
					<label for="image01">Upload Image 1</label>
					<input type="hidden"  class="form-control" name="image01" id="image01" placeholder="Upload Image 1">
					<form role="form" action="controller/server/php/" method="post" enctype='multipart/form-data'>
						<span class="btn btn-success fileinput-button">
						<i class="glyphicon glyphicon-plus"></i>
						<span>Select files...</span>
						<!-- The file input field used as target for the file upload widget -->
						<input id="fileupload1" type="file" name="files[]" multiple>
						<div id="progress1" class="progress">
							<div class="progress-bar progress-bar-success"></div>
						</div>
						</span>
					</form>
				</div>
				<div class="col-md-12">
					<label for="image02">Upload Image 2</label>
					<input type="hidden"  class="form-control" name="image02" id="image02" placeholder="Upload Image 2">
					<form role="form" action="controller/server/php/" method="post" enctype='multipart/form-data'>
						<span class="btn btn-success fileinput-button">
						<i class="glyphicon glyphicon-plus"></i>
						<span>Select files...</span>
						<!-- The file input field used as target for the file upload widget -->
						<input id="fileupload2" type="file" name="files[]" multiple>
						<div id="progress2" class="progress">
							<div class="progress-bar progress-bar-success"></div>
						</div>
						</span>
					</form>
				</div>
				<div class="col-md-12">
					<label for="image03">Upload Image 3</label>
					<input type="hidden"  class="form-control" name="image03" id="image03" placeholder="Upload Image 3">
					<form role="form" action="controller/server/php/" method="post" enctype='multipart/form-data'>
						<span class="btn btn-success fileinput-button">
						<i class="glyphicon glyphicon-plus"></i>
						<span>Select files...</span>
						<!-- The file input field used as target for the file upload widget -->
						<input id="fileupload3" type="file" name="files[]" multiple>
						<div id="progress3" class="progress">
							<div class="progress-bar progress-bar-success"></div>
						</div>
						</span>
					</form>
				</div>
				<div class="col-md-12">
					<label for="image04">Upload Image 4</label>
					<input type="hidden"  class="form-control" name="image04" id="image04" placeholder="Upload Image 4">
					<form role="form" action="controller/server/php/" method="post" enctype='multipart/form-data'>
						<span class="btn btn-success fileinput-button">
						<i class="glyphicon glyphicon-plus"></i>
						<span>Select files...</span>
						<!-- The file input field used as target for the file upload widget -->
						<input id="fileupload4" type="file" name="files[]" multiple>
						<div id="progress4" class="progress">
							<div class="progress-bar progress-bar-success"></div>
						</div>
						</span>
					</form>
			 	</div>
				<div class="col-md-12 bottomm right">
					<div><button type="submit" form="mainform" class="btn btn-success center">Submit</button></div>
				</div>					
			</div>			
		</div>			
	</body>
</html>