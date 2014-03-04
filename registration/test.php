<?php 

$str = "Tobias1 ><<< Lohse flojoto@hotmail.com";
echo $str;

echo "<br><br>";
function idify($str) {
	$str = preg_replace('/[^A-Za-z0-9\-]/', '', $str);
	$str = strtoupper(preg_replace('/\s+/','',$str));
	return str_rot13($str);
}

echo idify($str);

