<?php 
function idify($str) {
	$str = preg_replace('/[^A-Za-z0-9\-]/', '', $str);
	$str = strtolower(preg_replace('/\s+/','',$str));
	// $str = str_rot13($str);
	return $str;
}

function get($name, $fallback = false) {
	$var = htmlspecialchars($_GET[$name]);
	if ( $var == "" or is_null($var) or $var == false ) {
		return $fallback;
	} elseif ( $var == "on" ) {
		return true;
	} else {
		return $var." ";
	}
}

function english_out($var, $false = "no"){
	if ( gettype($var) == "array" ) {
		$out = "";
		for( $i=0; $i<count($var);  $i++) {
			if ( $i == count($var)-1 ) {
				$out .= $var[$i];
			} elseif ( $i == count($var)-2 ) {
				$out .= $var[$i].", and ";
			} else {
				$out .= $var[$i].", ";
			}
		}
		return $out;
	} elseif ( gettype($var) == "boolean" ) {
		return $var ? "yes" : $false;
	} else {
		return $var;
	}
}

function says($var, $false = "no") {
	echo english_out($var, $false);
}

function puts($var, $false = "no") {
	echo english_out($var, $false)."<br>";
}



//================================================================

// PERSONAL

$first_name = get("first-name");
$last_name = get("last-name");
$name = $first_name . " " . $last_name;
$birthday = get("birthday");
$gender = get("gender", "none");

$address = get("address");
$address_2 = get("address-2");
$city = get("city");
$post_code = get("post-code");
$state = get("state");
$country = get("country");

$tel = get("tel");
$mobile = get("mobile");
$skype = get("skype");
$email = get("email");

$id = idify($name.$email);

// ORGANIZATION & RESPONSIBILITIES

$organization = get("organization");
$responsibility = get("responsibilities");
if ( $responsibility ) {
	$responsibility_1 = get("responsibility-1");
	$responsibility_2 = get("responsibility-2");
	$responsibility_3 = get("responsibility-3");
	$responsibilities = array($responsibility_1);
	if($responsibility_2) { array_push($responsibilities, $responsibility_2); };
	if($responsibility_3) { array_push($responsibilities, $responsibility_3); };
}

// LANGUAGES & INTERPRETATION

$languages = array();
$lang_en = get("lang-en");
$lang_de = get("lang-de");
$lang_fr = get("lang-fr");
$lang_es = get("lang-es");
if( $lang_en ) { array_push($languages, "English"); };
if( $lang_de ) { array_push($languages, "German"); };
if( $lang_fr ) { array_push($languages, "French"); };
if( $lang_es ) { array_push($languages, "Spanish"); };
$interpreter = get("interpreter");
if( $interpreter ) {
	$from_lang_en = get("from-lang-en");
	$from_lang_de = get("from-lang-de");
	$from_lang_fr = get("from-lang-fr");
	$from_lang_es = get("from-lang-es");
	$to_lang_en = get("to-lang-en");
	$to_lang_de = get("to-lang-de");
	$to_lang_fr = get("to-lang-fr");
	$to_lang_es = get("to-lang-es");
	$interprets = array();
	if( $from_lang_en ) {
		if( $to_lang_de ) { array_push($interprets, "from English to German"); };
		if( $to_lang_fr ) { array_push($interprets, "from English to French"); };
		if( $to_lang_es ) { array_push($interprets, "from English to Spanish"); };
	}
	if( $from_lang_de ) {
		if( $to_lang_en ) { array_push($interprets, "from German to English"); };
		if( $to_lang_fr ) { array_push($interprets, "from German to French"); };
		if( $to_lang_es ) { array_push($interprets, "from German to Spanish"); };
	}
	if( $from_lang_fr ) {
		if( $to_lang_en ) { array_push($interprets, "from French to English"); };
		if( $to_lang_de ) { array_push($interprets, "from French to German"); };
		if( $to_lang_es ) { array_push($interprets, "from French to Spanish"); };
	}
	if( $from_lang_es ) {
		if( $to_lang_en ) { array_push($interprets, "from Spanish to English"); };
		if( $to_lang_de ) { array_push($interprets, "from Spanish to German"); };
		if( $to_lang_fr ) { array_push($interprets, "from Spanish to French"); };
	}
}

// MEALS

$meals = array();
if( get("lunch-fr") ) { array_push($meals, "Friday Lunch"); };
if( get("dinner-fr") ) { array_push($meals, "Friday Dinner"); };
if( get("lunch-sa") ) { array_push($meals, "Saturday Lunch"); };
if( get("dinner-sa") ) { array_push($meals, "Saturday Dinner"); };

$food = get("food");
if ( $food == "other" ) { $food = get("other-food"); }

// PROGRAMME PARTICIPATION

$participation = array();
if( get("prog-fr-1") ) { array_push($participation, "Nonviolence in Action"); };
if( get("prog-citytour") ) { array_push($participation, "City Tour"); };
if( get("prog-fr-2") ) { array_push($participation, "Celebration"); };
if( get("prog-sa-1") ) { array_push($participation, "IFOR in Action"); };
if( get("prog-sa-2") ) { array_push($participation, "Concert"); };
if( get("prog-su-1") ) { array_push($participation, "Interfaith Celebration"); };
if( get("prog-snack") ) { array_push($participation, "Snack"); };

$cloth = get("cloth");

// REGISTRATION FEE

$fee_fr = get("participation-fr");
$fee_sa = get("participation-sa");
$fee_su = get("participation-su");
$days = array();
if( $fee_fr ) { array_push($days, "Friday"); };
if( $fee_sa ) { array_push($days, "Saturday"); };
if( $fee_su ) { array_push($days, "Sunday"); };

