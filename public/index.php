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
				
				<div class="inner cover">
					<form id="shortenUrlForm" action="submit.php" method="post">
						<label for="url"><h1 class="cover-heading">Enter URL (http://www.example.com):</h1></label>
						<div class="input-group">
							<span class="input-group-addon">http://</span>
							<input type="text" class="form-control" id="url" name="url" placeholder="Url" required title="5 to 10 characters" />
						</div>
						<input type="submit" value="Shorten" class="btn btn-default navbar-btn">
					</form>
					<p class="lead">This is a simple URL Shortener service.</p>

			  	</div>



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
