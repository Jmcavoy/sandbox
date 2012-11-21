<html>
<head>

	<title>Justin's Movies Search Results</title>
</head>
<body>
<h1>Justin's Movies Search Results<h1>
<?

$searchterm = $_POST['searchterm'];
$searchtype = $_POST['searchtype'];

	trim($searchterm);
	if (!$searchtype  || !$searchterm)
	{
		echo "you have not entered search details.  Please go back and try again.";
		exit;
	}

$searchtype = addslashes ($searchtype);
$searchterm = addslashes ($searchterm);




@ $db = mysql_pconnect ("localhost", "root", "");

if (!db) { echo "db fucked up"; }
mysql_select_db ("justins_movies");
$query = "select * from movies where ".$searchtype." like '%".$searchterm."%'";
$result = mysql_query($query);
//var_dump($result);
$num_results = mysql_num_rows($result);

echo "<p>Number of movies found: ".$numb_results."</p>";

for ($i=0; $i < $num_results; $i++)

{
$row = mysql_fetch_array($result);
echo "<p><strong>".($i+1).".  title:  ";
echo htmlspecialchars (stripslashes ($row["Title"]));
echo "</strong><br>year_released: ";
echo htmlspecialchars (stripslashes ($row["Year_Released"]));
echo "<br>director: ";
echo htmlspecialchars (stripslashes ($row["Director"]));
echo "<br>genre:  ";
echo htmlspecialchars (stripslashes ($row["Genre"]));
echo "</p>";
}

?>

</body>
</html>

