<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<head>
		<title>ATN - Inserting</title>
	</head>
	
	<body>
		<div class="w3-container">
			<h1>INSERT DATA TO DATABASE</h1>
			<?php
			ini_set('display_errors', 1);
			echo "Update database!";
			?>

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

			//$sql = 'UPDATE student '
			//                . 'SET name = :name, '
			//                . 'WHERE ID = :id';
			// 
			//      $stmt = $pdo->prepare($sql);
			//      //bind values to the statement
			//        $stmt->bindValue(':name', 'Lee');
			//        $stmt->bindValue(':id', 'SV02');
			// update data in the database
			//        $stmt->execute();

			// return the number of row affected
			//return $stmt->rowCount();
			$sql = "UPDATE asm2 SET accountant = 'Lee Chan Do' WHERE shopid = 'shop01'";
			$stmt = $pdo->prepare($sql);
			if($stmt->execute() == TRUE){
				echo "Record updated successfully.";
			}
			else{
				echo "Error updating record. ";
			}
			?>
		</div>

		<footer class="w3-container w3-padding w3-center w3-opacity w3-light-grey w3-xlarge">
			<i class="fa fa-facebook-official w3-hover-opacity"></i>
			<i class="fa fa-instagram w3-hover-opacity"></i>
			<i class="fa fa-snapchat w3-hover-opacity"></i>
			<i class="fa fa-pinterest-p w3-hover-opacity"></i>
			<i class="fa fa-twitter w3-hover-opacity"></i>
			<i class="fa fa-linkedin w3-hover-opacity"></i>
			<p class="w3-medium">Designed by <a href="https://www.facebook.com/profile.php?id=100005135791217" target="_blank">Nguyen Van Minh Tri</a></p>
		</footer>
	</body>
</html>
