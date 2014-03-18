<?php

require_once "../include/config.php";

$result = '';

if(isset($_POST['userName']) && isset($_POST['email']) && isset($_POST['password'])){
	try {
	    $pdo = new PDO(DB_PDODRIVER . ":host=" . DB_HOST . ";dbname=" . DB_DATABASE,
	        DB_USERNAME, DB_PASSWORD);
        $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $_POST['userName']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':password', $_POST['password']);

        $stmt->execute();

        $result = 'You\'ve been succesfully registered. Please check your emails.';

	}
	catch (\PDOException $e) {
	    header("Location: error.php");
	    exit;
	}

}else{

}

?>
<!DOCTYPE html>
<html>
<head>

	<title>URL Shortener</title>
	<?php include('header.php'); ?>
	<style type="text/css">
	input{
		color: black;
	}
	#mastfoot{
		margin-left: auto;
		margin-right: auto;
	}

	</style>
</head>
<body>

	<div class="site-wrapper">

		<div class="site-wrapper-inner">

			<div class="cover-container">

				<?php include('navigation.php'); ?>
				
				<?php if( isset($result) && strlen($result) > 0 ){ ?>
					<div class="alert alert-success">You've been sucesfully registered!</div>
				<?php }else{ ?>
				<div class="inner cover">
					<form id="registrationForm" action="register.php" method="post">
						<h1 class="cover-heading">Enter your details:</h1><br />

						<fieldset>
							<label for="userName">User name:</label>
							<div class="input-group">
							  <span class="input-group-addon"></span>
							  <input type="text" class="form-control" id="userName" name="userName" placeholder="user name" pattern=".{5,10}" required title="5 to 10 characters" />
							</div>
							<label for="email">email:</label>
							<div class="input-group">
							  <span class="input-group-addon"></span>
							  <input type="text" class="form-control" id="email" name="email" placeholder="email" required title="Enter an email address" />
							</div>

							<label for="password">Password:</label>
							<div class="input-group">
							  <span class="input-group-addon"></span>
							  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required title="Please enter a password" />
							</div>

							<input type="submit" value="Register" class="btn btn-default navbar-btn">							
						</fieldset>

					</form>
			  	</div>
				<?php } ?>


			</div>

	  	</div>

	</div>

  	<div class="mastfoot">
		<div class="inner">
	  		<p>URL Shortener for <a href="http://tora-soft.com">Tora Soft</a>, by <a href="https://twitter.com/federicogiust">@federicogiust</a>.</p>
		</div>
  	</div>

	<?php include('footer.php'); ?>
</body>
</html>
