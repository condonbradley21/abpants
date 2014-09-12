<?php 

include('../common/common.php');

//get the current password
$current_password = $_POST['current_password'];

//get the current users ID (probably from session)
$id = $_POST['userid'];

//execute a query to get the stored password
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

//Use password_verify to compare. This verify function returns true or false.
$password = password_verify($current_password, $row['password']);
if ($password == true){
    echo "true!";
}
//check to see if the two new passwords match

$password1 = $_POST['new_password'];
$password2 = $_POST['confirm_password'];

if ($password1 == $password2){
    $match = true;
}
else{
    $match = false;
}

if($password == true && $match == true) { 
    $query = "
        UPDATE a_and_b_pants_database
        SET password = :password
        WHERE `id` = :id
    ";

    $query_params = array(
        ":id" => $id,
        ":password" => password_hash($password1, PASSWORD_DEFAULT)
    );
    try 
    { 
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } 
    catch(PDOException $ex)
    {die("Failed to run query: " . $ex->getMessage());}

    if($result != ""){
        echo "changed!";
        header("location: ../home_page.php");
    }

}
else{
    "can't let you do that starfox";
}


?>