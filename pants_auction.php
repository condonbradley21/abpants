<?php
include('common/common.php');

$query = " 
	SELECT *
	FROM pants_table

";

try 
{ 
	$stmt = $db->prepare($query);
	$result = $stmt->execute($query_params);
} 
	catch(PDOException $ex)
	{die("Failed to run query: " . $ex->getMessage());}
$row = $stmt->fetchall(); 

foreach ($row as $item){
$items .= '
	<div class="row rowsize">
		<div class="col-md-3 ccontainer"><img src="http://162.243.143.150/abpants/controller/server/php/files/thumbnail/'.$item['image01'].'" /></div>
		<div class="headline col-md-8">
			<span class="fontbold"><a href="http://162.243.143.150/abpants/view_profile.php?id='.$item['id'].'">Headline</a></span><br>
			<span>'.$item['headline'].'</span>
		</div>
		<div class="description col-md-8"><br>
			<span class="fontbold">Description</span><br>
			<span>'.$item['description'].'</span>
		</div>
		<div class="col-md-2"><br>
			<br>
			<br>
			<span class="fontbold">Price:</span><span>'.$item['price'].'<span>
		</div>
	</div>';
}
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
		<div class="container-fluid rowness ">
		<?php echo $items; ?>
		</div>    
	</body>
</html>
