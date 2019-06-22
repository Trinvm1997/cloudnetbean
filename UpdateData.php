<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<head>
		<title>ATN - Updating</title>
		</head>	
	<body>
		<div class="w3-container">
			<div class="w3-bar w3-black w3-card">
				<a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-text-blue">HOME</a>
				<a href="ConnectToDB.php" class="w3-bar-item w3-button w3-padding-large w3-right w3-hover-text-blue">VIEW</a>
    			<a href="InsertData.php" class="w3-bar-item w3-button w3-padding-large w3-right w3-hover-text-blue">INSERT</a>
    			<a href="UpdateData.php" class="w3-bar-item w3-button w3-padding-large w3-right w3-hover-text-blue">UPDATE</a>
    			<a href="DeleteData.php" class="w3-bar-item w3-button w3-padding-large w3-right w3-hover-text-blue">DELETE</a>
			</div>
		</div>

		<div class="w3-container">
			<h1>UPDATE DATA IN DATABASE</h1>
			<ul style="list-style-type: none">
			<form name="UpdateData" action="UpdateData.php" method="POST" >
			<li>Shop ID:</li><li><input type="text" name="shopid" /></li>
			<li>Accountant:</li><li><input type="text" name="accountant" /></li>
			<li>Revenue:</li><li><input type="text" name="revenue" /></li>
			<li><input type="submit" /></li>
			</form>
			</ul>

			<?php
			if (empty(getenv("DATABASE_URL"))){
				echo '<p>The DB does not exist</p>';
				$pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
			}
			else{
				$db = parse_url(getenv("DATABASE_URL"));
				$pdo = new PDO("pgsql:" . sprintf(
				"host=ec2-23-21-129-125.compute-1.amazonaws.com;port=5432;user=lrqgdgzdowigqc;password=8652e83044024491ba444c1d161044f803b99c9101bd7d129e8a6a6db78b5bea;dbname=deh478l9lii3uq",
				$db["host"],
				$db["port"],
				$db["user"],
				$db["pass"],
				ltrim($db["path"], "/")
				));
			}  

			$sql = "UPDATE asm2 SET accountant = '$_POST[accountant]', revenue = '$_POST[revenue]' WHERE shopid = '$_POST[shopid]'";
			$stmt = $pdo->prepare($sql);
			if(is_null($_POST[accountant]) == FALSE){
				if($stmt->execute() == TRUE){
					echo "Record updated successfully.";
				}
				else{
					echo "Error updating record. ";
				}
			}
		?>
		</div>

		<footer class="w3-container w3-padding w3-center w3-opacity w3-black w3-xlarge">
			<i class="fa fa-facebook-official w3-hover-opacity"></i>
			<i class="fa fa-instagram w3-hover-opacity"></i>
			<i class="fa fa-snapchat w3-hover-opacity"></i>
			<i class="fa fa-pinterest-p w3-hover-opacity"></i>
			<i class="fa fa-twitter w3-hover-opacity"></i>
			<i class="fa fa-linkedin w3-hover-opacity"></i>
			<p class="w3-medium w3-white">Designed by <a href="https://www.facebook.com/profile.php?id=100005135791217" target="_blank">Nguyen Van Minh Tri</a></p>
		</footer>
	</body>
</html>
