<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<head>
		<title>Insert data to PostgreSQL with php - creating a simple web application</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style>
			li {
			list-style: none;
			}
		</style>
	</head>

	<body>
		<h1>INSERT DATA TO DATABASE</h1>
		<table class="w3-container w3-table w3-striped w3-bordered w3-border w3-hoverable" 
		name="InsertData" action="InsertData.php" method="POST" >
		<tr><td>Shop ID:</td><td><input type="text" name="shopid" /></td></tr>
		<tr><td>Accountant:</td><td><input type="text" name="accountant" /></td></tr>
		<tr><td>Revenue:</td><td><input type="text" name="revenue" /></td></tr>
		<tr><td><input type="submit" /></td></tr>
		</table>

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

		if($pdo === false){
			echo "ERROR: Could not connect Database";
		}

		//Khởi tạo Prepared Statement
		//$stmt = $pdo->prepare('INSERT INTO student (stuid, fname, email, classname) values (:id, :name, :email, :class)');

		//$stmt->bindParam(':id','SV03');
		//$stmt->bindParam(':name','Ho Hong Linh');
		//$stmt->bindParam(':email', 'Linhhh@fpt.edu.vn');
		//$stmt->bindParam(':class', 'GCD018');
		//$stmt->execute();
		//$sql = "INSERT INTO student(stuid, fname, email, classname) VALUES('SV02', 'Hong Thanh','thanhh@fpt.edu.vn','GCD018')";
		$sql = "INSERT INTO asm2(shopid, accountant, revenue)"
		. " VALUES('$_POST[shopid]','$_POST[accountant]','$_POST[revenue]')";
		$stmt = $pdo->prepare($sql);
		//$stmt->execute();
		if (is_null($_POST[shopid])) {
			echo "StudentID must be not null";
		}
		else{
			if($stmt->execute() == TRUE){
				echo "Record inserted successfully.";
			}
			else{
				echo "Error inserting record: ";
			}
		}
		?>
	</body>
</html>
