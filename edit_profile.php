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
                        <div class="middletext"><label>Create Profile</label></div>
                        <div class="col-md-6 right">
     						<label for="zipcode">Zip Code </label>
                			<input type="zip_code" class="form-control" name="zip_code" id="zip_code" placeholder="Enter Zip Code">
                        </div>
							<div class="col-md-6 right">
	 						<label for="city">City</label>
	            			<input type="city" class="form-control" name="city" id="city" placeholder="Enter City">
						</div>
 						<div class="col-md-6 right">
                    		<label for="state">State</label>
	                    	<select name="state" class="form-control">
	                            <option value="AL">Alabama</option>
	                            <option value="AK">Alaska</option>
	                            <option value="AZ">Arizona</option>
	                            <option value="AR">Arkansas</option>
	                            <option value="CA">California</option>
	                            <option value="CO">Colorado</option>
	                            <option value="CT">Connecticut</option>
	                            <option value="DE">Delaware</option>
	                            <option value="DC">District Of Columbia</option>
	                            <option value="FL">Florida</option>
	                            <option value="GA">Georgia</option>
	                            <option value="HI">Hawaii</option>
	                            <option value="ID">Idaho</option>
	                            <option value="IL">Illinois</option>
	                            <option value="IN">Indiana</option>
	                            <option value="IA">Iowa</option>
	                            <option value="KS">Kansas</option>
	                            <option value="KY">Kentucky</option>
	                            <option value="LA">Louisiana</option>
	                            <option value="ME">Maine</option>
	                            <option value="MD">Maryland</option>
	                            <option value="MA">Massachusetts</option>
	                            <option value="MI">Michigan</option>
	                            <option value="MN">Minnesota</option>
	                            <option value="MS">Mississippi</option>
	                            <option value="MO">Missouri</option>
	                            <option value="MT">Montana</option>
	                            <option value="NE">Nebraska</option>
	                            <option value="NV">Nevada</option>
	                            <option value="NH">New Hampshire</option>
	                            <option value="NJ">New Jersey</option>
	                            <option value="NM">New Mexico</option>
	                            <option value="NY">New York</option>
	                            <option value="NC">North Carolina</option>
	                            <option value="ND">North Dakota</option>
	                            <option value="OH">Ohio</option>
	                            <option value="OK">Oklahoma</option>
	                            <option value="OR">Oregon</option>
	                            <option value="PA">Pennsylvania</option>
	                            <option value="RI">Rhode Island</option>
	                            <option value="SC">South Carolina</option>
	                            <option value="SD">South Dakota</option>
	                            <option value="TN">Tennessee</option>
	                            <option value="TX">Texas</option>
	                            <option value="UT">Utah</option>
	                            <option value="VT">Vermont</option>
	                            <option value="VA">Virginia</option>
	                            <option value="WA">Washington</option>
	                            <option value="WV">West Virginia</option>
	                            <option value="WI">Wisconsin</option>
	                            <option value="WY">Wyoming</option>
	                   		</select>               
 						</div>
 						<div class="col-md-6 right">
 							<label class="control-label">Gender</label>
	 					    <select name="gender" class="form-control">
	 					        <option value="male">male</option>
	 					        <option value="female">female</option> 
	 					    </select>
 						</div>
 						<div class="col-md-6 right">
                    		<label class="control-label">Body Type</label>
	                        <select name="body_type" class="form-control">
	                            <option value="athletic">Athletic</option>
	                            <option value="thin">thin</option>
	                            <option value="heavyset">A few Extra Pounnds</option>    
	                        </select>
 						</div>
 						<div class="col-md-6 right">
	                   		<label class="control-label">Age</label>
	                        <select name="age" class="form-control">
	                            <?php
	                                for($i=18;$i<80;$i++){
	                                  echo "<option value=".$i.">".$i."</option>";
	                                }
	                            ?>
	                        </select>
 						</div>
 						<div class="col-md-12 right">
 							<div><button type="submit" class="btn btn-success center">Submit</button></div>
                    		<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>"/>
            			</div>
            			<div class="form-group">
            				<input type="hidden"  class="form-control" name="profile_pic" id="image01" placeholder="Upload Profile Picture">
            			</div>
					</form>

        			
        			<div class="col-md-12">
           				<label for="profile_pic">Profile Picture</label>
        				<input type="hidden"  class="form-control" name="profile_pic" id="image01" placeholder="Profile Picture">
        				<form role="form" action="controller/server/php/" method="post" enctype='multipart/form-data'>
            				<span class="btn btn-success fileinput-button">
                			<i class="glyphicon glyphicon-plus"></i>
                			<span>Select files...</span>
                			<!-- The file input field used as target for the file upload widget -->
                			<input id="fileupload1" type="file" name="files[]" multiple>
                			<div id="progress1" class="progress">
                    			<div class="progress-bar progress-bar-success"></div>
                			</div>		
            			</form>
       				</div>
 				</div>
 			</div>
 		</div>
	</body>	
</html>