$u16 = get("u16");

if ( $u16 ) {
	$fee = 0;
} elseif ( $fee_fr and $fee_sa and $fee_su) {
	$fee = 50;
}
else {
	$fee = 0;
	if ( $fee_fr ) { $fee += 20; };
	if ( $fee_sa ) { $fee += 20; };
	if ( $fee_su ) { $fee += 15; };
}

$payment = get("payment");
$payment_amount = get("payment-amount");
$paying_for = array();
if ( $payment == "otherpayer " ) {
	$payer = get("payer");
	$payment_method = $payer;
} elseif ( $payment == "selfpayment ") {
	$payment_method = get("payment-method");
	$paying_for_others = get("paying-for-others");
	if ( $paying_for_others ) {
		$paying_for_1 = get("paying-for-1");
		$paying_for_2 = get("paying-for-2");
		$paying_for_3 = get("paying-for-3");
		if ( $paying_for_1 ) { array_push($paying_for, $paying_for_1); };
		if ( $paying_for_2 ) { array_push($paying_for, $paying_for_2); };
		if ( $paying_for_3 ) { array_push($paying_for, $paying_for_3); };
	}
}

// COUNCIL

$council = get("council");
if ( $council ) {
	$delegating = get("participation-type");
	if ( $delegating == "delegate") { $delegating = get("delegating"); };
	$council_only = get("no-centennial");
	$council_payment = get("council-pay");
}

$council_participitation = "no";
if ( $council ) { 
	$council_participitation = "yes"; 
	if ( $council_only ) { $council_participitation = "only council"; };
};

// ACCOMODATIONS

$accomodation_help = get("accomodation-help");
if ( $accomodation_help == "yes") { 
	$accomodation_help = true;
} elseif ( $accomodation_help == "no" ) {
	$accomodation_help = false;
}

if ( $accomodation_help ) {
	$budget = get("budget");
	$doubles = get("doubles");
	if ( $doubles == "choice" ) { $doubles = get("roommate"); };
	$accomodation_friend_1 = get("accomodation-friend-1");
	$accomodation_friend_2 = get("accomodation-friend-2");
	$accomodation_wishes = get("accomodation-wishes");
	$payer = get("payer");
	if ( get("samebilling") ) {
		$billing_name = $name;
		$billing_address = $address;
		$billing_address_2 = $address_2;
		$billing_city = $city;
		$billing_post_code = $post_code;
		$billing_state = $state;
		$billing_country = $country;
	} else {
		$billing_name = get("billing-name");
		$billing_address = get("billing-address");
		$billing_address_2 = get("billing-address-2");
		$billing_city = get("billing-city");
		$billing_post_code = get("billing-post-code");
		$billing_state = get("billing-state");
		$billing_country = get("billing-country");
	}
}

// ARRIVAL & DEPARTURE

$arrival = get("arrival");
$departure = get("departure");
$needs_invitation = get("invitation");


// VALIDATION
include("config.php");
$SQL = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME) or die("MYSQL con failed: ".mysqli_error($SQL));

$valid = false;

if ( $first_name == false or $last_name == false ) {
	$valid = false;
	$error = "Youre name is incomplete!";
} elseif ( $address == false or $post_code == false or $city == false or $country == false ) {
	$valid = false;
	$error = "Youre address is incomplete!";
} elseif ( $email == false ) {
	$valid = false;
	$error = "You didn't specify and email!";
} elseif ( $payment == false ) {
	$valid = false;
	$error = "You didn't specify how you're fee will be paid!";
} else {
	$query = " SELECT * FROM registration WHERE id='$id' ";
	$result = $SQL->query($query);
	if ( $result->num_rows > 0 ) {
		$valid = false;
		$error = "We already have a registration with the same name and email address!";
	} else {
		$valid = true;
	}
}

if ( $valid ) {
	$query = " INSERT INTO registration (id, first_name, last_name, birthday, gender, address, address_2, city, post_code, state, country, tel, mobile, skype, email, languages, organization, responsibility, interpreter, meals, food, participation, cloth, days, u16, fee, paying_method, payment_amount, paying_for, council_participitation, accomodation_help, arrival, departure, invitation) 
	           VALUES ('$id', '$first_name', '$last_name', '$birthday', '$gender', '$address', '$address_2', '$city', '$post_code', '$state', '$country', '$tel', '$mobile', '$skype', '$email', '".english_out($languages)."', '$organization', '".english_out($responsibility)."', '".english_out($interpreter)."', '".english_out($meals)."', '$food', '".english_out($participation)."', '".english_out($cloth)."', '".english_out($days)."', '".english_out($u16)."', '$fee', '$payment_method', '$payment_amount', '".english_out($paying_for)."','".english_out($council_participitation)."', '".english_out($accomodation_help)."', '$arrival', '$departure', '".english_out($needs_invitation)."') ";
	$result = $SQL->query($query);
	if ( $result == 0 ) { $error = $SQL->error; };
	if ( $result == 1 ) { $success = "saved to database"; };
}


mysql_close($con);
?>



<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="http://use.edgefonts.net/open-sans:n7,i7,n8,i8,i4,n3,i3,n4,n6,i6:all.js"></script>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/form.css">
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
	<p>
		<?php 
		puts($email);
		puts($name);
		puts($payment);
		puts($payment_method); 
		if ( !$valid ) {
			puts($error);
		} else {
			puts($query);
			puts($result);
			puts($error);
		}
		 ?>
	</p>
</body>