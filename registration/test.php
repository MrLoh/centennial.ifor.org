<?php 
function idify($str) {
	$str = preg_replace('/[^A-Za-z0-9\-]/', '', $str);
	$str = strtolower(preg_replace('/\s+/','',$str));
	// $str = str_rot13($str);
	return $str;
}

$first_name = "Tobias";
$last_name = "Lohse";
$name = $first_name . $last_name;
$email = "flojoto@hotmail.com";
$id = idify($name.$email);
$birthday = "03-03-1989";
$gender = "male";

include("config.php");
$SQL = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME) or die("MYSQL con failed: ".mysqli_error($SQL));

$query = " SELECT * FROM registration WHERE id='$id' ";
$result = $SQL->query($query);

if ( $result->num_rows > 0 ) {
	$row = $result->fetch_array(MYSQLI_ASSOC);
	echo "existing entry <br>";
	print_r($row);
} else {
	$query = " INSERT INTO registration (id, first_name, last_name, birthday, gender) VALUES ('$id', '$first_name', '$last_name', '$birthday', '$gender') ";
	$result = $SQL->query($query);
	if ( $result == 1 ) { echo "created new entry <br>"; };
}

// print_r($row);

// printf ("%s (%s)\n", $row["ide"], $row["first_name"]);

// echo $result;

// while($row = mysqli_fecth_array($result)) {
//   echo $row["id"] . "<br>";
// } 

