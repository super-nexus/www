<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
define("DB_USER", "Andrija");
define("DB_PASSWORD", "12345");
define("DB_NAME", "test1");
define("DB_URL", "localhost");

$dbc = mysqli_connect(DB_URL, DB_USER, DB_PASSWORD, DB_NAME)
OR die("Could not connect to mySQL server" . mysqli_connect_error());

$query ="SELECT first_name, last_name, email, address, state FROM students";

$response = mysqli_query($dbc, $query);

if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>First Name</b></td>
<td align="left"><b>Last Name</b></td>
<td align="left"><b>Email</b></td>
<td align="left"><b>Address</b></td>
<td align="left"><b>State</b></td>

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
$row['first_name'] . '</td><td align="left">' . 
$row['last_name'] . '</td><td align="left">' .
$row['email'] . '</td><td align="left">' . 
$row['street'] . '</td><td align="left">' .
$row['city'] . '</td><td align="left">' . 
$row['state'] . '</td><td align="left">' .
$row['zip'] . '</td><td align="left">' . 
$row['phone'] . '</td><td align="left">' .
$row['birth_date'] . '</td><td align="left">';

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);

?>

?>
</body>
</html>
