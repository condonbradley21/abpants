<?php 

  include('../common/common.php');

  $uniquetoken = ($_GET['uid']);

  $query = "
  		SELECT uniquetoken
      	FROM a_and_b_pants_database
  		WHERE `uniquetoken` = :uniquetoken
  ";

  $query_params = array(
  	":uniquetoken" => $uniquetoken
  );

  try 
  { 
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
  } 
	catch(PDOException $ex)
	{die("Failed to run query: " . $ex->getMessage());}

	$row = $stmt->fetch(); 


 

  $query = " 
        UPDATE a_and_b_pants_database
        SET `verified` = :verified
        WHERE `uniquetoken` = :uniquetoken
      "; 

  $query_params = array(
    ":uniquetoken" => $uniquetoken,
    ":verified" => 1
    );

   try 
  { 
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
  } 
  catch(PDOException $ex)
  {die("Failed to run query: " . $ex->getMessage());}
  if($row != "") 
    
  { 
    echo "Login Validated, Registration Complete";
  }
  else 
  {
    die("Registration Failed");
  }

?>
