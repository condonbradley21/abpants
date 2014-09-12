<?php 

include('common/common.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

echo $email;
$query = " 
    INSERT INTO a_and_b_pants_database
    SET `first_name` = :first_name, `last_name` = :last_name, `email` = :email, `password` = :password
"; 
 

$query_params = array(
    ":first_name"=> $firstname,
    ":last_name" => $lastname,
    ":email" => $email,
    ":password" => $password
);

try 
{ 
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
} 
catch(PDOException $ex)
{die("Failed to run query: " . $ex->getMessage());}


var_dump($result);

?>