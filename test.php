<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
define("DB_USER", "Andrija");
define("DB_PASSWORD", "12345");
define("DB", "test1");
define("DB_URL", "192.168.1:3306");

$dbc = mysqli_connect(DB_URL, DB_USER, DB_PASSWORD, DB_NAME)
OR die("Could not connect to mySQL server" . mysqli_connect_error());

$query ="SELECT first_name, last_name, email, street, city, state, zip,	phone, birth_date FROM students";

$response = mysqli_query($dbc, $query);

if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>First Name</b></td>
<td align="left"><b>Last Name</b></td>
<td align="left"><b>Email</b></td>
<td align="left"><b>Street</b></td>
<td align="left"><b>City</b></td>
<td align="left"><b>State</b></td>
<td align="left"><b>Zip</b></td>
<td align="left"><b>Phone</b></td>
<td align="left"><b>Birth Day</b></td></tr>';

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
