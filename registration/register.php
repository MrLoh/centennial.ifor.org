<?php 
header('Content-Type: text/html; charset=UTF-8');

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
		return addslashes($var);
	}
}

function english_out($var, $false = "no"){
	if ( gettype($var) == "array" ) {
		$out = "";
		for( $i=0; $i<count($var);  $i++) {
			if ( $i == count($var)-1 ) {
				$out .= $var[$i];
			} elseif ( $i == count($var)-2 ) {
				$out .= $var[$i]." and ";
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

function in_array_binary_string($needle, $haystack) {
	if ( in_array($needle, $haystack) ) {
		return ", 1";
	} else {
		return ", 0";
	}
}


//================================================================

// PERSONAL

$first_name = get("first-name");
$last_name = get("last-name");
$name = $first_name . " " . $last_name;
$birthday = get("birthday");
$gender = get("gender", "no gender");

$address = get("address");
$address_2 = get("address-2");
$address_full = $address;
if ( !empty($address_2) ) { $address_full .= ", ".$address_2; };
$city = get("city");
$post_code = get("post-code");
$state = get("state");
$country = get("country");

$tel = get("tel");
$mobile = get("mobile");
$skype = get("skype");
$email = get("email");

$contact = array();
if ( $tel ) { array_push($contact, $tel); };
if ( $tel ) { array_push($contact, $mobile); };
if ( $tel ) { array_push($contact, $skype); };
if ( $tel ) { array_push($contact, $email); };

$id = idify($name.$email);

// ORGANIZATION & RESPONSIBILITIES

$organization = get("organization");
$responsibility = get("responsibilities");
if ( $responsibility ) {
	$responsibility_1 = get("responsibility-1");
	$responsibility_2 = get("responsibility-2");
	$responsibility_3 = get("responsibility-3");
	$responsibilities = array($responsibility_1);
	if ( $responsibility_2 ) { array_push($responsibilities, $responsibility_2); };
	if ( $responsibility_3 ) { array_push($responsibilities, $responsibility_3); };
}

// LANGUAGES & INTERPRETATION

$languages = array();
$lang_en = get("lang-en");
$lang_de = get("lang-de");
$lang_fr = get("lang-fr");
$lang_es = get("lang-es");
if ( $lang_en ) { array_push($languages, "English"); };
if ( $lang_de ) { array_push($languages, "German"); };
if ( $lang_fr ) { array_push($languages, "French"); };
if ( $lang_es ) { array_push($languages, "Spanish"); };
$interpreter = get("interpreter");
if ( $interpreter ) {
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
		if ( $to_lang_de ) { array_push($interprets, "from English to German"); };
		if ( $to_lang_fr ) { array_push($interprets, "from English to French"); };
		if ( $to_lang_es ) { array_push($interprets, "from English to Spanish"); };
	}
	if ( $from_lang_de ) {
		if ( $to_lang_en ) { array_push($interprets, "from German to English"); };
		if ( $to_lang_fr ) { array_push($interprets, "from German to French"); };
		if ( $to_lang_es ) { array_push($interprets, "from German to Spanish"); };
	}
	if ( $from_lang_fr ) {
		if ( $to_lang_en ) { array_push($interprets, "from French to English"); };
		if ( $to_lang_de ) { array_push($interprets, "from French to German"); };
		if ( $to_lang_es ) { array_push($interprets, "from French to Spanish"); };
	}
	if ( $from_lang_es ) {
		if ( $to_lang_en ) { array_push($interprets, "from Spanish to English"); };
		if ( $to_lang_de ) { array_push($interprets, "from Spanish to German"); };
		if ( $to_lang_fr ) { array_push($interprets, "from Spanish to French"); };
	}
}

// MEALS

$meals = array();
if ( get("lunch-fr") ) { array_push($meals, "Friday Lunch"); };
if ( get("dinner-fr") ) { array_push($meals, "Friday Dinner"); };
if ( get("lunch-sa") ) { array_push($meals, "Saturday Lunch"); };
if ( get("dinner-sa") ) { array_push($meals, "Saturday Dinner"); };

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
if( get("prog-snack") ) { array_push($participation, "the snack on Sunday"); };

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
if ( $payment == "otherpayer" ) {
	$paying_person = get("paying-person");
	$payment_method = $paying_person;
} elseif ( $payment == "selfpayment") {
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

$accommodation_help = get("accommodation-help");
if ( $accommodation_help == "yes") { 
	$accommodation_help = true;
} elseif ( $accommodation_help == "no" ) {
	$accommodation_help = false;
}

if ( $accommodation_help ) {
	$budget = get("budget");
	$doubles = get("doubles");
	if ( $doubles == "choice" ) { $doubles = get("roommate"); };
	$accommodation_friend_1 = get("accommodation-friend-1");
	$accommodation_friend_2 = get("accommodation-friend-2");
	$accommodation_friends = array();
	if ( $accommodation_friend_1 ) { array_push($accommodation_friends, $accommodation_friend_1); };
	if ( $accommodation_friend_2 ) { array_push($accommodation_friends, $accommodation_friend_2); };
	$accommodation_wishes = get("accommodation-wishes");
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
	$billing_address_full = $billing_address;
	if ( !empty($billing_address_2) ) { $billing_address_full .= ", ".$billing_address_2; };
}

// ARRIVAL & DEPARTURE

$arrival = get("arrival");
$departure = get("departure");
$needs_invitation = get("invitation");


// VALIDATION

include("config.php");
$SQL = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME) or die("MYSQL con failed: ".mysqli_error($SQL));
$SQL->set_charset("utf8");

$valid = false;

if ( $first_name == false or $last_name == false ) {
	$valid = false;
	$error = "Your name is incomplete!";
} elseif ( $address == false or $post_code == false or $city == false or $country == false ) {
	$valid = false;
	$error = "Your address is incomplete!";
} elseif ( $email == false ) {
	$valid = false;
	$error = "You didn't specify and email!";
} elseif ( !$u16 and $payment == false ) {
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

// SAVE TO DATABASE 

if ( $valid ) {

	$error = "";
	$success = false;
	function error_db_handling($result) {
		global $query;
		global $success;
		global $error;
		global $SQL;
		if ( $result == 0 ) { 
			$error = "We have some problem saving to our database. We are working to fix it. Please send us a mail with this error code to registration@ifor.org: <br>";
			$error2 = $SQL->error;
			$error2 .= "<br> Query:".$query; 
			$success = false;
		} elseif ( $result == 1 ) { 
			$success = true; 
		};
	}

	// REGISTRATION DB
	$query = " INSERT INTO registration (id, first_name, last_name, birthday, gender, address, address_2, city, post_code, state, country, tel, mobile, skype, email, languages, organization, responsibility, interpreter, meals, food, participation, cloth, days, u16, fee, paying_method, payment_amount, paying_for, council_participitation, accommodation_help, arrival, departure, invitation) VALUES ('$id', '$first_name', '$last_name', '$birthday', '$gender', '$address', '$address_2', '$city', '$post_code', '$state', '$country', '$tel', '$mobile', '$skype', '$email', '".english_out($languages)."', '$organization', '".english_out($responsibility)."', '".english_out($interpreter)."', '".english_out($meals)."', '$food', '".english_out($participation)."', '".english_out($cloth)."', '".english_out($days)."', '".english_out($u16)."', '$fee', '$payment_method', '$payment_amount', '".english_out($paying_for)."','".english_out($council_participitation)."', '".english_out($accommodation_help)."', '$arrival', '$departure', '".english_out($needs_invitation)."') ";
	$result = $SQL->query($query);
	error_db_handling($result);

	// RESPONSIBILITIES DB
	if ( $success and $responsibility ) {
		$query = " INSERT INTO responsibilities (id, name, responsibility_1, responsibility_2, responsibility_3) VALUES ('$id', '$name', '$responsibility_1', '$responsibility_2', '$responsibility_3') ";
		$result = $SQL->query($query);
		error_db_handling($result);
	}

	// INTERPRETATION DB
	if ( $success and $interpreter ) {
		$interpr_binary_list = ""; 
		function construct_interpretation_query($test_str) {
			global $interpr_binary_list;
			global $interprets;
			$interpr_binary_list .= in_array_binary_string($test_str, $interprets);
		}
		construct_interpretation_query("from English to German");
		construct_interpretation_query("from English to French");
		construct_interpretation_query("from English to Spanish");
		construct_interpretation_query("from German to English");
		construct_interpretation_query("from German to French");
		construct_interpretation_query("from German to Spanish");
		construct_interpretation_query("from French to English");
		construct_interpretation_query("from French to German");
		construct_interpretation_query("from French to Spanish");
		construct_interpretation_query("from Spanish to English");
		construct_interpretation_query("from Spanish to German");
		construct_interpretation_query("from Spanish to French");
		$query = " INSERT INTO interpretation (id, name, en_de, en_fr, en_es, de_en, de_fr, de_es, fr_en, fr_de, fr_es, es_en, es_de, es_fr) VALUES ('$id', '$name' $interpr_binary_list) ";
		$result = $SQL->query($query);
		error_db_handling($result);
	}

	// PARTICIPATION DB 
	if ( $success and $interpreter ) {
		$partic_binary_list = "";
		function construct_participation_query($test_str) {
			global $partic_binary_list;
			global $participation;
			$partic_binary_list .= in_array_binary_string($test_str, $participation);
		}
		construct_participation_query("Nonviolence in Action");
		construct_participation_query("City Tour");
		construct_participation_query("Celebration");
		construct_participation_query("IFOR in Action");
		construct_participation_query("Concert");
		construct_participation_query("Interfaith Celebration");
		construct_participation_query("the snack on Sunday");
		if ( $cloth ) {
			$partic_binary_list .= ", 1";
		} else {
			$partic_binary_list .= ", 0";
		}
		$query = " INSERT INTO participation (id, friday, tour, celeb, saturday, concert, faith, snack, cloth) VALUES ('$id' $partic_binary_list) ";
		$result = $SQL->query($query);
		error_db_handling($result);
	}

	// LANGUAGES DB
	if ( $success and $interpreter ) {
		$lang_binary_list = "";
		function construct_language_query($lang) {
			global $languages;
			global $lang_binary_list;
			global $participation;
			if ( in_array($lang, $languages) ) {
				$lang_binary_list .= ", 1";
				$lang_binary_list .= in_array_binary_string("City Tour", $participation);
				$lang_binary_list .= in_array_binary_string("Nonviolence in Action", $participation);
				$lang_binary_list .= in_array_binary_string("Celebration", $participation);
				$lang_binary_list .= in_array_binary_string("IFOR in Action", $participation);
				$lang_binary_list .= in_array_binary_string("Interfaith Celebration", $participation);
			} else {
				$lang_binary_list .= ", 0, 0, 0, 0, 0, 0";
			}
		}
		construct_language_query("English");
		construct_language_query("German");
		construct_language_query("French");
		construct_language_query("Spanish");
		$query = " INSERT INTO languages (id, en, tour_en, friday_en, celeb_en, saturday_en, faith_en, de, tour_de, friday_de, celeb_de, saturday_de, faith_de, fr, tour_fr, friday_fr, celeb_fr, saturday_fr, faith_fr, es, tour_es, friday_es, celeb_es, saturday_es, faith_es) VALUES ('$id' $lang_binary_list) ";
		$result = $SQL->query($query);
		error_db_handling($result);
	}

	// FOOD DB
	if ( $success ) {
		function construct_food_query() {
			global $meals;
			$binary_list = ", 1";
			$binary_list .= in_array_binary_string("Friday Lunch", $meals);
			$binary_list .= in_array_binary_string("Friday Dinner", $meals);
			$binary_list .= in_array_binary_string("Saturday Lunch", $meals);
			$binary_list .= in_array_binary_string("Saturday Dinner", $meals);
			return $binary_list;
		}
		$zero_binary_list = ", 0, 0, 0, 0, 0";
		if ( $food == "everything" ) {
			$food_binary_list = construct_food_query();
			$food_binary_list .= $zero_binary_list;
			$food_binary_list .= $zero_binary_list;
			$food_binary_list .= ", ''";
		} elseif ( $food == "vegetarian" ) {
			$food_binary_list = $zero_binary_list;
			$food_binary_list .= construct_food_query();
			$food_binary_list .= $zero_binary_list;
			$food_binary_list .= ", ''";
		} elseif ( $food == "vegan" ) {
			$food_binary_list = $zero_binary_list;
			$food_binary_list .= $zero_binary_list;
			$food_binary_list .= construct_food_query();
			$food_binary_list .= ", ''";
		} else {
			$food_binary_list = $zero_binary_list;
			$food_binary_list .= $zero_binary_list;
			$food_binary_list .= $zero_binary_list;
			$food_binary_list .= ", '$food'";
		}
		$query = " INSERT INTO food (id, omni, lu_fr_omni, di_fr_omni, lu_sa_omni, di_sa_omni, vegy, lu_fr_vegy, di_fr_vegy, lu_sa_vegy, di_sa_vegy, vega, lu_fr_vega, di_fr_vega, lu_sa_vega, di_sa_vega, other) VALUES ('$id' $food_binary_list) ";
		$result = $SQL->query($query);
		error_db_handling($result);
	}

	// ACCOMODATION DB
	if ( $success and $accommodation_help ) {
		$query = " INSERT INTO accommodation (id, name, email, budget, doubles, accommodation_friend_1, accommodation_friend_2, accommodation_wishes, billing_name, billing_address, billing_address_2, billing_city, billing_post_code, billing_state, billing_country) VALUES ('$id', '$name', '$email', '$budget', '$doubles', '$accommodation_friend_1', '$accommodation_friend_2', '$accommodation_wishes', '$billing_name', '$billing_address', '$billing_address_2', '$billing_city', '$billing_post_code', '$billing_state', '$billing_country') ";
		$result = $SQL->query($query);
		error_db_handling($result);
	}

	// COUNCIL DB
	if ( $success and $council ) {
		if ( $council_payment == "IFOR" ) {
			$council_financial_aid = true;
		} elseif ( $council_payment == "self" ) {
			$council_financial_aid = false; 
		}
		$query = " INSERT INTO council (id, name, email, delegating, financial_aid, council_only) VALUES ('$id', '$name', '$email', '$delegating', '".english_out($council_financial_aid)."', '".english_out($council_only)."') ";
		$result = $SQL->query($query);
		error_db_handling($result);
	}
}

mysql_close($con);


if ( $success ) {
	
	// COMPILE CONFIRMATION TEXT

	$confirm = "Dear $name, \n\n";
	$confirm .= "Your registration for the IFOR Centennial has successfully been submitted. We have stored the following information in our database: \n\n";

	$confirm .= "You are $name, born $birthday, $gender. ";
	$confirm .= "You live at $address_full, $city, $post_code, $state, $country. ";
	$confirm .= "We can contact you at ".english_out($contact).". ";
	$confirm .= "You speak ".english_out($languages).".\n\n";

	if ( !empty($organization) or $responsibility or $interpreter ) {
		if ( !empty($organization) ) { $confirm .= "You come from $organization. "; };
		if ( $responsibility ) { $confirm .= "You have overtaken the following responsibilities: ". english_out($responsibilities).". "; };
		if ( $interpreter ) { $confirm .= "You are willing to translate ".english_out($interprets)."."; };
		$confirm .= "\n\n";
	}

	if ( !empty($meals) ) { $confirm .= "You have booked ".english_out($meals)." and eat $food. \n\n"; };

	if ( !empty($participation) ) { 
		$confirm .= "You will participate in ".english_out($participation).""; 
		if ( $cloth ) { $confirm .= ", and will bring a piece of cloth"; };
		$confirm .= ". \n\n";
	};

		if ( $council ) {
		$confirm .= "You will attend the IFOR Council from August 3-9 as a ";
		if ( $delegating == "guest" ) { 
			$confirm .= "guest. ";
		} else {
			$confirm .= "delegate for $delegating. "; 
		}
		if ( $council_only ) { $confirm .= "You will not attend the Centennial but are just coming for the Council. "; };
		if ( $council_payment == "IFOR" ) {
			$confirm .= "You will apply for financial aid from IFOR. Please visit www.ifor.org/council for more information. ";
		} elseif ( $council_payment == "self" ) {
			if ( $council_only ) {
				$confirm .= "You will pay the full participation fee for the Council of €750 (+€360 for a single room). This includes 6 nights in a hotel with full board and all participation fees. ";
			} else {
				$confirm .= "You will pay the full participation fee for the Council and Centennial of €1000 (+€480 for a single room). This includes 8 nights in a hotel with full board and all participation fees. ";
			}
		}
		$confirm .= "\n\n";
	}

	if ( !$u16 ) {
		$confirm .= "Your Centennial participation fee";
		if ( !empty($days) ) { $confirm .= " for ".english_out($days); };
		$confirm .= " is €$fee. ";
		if ( $payment == "otherpayer" ) {
			$confirm .= "Please make sure the full indicated amount of €$payment_amount will be paid for you by $payment_method. ";
		} elseif ( $payment == "selfpayment" ) {
			if ( $payment_method == "wire" ) {
				$confirm .= "Please wire the full amount of €$payment_amount to the following account: BIC: INGBNL2A, IBAN: NL11 INGB 0002 7041 82, indicating “IFOR Centennial 2014” as the subject. ";
			} elseif ( $payment_method == "paypal" ) {
				$confirm .= "Please visit www.centennial.ifor.org/payment to pay the full amount of €$payment_amount with credit card / PayPal.";
			} elseif ( $payment_method == "cash" ) {
				$confirm .= "Make sure you will be able to pay the full amount of €$payment_amount in cash at the registration desk in Konstanz. ";
			}
		if ( $paying_for_others ) { $confirm .= "This includes the fees for ".english_out($paying_for).", whom you also indicated to pay for. "; }
		}
		$confirm .= "\n\n";
	}

	if ( $accommodation_help ) {
		if ( $council ) {
			$confirm .= "You will be accommodated together with the other Council members. ";
		} else {
			$confirm .= "IFOR will help you find an accommodation within your budget of €$budget. ";
		}
		if ( $doubles == "single" ) {
			$confirm .= "You will get a single room and are willing to pay a surcharge of up to 70% for that. ";
		} else {
			$confirm .= "You will be accommodated in a double room with ";
			if ( $doubles == "IFOR-pick" ) { 
				$confirm .= "a random person, whom IFOR will choose for you. "; 
			} else {
				$confirm .= "$doubles, if possible. ";
			}
		}
		if ( !empty($accommodation_friends) ) { $confirm .= "We will try to accommodate you in one hotel together with ".english_out($accommodation_friends).". You leave the choice of accommodation to IFOR in the case of differing budget categories from these people. "; };
		if ( !empty($accommodation_wishes) ) { $confirm .= "We will try to fulfill your following wishes: $accommodation_wishes. "; };
		$confirm .= "We will send the bill for the accommodation to $billing_name, $billing_address_full, $billing_city, $billing_post_code, $billing_state, $billing_country.\n\n";
	}

	$confirm .= "You indicated that you will arrive on $arrival and leave on $departure. \n\n";

	if ( $needs_invitation ) { $confirm .= "We will send you an official invitation for your visa application. If you have any special requirements for that, please send an email to registration@ifor.org. \n\n"; };

	$confirm .= "With best wishes,\n";
	$confirm .= "The Centennial Team";

	// SEND CONFIRMATION MAIL
	$mail_headers = "From: IFOR Centennial Registration <registration@ifor.org>";
	$mail_to = $email;
	$mail_subject = "IFOR Centennial Registration";
	mail($mail_to, $mail_subject, $confirm, $mail_headers);
}



?>



<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>IFOR Centennial Registration</title>
	<script src="http://use.edgefonts.net/open-sans:n7,i7,n8,i8,i4,n3,i3,n4,n6,i6:all.js"></script>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/form.css">
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
	<main class="form">
		<?php 
		if ( !$valid or !$success) {
			echo "<h1>Registration Failed!</h1>";
			echo "<h2>$error<h2>";
			echo "<p>$error2</p>";
		} else {
			echo "<h1 class='form-title'>You have Registered.</h1>";
			echo "<h2 class='form-title-2'>Your data was saved in our database and we have sent the following confirmation email to $email.</h2>";
			echo "<section class='top-bottom' style='margin-bottom: 1em; padding-bottom: 2.5em; padding-top: 2.5em;'>";
			echo "<p>".nl2br($confirm)."</p>";
			echo "</section>";
			echo "<a class='redirect' href='http://centennial.ifor.org'>Go back to the Centennial homepage.</a>";
			if ( $payment_method == "paypal" ) {
				echo "<a class='redirect' href='../payment/index.php?amount=$payment_amount&first_name=$first_name&last_name=$last_name&address=$address&address_2=$address_2&city=$city&post_code=$post_code&email=$email'>Pay now via credit card / PayPal.</a>";
			}
			if ( $council_payment == "IFOR" ) {
				echo "<a class='redirect' href='http://ifor.org/council'>Apply for financial aid for the IFOR Council now.</a>";
			}
		}
		 ?>
	</main>
</body>