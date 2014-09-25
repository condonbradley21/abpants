<?php 

	include('common/common.php');

	session_start();
	$signedin = 0;

	if(isset($_SESSION['id']))
	{
		$signedin = 1;
	}
	$query = " 
		SELECT * 
		FROM a_and_b_pants_database
		WHERE id = :id
	";
	$query_params = array(
		":id" => $_SESSION['id']
	);

	try 
 	{ 
    	$stmt = $db->prepare($query);
    	$result = $stmt->execute($query_params);
	} 
	catch(PDOException $ex)
	{die("Failed to run query: " . $ex->getMessage());}

	$row = $stmt->fetch();

	$flag = 0;
	if($row['state'] != "" && $row['city'] != "" && $row['gender'] != "")
	{
		$flag = 1;
	}

?>
<body background="boat.png">
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
				<a class="navbar-brand" href="home_page.php">A & B Pants</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#contact">Contact</a></li>
				<li><a href="pants_auction.php">Auctions</a></li>			
				<li class="dropdown">
					
				<?php 
				if($signedin == 1)
				{
					echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile <span class="caret"></span></a>';
					echo '<ul class="dropdown-menu" role="menu">';
				
				if($flag == 1)
				{
					echo '<li><a href="my_profile.php">My Profile</a></li>';
					
				}
				else
				{
					echo '<li><a href="edit_profile.php">Create Profile</a></li>';			
					
				}
					echo '<li><a href="account_manager.php">Manage Account</a></li>';
					echo '<li><a href="new_pants.php">Post new listing</a></li>';
					echo '<li><a href="#">Edit current Listing</a></li>';
					echo '<li class="divider"></li>';
					echo '<li class="dropdown-header">Nav header</li>';
					echo '<li><a href="#">Separated link</a></li>';
					echo '<li><a href="#">One more separated link</a></li>';
				}
				else
				{
					echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>';
					echo '<ul class="dropdown-menu" role="menu">';
				}

				?>
				</ul>	
				</li>
				</ul>
					<ul class="nav navbar-nav navbar-right">
					<?php 
					if($signedin == 1) {
						echo '<li><a href="#">' . $_SESSION['email'] . '</a></li>';
						echo '<li><a href="controller/logout_handler.php">Sign out</a></li>';						
					} 
					else {
						echo '<li><a href="a_and_b_login.php">Sign in</a></li>';
						echo '<li class="active"><a href="a&b_pants.php">Register</a></li>';						
					}  
					?>
					</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</body>       