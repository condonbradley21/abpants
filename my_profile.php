<?php
session_start();
$id = $_SESSION['id'];
include('common/common.php');

$query = "
    SELECT *
    FROM a_and_b_pants_database
    WHERE `id` = :id
";

$query_params = array(
    ":id" => $id
);

try 
{ 
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
} 
catch(PDOException $ex)
{die("Failed to run query: " . $ex->getMessage());}
$row = $stmt->fetch();

?>
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
 		  	<div class="container">
 			    <div class="row right well welll">
 				    <form role="form" action="controller/personal_information_handler.php" method="post">
                        <div class="middletext"><label>My Profile</label></div>
                        <div class="col-md-6 right">
     						<label for="zipcode">Zip Code </label>
                			<input type="zip" class="form-control" name="zip_code" id="zip_code" value="<?php echo $row['zip_code']; ?>" disabled>
                        </div>
							<div class="col-md-6 right">
	 						<label for="city">City</label>
	            			<input type="city" class="form-control" name="city" id="city" value="<?php echo $row['city']; ?>" disabled>
						</div>
 						<div class="col-md-6 right">
                    		<label for="state">State</label>
	                    	<input type="state" class="form-control" name="state" id="state" value=" <?php echo $row['state']; ?>" disabled>
 						</div>
 						<div class="col-md-6 right">
 							<label class="control-label">Gender</label>
	 					    <input type="gender" class="form-control" name="gender" id="gender" value="<?php echo $row['gender']; ?>" disabled>
 						</div>
 						<div class="col-md-6 right">
                    		<label class="control-label">Body Type</label>
	                        <input type="body_type" class="form-control" name="body_type" id="body_type" value="<?php echo $row['body_type']; ?>" disabled>
 						</div>
 						<div class="col-md-6 right">
	                   		<label class="control-label">Age</label>
	                        <input type="age" class="form-control" name="age" id="age" value="<?php echo $row['age']; ?>" disabled>
 						</div>
 						<div class="col-md-12 right">
 							<div><button type="submit" class="btn btn-success center">Submit</button></div>
                    		<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>"/>
            			</div>
            			<div class="form-group">
            				<input type="hidden"  class="form-control" name="profile_pic" id="image01" placeholder="Upload Profile Picture">
            			</div>
					</form>

        			
        			<div class="col-md-12">
           				<label for="profile_pic">Profile Picture</label>
        				<input type="hidden"  class="form-control" name="profile_pic" id="image01" placeholder="Profile Picture">
        				<form role="form" action="controller/server/php/" method="post" enctype='multipart/form-data'>
            				<span class="btn btn-success fileinput-button">
                			<i class="glyphicon glyphicon-plus"></i>
                			<span>Select files...</span>
                			<!-- The file input field used as target for the file upload widget -->
                			<input id="fileupload1" type="file" name="files[]" multiple>
                			<div id="progress1" class="progress">
                    			<div class="progress-bar progress-bar-success"></div>
                			</div>		
            			</form>
       				</div>
 				</div>
 			</div>
 		</div>
	</body>	
</html>

