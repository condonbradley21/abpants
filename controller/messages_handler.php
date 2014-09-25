<?php 

	session_start();
	include('../common/common.php');
	$message = $_POST['message'];
	$to_user = $_POST['to_user'];
	$from_user = $_POST['from_user'];

	$query = "
		INSERT INTO user_messages
		SET message = :message, to_user = :to_user, from_user = :from_user
	";
	$query_params = array(
		":message" => $message,
		":to_user" => $to_user,
		":from_user" => $from_user     
	);

	try 
	{ 
		$stmt = $db->prepare($query);
		$result = $stmt->execute($query_params);
	} 
	catch(PDOException $ex)
	{
		die("Failed to run query: " . $ex->getMessage());
	}
?>