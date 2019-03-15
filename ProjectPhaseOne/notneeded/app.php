<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Christopher Ermel</title>
	<!--Style Sheet Links-->
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/main.css">
	<!-- Below is used to set the 1x1 ratio and remove default phone functionality -->
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<?php require ('db/db.php'); ?>
</head>
<body>
	<div id = 'main'>
		<div class = 'mainContent'> <!--The main Content of the page is here (left side)-->
			<div class = 'contentBox'>	
					<form method="post" action="validator.php">
				        <div class="form-group">
				          <input type="text" name="name" class="form-control" placeholder="Your Name" size="50">
				        </div>
				        <div class="form-group">
				          <input type="text" name="email" class="form-control" placeholder="YourEmail@example.com" size="50">
				        </div>
				        <div class="form-group">
				          <input type="text" name="city" class="form-control" placeholder="Your City" size="50">
				        </div>
				        <div class="form-group">
			            <!-- <input type="text" name="skills" class="form-control" placeholder="-Skills">	 -->
			        	<textarea type="text" name="skills" class="form-control" placeholder="Tell us about some of your skills." cols="70" rows="4"> </textarea>
			        	</div>
			          	<input type="submit" name="submit" value="submit" class="btn btn-primary">
		      		</form>
		  	</div>
		  	<div class = 'mainHeading'>
		  			<h2><p>User Information:</p></h2>
		  			<div class = 'mainHeadingInfo'>
		  			<p>Please input your name, email, city, and a little blurb on the skills you posses.</p>
		  		</div>
		  	</div>
		  	
		</div>
		<div class = 'mainSidebar'><!--The main Side Bar Content of the page is here (right side)-->
			<div class = 'mainLinkBox'><!--This is used for the links of the sidebar-->
			  <a href="./allUsers.php">-----All Users-----</a>
              <a href="./app.php">-----App-----</a>
              <a href="#">-----Clients-----</a>
			  <a href="#">-----Contact-----</a>
		</div>
	</div>

</body>
</html>
