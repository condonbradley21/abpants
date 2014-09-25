<?php
    include('common/common.php');

    session_start();
    $pantsid = $_SESSION['id'];
    $from_user = $_GET['id'];

    $query = " 
        SELECT *
        FROM user_messages
        WHERE to_user = :to_user AND from_user = :from_user 
    ";

    $query_params = array(
        ":to_user" => $pantsid,
        ":from_user" => $from_user
        
    );

    try 
    { 
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } 
    catch(PDOException $ex)
    {die("Failed to run query: " . $ex->getMessage());}

    $rowone = $stmt->fetchall(); 
   
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
                    <div class="col-md-12">
                        <?php echo $itemsone; ?>
                    </div>
 				    <form role="form" id="mainform" action="controller/messages_handler.php" method="post">
 				    	<input type="hidden" name="from_user" value="<?php echo $_SESSION['id']; ?>"/>
 				    	<input type="hidden" name="to_user" value="<?php echo $from_user; ?>"/>
                        <textarea class="form-control" name="message" rows="3"></textarea>
                        <button type="submit" form="mainform" class="btn btn-success buttoncenter">Send Message</button>
                    </form>             
 				</div>
 			</div>
 		</div>
	</body>	
</html>

