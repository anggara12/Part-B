<!DOCTYPE HTML PUBLIC
"-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html401/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Wine Lookup</title>
</head>
<body bgcolor="white">
  <form action="query_results.php" method="GET">
    <br>Wine name :
    <input type="text" name="wineName" value="">
	<br>Winery name :
    <input type="text" name="wineryName" value="">
	<br>Region :
	<select value="region">
	<?php
	  require_once('db.php');

	  $connection = mysql_connect(DB_HOST, DB_USER, DB_PW);
	  mysql_select_db("winestore", $connection);

	  $query = "select region_name from region";
	  $result = mysql_query($query, $connection);

	  while($row = mysql_fetch_row($result)) {
		$region = $row[0];
		echo '<option value="' . $region . '">' . $region . '</option>';
	  }

	  mysql_close($connection);
	?>
	<select>
	<br>Grape variety :
	<select value="grapeVar">
	<?php
	  require_once('db.php');

	  $connection = mysql_connect(DB_HOST, DB_USER, DB_PW);
	  mysql_select_db("winestore", $connection);

	  $query = "select variety from grape_variety";
	  $result = mysql_query($query, $connection);

	  while($row = mysql_fetch_row($result)) {
		$grapeVar = $row[0];
		echo '<option value="' . $grapeVar . '">' . $grapeVar . '</option>';
	  }

	  mysql_close($connection);
	?>
	<select>
	<br>Range of years :
	<select value="minYear">
	<?php
	  require_once('db.php');

	  $connection = mysql_connect(DB_HOST, DB_USER, DB_PW);
	  mysql_select_db("winestore", $connection);

	  $query = "select distinct year from wine order by year";
	  $result = mysql_query($query, $connection);

	  while($row = mysql_fetch_row($result)) {
		$minYear = $row[0];
		echo '<option value="' . $minYear . '">' . $minYear . '</option>';
	  }

	  mysql_close($connection);
	?>
	<select> to 
	<select value="maxYear">
	<?php
	  require_once('db.php');

	  $connection = mysql_connect(DB_HOST, DB_USER, DB_PW);
	  mysql_select_db("winestore", $connection);

	  $query = "select distinct year from wine order by year";
	  $result = mysql_query($query, $connection);

	  while($row = mysql_fetch_row($result)) {
		$maxYear = $row[0];
		echo '<option value="' . $maxYear . '">' . $maxYear . '</option>';
	  }

	  mysql_close($connection);
	?>
	<select>
	<br>Minimum number of wines in stock :
    <input type="text" name="minStocked" value="">
	<br>Minimum number of wines ordered :
    <input type="text" name="minOrderd" value="">
	<br>Range of cost :
    $<input type="text" name="minCost" value="0"> to $<input type="text" name="maxCost" value="100">
	
    <br><input type="submit" value="Show wines">
  </form>
  <br>
</body>
</html>

