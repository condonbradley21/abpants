<?php //There was a random "s" at the beggining of this line. Don't do that

  include('../common/common.php');

  $email = $_POST['email'];

  //This query did not have the FROM clause, FROM is a required clause for most SQL queries.  
  $query = "
  		SELECT *
      FROM a_and_b_pants_database
  		WHERE `email` = :email
  ";

  $query_params = array(
  	":email" => $email
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
  $password = password_verify($_POST['password'], $row['password']);
  
  //Check to see if the above function returned true.       
  if($password == true) 
  { 
    echo "Password Validated, Login Complete";
    //start the session
    session_start();
    //take each row from the matching database row and put it into a session variable.
    foreach($row as $key => $value){
      //echo both so you see whats going on, Please note, echoing password hashes in this manner is insecure. don't do it.
      echo $key . ":>";
      echo $value . "<br />";

      $_SESSION[$key] = $value;

      header("location: ../home_page.php");

    }
    $_SESSION['id'] = $row['id'];
  }
  else 
  {
    die("Incorrect Password");
  }

  //call these values anywhere like so
  echo $_SESSION['id'];
  echo $_SESSION['email'];
?>
