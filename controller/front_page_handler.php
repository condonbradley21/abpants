<?php 

include('../common/common.php');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$string = "unqiuetoken_sender";  
$username = $_POST['username'];
$uniquetoken = md5($string . $_POST['email']);


echo $email;
   $query = "
   		SELECT email
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
    echo $row["email"];
         
    if($row != "") 
    { 
        die("This email address is already registered"); 
    }

    else{
      $query = " 
          INSERT INTO a_and_b_pants_database
          SET `first_name` = :first_name, `last_name` = :last_name, `email` = :email, `password` = :password, `uniquetoken` = :uniquetoken, `verified` = :verified, username = :username
      "; 
       

      $query_params = array(
          ":first_name"=> $first_name,
          ":last_name" => $last_name,
          ":email" => $email,
          ":password" => $password,
          ":username" => $username,
          ":uniquetoken" => $uniquetoken,
          ":verified" => "0"
      );


      try 
      { 
          $stmt = $db->prepare($query);
          $result = $stmt->execute($query_params);
      } 
      catch(PDOException $ex)
      {die("Failed to run query: " . $ex->getMessage());}

      $link = "http://162.243.143.150/abpants/controller/activation_handler.php?uid=" . $uniquetoken;
      $to = $email;
      $from = "no-reply@abpants.com";
      $subject = "A & B Pants Activiation";
      $message = "Please click the following link to activate your account: " . $link;
      $headers = 'From: webmaster@abpants.com' . "\r\n" .
      'Reply-To: webmaster@abpants.com' . "\r\n" .
      'X-Mailer: PHP/' . phpversion();

      mail($to, $subject, $message, $headers);
      header("location: ../home_page.php");
    }
//     $query_verify_email = "SELECT a_and_b_pants_database * FROM id  WHERE email ='$email'";
//           $result_verify_email = mysqli_query($dbc, $query_verify_email);
//           if (!$result_verify_email) { //if the Query Failed ,similar to if($result_verify_email==false)
//               echo ' Database Error Occured ';
//           }
   
//           if (mysqli_num_rows($result_verify_email) == 0) { // IF no previous user is using this email .
   
//               // Create a unique  activation code:
//               $uniquetoken = md5(uniqid(rand(), true));
   
//               $query_insert_user =
//                   "INSERT INTO `id` ( `first_name`, `email`, `password`, `uniquetoken`) VALUES ( '$first_name', '$email', '$password', '$uniquetoken')";
   
//               $result_insert_user = mysqli_query($dbc, $query_insert_user);
//               if (!$result_insert_user) {
//                   echo 'Query Failed ';
//               }
   
//               if (mysqli_affected_rows($dbc) == 1) { //If the Insert Query was successfull.
   
//                   // Send the email:
//                   $message = " To activate your account, please click on this link:\n\n";
//                   $message .= WEBSITE_URL . '/activate.php?email=' . urlencode($Email) . "&key=$activation";
//                   mail($Email, 'Registration Confirmation', $message, 'From:'.EMAIL);
// - See more at: http://youhack.me/2010/04/01/building-a-registration-system-with-email-verification-in-php/#sthash.idoc4Dnw.dpuf

var_dump($result);

?>
