<?php
    include('common/common.php');

    session_start();
    $pantsid = $_SESSION['id'];

    $query = " 
        SELECT *
        FROM a_and_b_pants_database
        WHERE id = :id
    ";

    $query_params = array(
        ":id" => $pantsid
    );

    try 
    { 
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } 
    catch(PDOException $ex)
    {die("Failed to run query: " . $ex->getMessage());}

    $row = $stmt->fetch(); 

    $items = '
             <div class="col-md-2 ccontainer"><img src="http://162.243.143.150/abpants/controller/server/php/files/'.$row['profile_pic'].'"/></img></div>    
        ';

    $query = " 
        SELECT *
        FROM user_messages
        WHERE to_user = :to_user
    ";

    $query_params = array(
        ":to_user" => $pantsid
        
    );

    try 
    { 
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } 
    catch(PDOException $ex)
    {die("Failed to run query: " . $ex->getMessage());}

    $rowone = $stmt->fetchall(); 
    var_dump($rowone);
    foreach ($rowone as $item){
        $query_params = array(
            ":from_user" => $item['from_user']
             );

        $query = " 
            SELECT *
            FROM a_and_b_pants_database
            WHERE id = :from_user
        ";

        
        try 
        { 
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        } 
        catch(PDOException $ex)
        {die("Failed to run query: " . $ex->getMessage());}

        $rowtwo = $stmt->fetch(); 






    $itemsone .= '
        <div class="col-md-12 rowdiv">                       
            <a href="" onclick="">
                <div class="col-md-2 divsize">
                    <img class="imgpice img" src="controller/server/php/files/thumbnail/'.$rowtwo['profile_pic'].'" >
                </div>
            </a>   
            <div class=" col-md-6 divsize p"><p>'.$item['message'].'</p></div><br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="lefty marginauto">
            <a class="btn btn-success" href="/abpants/replymessage.php?id='.$item['from_user'].'">Reply</a>
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
	<body>
		<?php include("nav.php");?>
 		<div class="wrapper01">
 		  	<div class="container">
 			    <div class="row right well welll">
 				    <form role="form" action="controller/personal_information_handler.php" method="post">
                        <div class="middletext"><label>My Profile</label></div>
                        <div class="col-md-12"><?php echo $items; ?></div>
                        <div class="col-md-6 right">
     						<label for="zipcode">Zip Code </label>
                			<input type="zip" class="form-control" name="zip_code" id="zip_code" value="<?php echo $row['zip_code']; ?>" disabled>
                        </div>
							<div class="col-md-6 right">
	 						<label for="city">City</label>
	            			<input type="city" class="form-control" name="city" id="city" value="<?php echo $row['city']; ?>" disabled>
						</div>
 						<div class="col-md-6 right">
                    		<label for="state">State</label>
	                    	<input type="state" class="form-control" name="state" id="state" value=" <?php echo $row['state']; ?>" disabled>
 						</div>
 						<div class="col-md-6 right">
 							<label class="control-label">Gender</label>
	 					    <input type="gender" class="form-control" name="gender" id="gender" value="<?php echo $row['gender']; ?>" disabled>
 						</div>
 						<div class="col-md-6 right">
                    		<label class="control-label">Body Type</label>
	                        <input type="body_type" class="form-control" name="body_type" id="body_type" value="<?php echo $row['body_type']; ?>" disabled>
 						</div>
 						<div class="col-md-6 right">
	                   		<label class="control-label">Age</label>
	                        <input type="age" class="form-control" name="age" id="age" value="<?php echo $row['age']; ?>" disabled>
 						</div>
 						<div class="col-md-12 right">							
                    		<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>"/>
            			</div>
                    </form>
                    <?php echo $itemsone; ?>
 				</div>
 			</div>
 		</div>
	</body>	
</html>

