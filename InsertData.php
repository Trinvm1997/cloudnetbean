<!DOCTYPE html>
<html>
    <head>
<title>Inserting page</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {
list-style: none;
}
</style>
</head>
<body>
<h1>INSERT DATA TO DATABASE</h1>
<h2>Enter data into company's database</h2>
<ul>
    <form name="InsertData" action="InsertData.php" method="POST" >
<li>Shop ID:</li><li><input type="text" name="shopid" /></li>
<li>Revenue:</li><li><input type="text" name="revenue" /></li>
<li>Toys sold:</li><li><input type="text" name="toysold" /></li>
<li>Toys left:</li><li><input type="text" name="toyleft" /></li>
<li>Last time checked:</li><li><input type="text" name="timecheck" /></li>
<li><input type="submit" /></li>
</form>
</ul>

<?php

if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     
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

$sql = "INSERT INTO revenue "
        . " VALUES('$_POST[shopid]','$_POST[revenue]','$_POST[toysold]','$_POST[toyleft]','$_POST[timecheck]')";
$stmt = $pdo->prepare($sql);
//$stmt->execute();
 if (is_null($_POST[shopid])) {
   echo "shopid must be not null";
 }
 else
 {
    if($stmt->execute() == TRUE){
        echo "Record inserted successfully.";
    } else {
        echo "Error inserting record: ";
    }
 }
?>
</body>
</html>
