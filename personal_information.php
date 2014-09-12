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
	<?php include("nav.php"); ?>
		<form role="form" action="controller/personal_information_handler.php" method="post">
			<div class="list-group cccenter sidebarr">
				<input type="state" class="form-control" name="state" id="state" value="<?php echo $row['state']; ?>">
				<input type="city" class="form-control" name="city" id="city" value="<?php echo $row['city']; ?>">
				<input type="zip" class="form-control" name="zip_code" id="zip_code" value="<?php echo $row['zip_code']; ?>">
				<input type="gender" class="form-control" name="gender" id="gender" value="<?php echo $row['gender']; ?>">
				<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>"/>
			</div>
			<button type="submit" class="btn btn-success center">Submit</button>
		</form>
	</body>
</html>