<?php
	include('common/common.php');

	$pantsid = $_GET['id'];

	$query = " 
		SELECT *
		FROM pants_table
		WHERE id = :id
	";

	$query_params = array(
		":id" => $pantsid
	);

	try 
	{ 
		$stmt = $db->prepare($query);
		$result = $stmt->execute($query_params);
	} 
	catch(PDOException $ex)
	{die("Failed to run query: " . $ex->getMessage());}

	$row = $stmt->fetch(); 


	$items = '
		<div class="row">   
			<div class="col-md-12 middletext fontbold"><span>'.$row['headline'].'</span></div>   
		</div>    
		<div class="row">
			<div class="col-md-12 ">__________________________________________________________________________________________________________________________</div>
		</div>
		<div class="row">
			<div class="col-md-2 ccontainer"><img onclick="swap(\''.$row['image01'].'\');" src="http://162.243.143.150/abpants/controller/server/php/files/thumbnail/'.$row['image01'].'"/></img></div>
			<div class="col-md-2 ccontainer"><img onclick="swap(\''.$row['image02'].'\');" src="http://162.243.143.150/abpants/controller/server/php/files/thumbnail/'.$row['image02'].'"/></img></div>
			<div class="col-md-2 ccontainer"><img onclick="swap(\''.$row['image03'].'\');" src="http://162.243.143.150/abpants/controller/server/php/files/thumbnail/'.$row['image03'].'"/></img></div>
			<div class="col-md-2 ccontainer"><img onclick="swap(\''.$row['image04'].'\');" src="http://162.243.143.150/abpants/controller/server/php/files/thumbnail/'.$row['image04'].'"/></img></div>
			<div class="row">
				<div class="col-md-12 imgpice"><img id="bigimage" src="http://162.243.143.150/abpants/controller/server/php/files/'.$row['image01'].'"></img></div>
			</div><br>
		</div><br>
	';
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
	<body class"body">
	<?php include("nav.php");?>
		<div class="container-fluid rowness">
			<?php echo $items; ?>
			<div class="row">
				<div class="col-md-12 middletext">
					<label for="message">Message</label>
					<input type="message" class="extraheight" name="message" id="message" placeholder="Enter Message">
					<div><button type="submit" form="mainform" class="btn btn-success buttoncenter">Send Message</button></div>
				</div> 
			</div> 
		</div>   
	</body>
</html>
