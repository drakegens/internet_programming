<!DOCTYPE html>
<html>
<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title> Results of Table Insertion </title>

</head>

<body>
<h1>Results</h1>

<?php
#I have created a relation named hw5 with 3 fields: fname, lname, and age.
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('credentials.php');

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$age = $_POST["age"];



$dbh = new PDO('mysql:host=mysql.truman.edu;dbname=dmg3881CS315;charset=utf8', $username, $password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));




if (preg_match("/^[a-zA-Z]+$/", $fname) && preg_match("/^[a-zA-Z]+$/", $lname) && preg_match("/^[0-9]+$/", $age)) {#accepts any string from the alphabet, not numbers
$sqlstmt = $dbh->prepare("INSERT INTO hw5 VALUES (:fname, :lname, :age)");
$sqlstmt->bindParam(':fname', $fname);
$sqlstmt->bindParam(':lname', $lname);
$sqlstmt->bindParam(':age', $age);

#$result = $dbh->query("Select fname from hw5");

$sqlstmt->execute();

$sqlstmt2 = $dbh->prepare("SELECT * FROM hw5 ORDER BY fname");
$sqlstmt2->execute();
$result = $sqlstmt2->fetchAll();

}

else{print "<p>SQL statement insert failed</p>";}
?>



<p>Here are the names and ages of each individual stored in the database:</p>

<?php foreach( $result as $row): ?>
     <p><?= $row['fname']      ?>     <?= $row['lname']      ?>     <?= $row['age']     ?></p>
     
<?php endforeach; ?>



</body>
</html>

