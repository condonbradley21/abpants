<?php 

include('../common/common.php');
$state = $_POST['state'];
$city = $_POST['city'];
$zip_code = $_POST['zip_code'];
$gender = $_POST['gender'];
$price = $_POST['price'];
$body_type = $_POST['body_type'];
$headline = $_POST['headline'];
$description = $_POST['description'];
$age = $_POST['age'];
$id = $_POST['owner_id'];


$query = "
    INSERT INTO pants_table 
    SET state = :state, city = :city, zip_code = :zip_code, gender = :gender, price = :price, body_type = :body_type, description = :description, owner_id = :owner_id, headline = :headline, age = :age
";

$query_params = array(
  ":state" => $state,
  ":city" => $city,
  ":zip_code" => $zip_code,
  ":gender" => $gender,
  "price" => $price,
  "body_type" => $body_type,
  "headline" => $headline,
  "description" => $description,
  "age" => $age,
  ":owner_id" => $id
  );

 try 
{ 
  $stmt = $db->prepare($query);
  $result = $stmt->execute($query_params);
} 
catch(PDOException $ex)
{die("Failed to run query: " . $ex->getMessage());}

echo "success!";

?>