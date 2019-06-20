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
    <table name="InsertData" action="InsertData.php" method="POST" border="1">
    <tr><td>Shop ID:</td><td><input type="text" name="shopid" /></td></tr>
    <tr><td>Revenue:</td><td><input type="text" name="revenue" /></td></tr>
    <tr><td>Toys sold:</td><td><input type="text" name="toysold" /></td></tr>
    <tr><td>Toys left:</td><td><input type="text" name="toyleft" /></td></tr>
    <tr><td>Last time checked:</td><td><input type="text" name="timecheck" /></td></tr>
    
    </table>
    <tr><input type="submit" /></tr>

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

$sql = "INSERT INTO revenue(shopid, revenue, toysold, toyleft) "
        . " VALUES('$_POST[shopid]','$_POST[revenue]','$_POST[toysold]','$_POST[toyleft]')";
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
