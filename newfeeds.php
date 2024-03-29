<?php
include("session.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Postzone- NewFeed</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-client_id" content="536051103891-0mleul9knbaklc60evjivm98c37qvsc4.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/client:platform.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main2.css">

</head>
<body>
	<div class="profile">
		<div class="container">
			<div class="row">
				<div class="header">
					<div class="col-md-4">
						<h1>Postzone</h1>
					</div>
					<div class="col-md-8">
						<h2><?php echo $_SESSION['login_us'];?></h2>
						<a href="logot.php"><button type="button" class="btn btn-primary">Logout</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="feed">
		<div class="container">
			<div class="row">
				<div class="well">
					<form method="POST" action="post.php">
						<label>New Feed</label></br>   
						<textarea class="form-control" rows="4" id="comment" name="feed" placeholder="Share Your Thoughts..."></textarea>
						<button type="submit" name="submit" class="btn btn-primary">Post</button>
					</form>
				</div>
			</div>
		</div>	
	</div>

	<?php 
    include('db.php');
	$sql="SELECT newfeed,nm FROM post ORDER BY id DESC";
	$ret=mysqli_query($conn,$sql);
	if(mysqli_num_rows($ret)){
	while ($row=mysqli_fetch_array($ret))
	{?>
    <div class="article">
		<div class="container">
			<div class="block">
				<div class="row">
					<?php echo "<h1>".$row['nm']." <hr></h1>";
					      echo "<p>".$row['newfeed']."</p>";?>
		      	
		      	</div>
		    </div>
		</div>
	</div>
	<?php } }
	mysqli_free_result($ret);
    mysqli_close($conn);
    include('footer.php');?>
</body>
</html>