
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="hw3.css" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title> Fruit Quiz </title>
</head>

<body>
<form method="post">
<p>Q1. Which fruit is most enjoyed by Granny Smith?:</p>
<input type="radio" name="fruit" value="apple" /> Apple
<input type="radio" name="fruit" value="orange" /> Orange
<input type="radio" name="fruit" value="banana" /> Banana
<input type="radio" name="fruit" value="pear" /> Pear

<p>Q2. Which fruit is the most popular in the world?:</p>
<input type="radio" name="popular" value="apple" /> Apple
<input type="radio" name="popular" value="kiwi" /> Kiwi
<input type="radio" name="popular" value="tomato" /> Tomato
<input type="radio" name="popular" value="peach" /> Peach

<p>Q3. Kiwis contain ___ as much Vitamin C as an orange:</p>
<input type="radio" name="vitc" value="onefourth" /> One-fourth
<input type="radio" name="vitc" value="twice" /> Twice
<input type="radio" name="vitc" value="onehalf" /> One-half
<input type="radio" name="vitc" value="just" /> Just

<p>Q4. Which is your favorite fruit?</p>
<input type="text" name="favfruit" /> <br />

<p>Q5. What is a fruit that provides a lot of potassium?</p>
<input type="text" name="potassium" /> <br />
<br />
<input type="submit" />

</form>

<h1>Results</h1>

<?php
$fruit = $_POST["fruit"];
$popular = $_POST["popular"];
$vitc = $_POST["vitc"];
$favfruit = $_POST["favfruit"];
$potassium = $_POST["potassium"];
$count = 0; #used to total score

if ($fruit === "apple") {
print "<p> Q1 is correct </p>";#prints if correct, similar below
$count = $count + 1;}
elseif ($fruit === "orange"){print "<p> Q1 is incorrect </p>";}
elseif ($fruit === "banana"){print "<p> Q1 is incorrect </p>";}
elseif ($fruit === "pear"){print "<p> Q1 is incorrect </p>";}
else {print "";}

if ($popular === "tomato") {
print "<p> Q2 is correct </p>";
$count = $count + 1;}
elseif ($popular === "apple"){print "<p> Q2 is incorrect </p>";}
elseif ($popular === "kiwi"){print "<p> Q2 is incorrect </p>";}
elseif ($popular === "peach"){print "<p> Q2 is incorrect </p>";}
else {print "";}

if ($vitc === "twice") {
print "<p> Q3 is correct </p>";
$count = $count + 1;}
elseif ($vitc === "onefourth"){print "<p> Q3 is incorrect </p>";}
elseif ($vitc === "onehalf"){print "<p> Q3 is incorrect </p>";}
elseif ($vitc === "just"){print "<p> Q3 is incorrect </p>";}
else {print "";}

if (preg_match("/[a-z,A-Z]+/", $favfruit)) {#accepts any string from the alphabet, not numbers
print "<p> Good Choice! </p>";
$count = $count + 1;}
else {print "<p> </p> ";}

if (preg_match("/banana|kiwi|cherr|grape|avocad|guava|passion|apricot/", $potassium)){#accepts certain answers that match the regex
print "<p> Correct </p>";
$count = $count + 1;}
else {print "<p> </p> ";}


print "<p> $count / 5 </p>"

?>

</body>
</html>


