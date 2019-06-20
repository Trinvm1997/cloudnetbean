<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<body>
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
	</body>
</html>
