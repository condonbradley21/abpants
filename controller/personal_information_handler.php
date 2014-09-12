<?php 

include('../common/common.php');
$state = $_POST['state'];
$city = $_POST['city'];
$zip_code = $_POST['zip_code'];
$gender = $_POST['gender'];
$body_type = $_POST['body_type'];
$age = $_POST['age'];
$profile_pic = $_POST['profile_pic'];
$id = $_POST['id'];

$query = "
    UPDATE a_and_b_pants_database
    SET state = :state, city = :city, zip_code = :zip_code, gender = :gender, body_type = :body_type, age = :age, profile_pic = :profile_pic
    WHERE `id` = :id
";

$query_params = array(
  ":state" => $state,
  ":city" => $city,
  ":zip_code" => $zip_code,
  ":gender" => $gender,
  "age" => $age,
  "profile_pic" => $profile_pic,
  "body_type" => $body_type,
  ":id" => $id
  );

 try 
{ 
  $stmt = $db->prepare($query);
  $result = $stmt->execute($query_params);
} 
catch(PDOException $ex)
{die("Failed to run query: " . $ex->getMessage());}

echo "success!";
header("location: ../home_page.php");


?>
