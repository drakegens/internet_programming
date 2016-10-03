<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="resumesite.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title> Contact Gens, Drake </title>

</head>

<body>
<h1>Results</h1>
<?php
//get all variables
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$reason = $_POST["reason"];
$comments = htmlspecialchars($_POST["comments"]);
$subject = "Thanks for contacting Drake Gens";
$msg = "Thanks for taking the time to contact me about $reason. I will try and get back to you soon.";
$headers = "From: drake.gens@gmail.com\r\n";

if (preg_match("/^[a-zA-Z_-]+$/", $fname)
&& preg_match("/^[a-zA-Z_-]+$/", $lname)
&& preg_match("/^[A-Za-z0-9-]+@[A-Za-z0-9-]+\.[A-Za-z0-9-]+$/", $email)){//validates form


mail($email, $subject, $msg, $headers);//email the contacter

print "<h2> Thanks for contacting me, $fname!</h2>";
print "<h2> An email has been sent to you. </h2>";

error_reporting(E_ALL);
#ini_set('display_errors', 1);
require('credentials.php');

//connect to database

$dbh = new PDO('mysql:host=mysql.truman.edu;dbname=dmg3881CS315;charset=utf8', $username, $password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//I have created a table with phpmyadmin called "contactresults" with the following fields: fname, lname, email, reason, comments


$sqlstmt = $dbh->prepare("INSERT INTO contactresults VALUES (:fname, :lname, :email, :reason, :comments)");

$sqlstmt->bindParam(':fname', $fname);
$sqlstmt->bindParam(':lname', $lname);
$sqlstmt->bindParam(':email', $email);#for added security
$sqlstmt->bindParam(':reason', $reason);
$sqlstmt->bindParam(':comments', $comments);

$sqlstmt->execute();

print "<h2> The results of your submission have been stored in a database. </h2>";

$sqlstmt2 = $dbh->prepare("SELECT count(*) FROM contactresults"); #a count of the number of rows in the db

$sqlstmt2->execute();


$result = $sqlstmt2->fetch();#returns an array of results

print "<h2> Number of contact form submissions: $result[0] </h2>";


}

else {
print "<h1>Error in validation!</h1>";
print "<p id=\"tryagain1\"><a href=\"contactme.html\">Try again</a></p>";//failure
}

$file = "counter.txt";//tracks how may people have accessed my site
$handlefile = fopen($file, 'r+');
$data = fread($handlefile, 512);
$count = $data + 1;
print "<p id=\"tryagain\">You are visitor number: $count </p>";
fseek($handlefile, 0);
fwrite($handlefile, $count);
fclose($handlefile);

?>












</body>
</html>
