<?php 
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

$amount = get("amount");
$pattern = "/^[0-9]+(\.[0-9]{2})?$/";
if ( !preg_match($pattern, $amount) ) { $amount = false; };

$first_name = get("first_name");
$last_name = get("last_name");
$address = get("address");
$address_2 = get("address_2");
$city = get("city");
$post_code = get("post_code");
$email = get("email");

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="http://use.edgefonts.net/open-sans:n7,i7,n8,i8,i4,n3,i3,n4,n6,i6:all.js"></script>
	<link rel="stylesheet" href="../css/form.css">
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
	<main class="form">
		<h1 class="form-title">Registration Fee Payment</h1>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<section class="top-bottom">
				<h3>Pay with PayPal / Credit Card</h3><br>
				<p>
					Please pay your centennial fee<?php if ( $amount ) { echo " of &euro;$amount"; } ?> through PayPal.
				</p>
				<p>
					You do not need to create a PayPal account to pay with your credit card, PayPal allows you to pay with your credit card without creating an account. Of course you can use an existing PayPal account. 
				</p>
				<!-- PayPal General -->
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="business" value="finance@ifor.org">
				<input type="hidden" name="lc" value="US">
				<input type="hidden" name="charset" value="utf-8">
				<input type="hidden" name="bn" value="IFOR_BuyNow_CentennialFee_Netherlands">
				<!-- Item Options -->
				<input type="hidden" name="return" value="http://centennial.ifor.org/payment/thanks">
				<input type="hidden" name="cancel_return" value="http://centennial.ifor.org/payment/canceled">
				<input type="hidden" name="rm" value="1">
				<input type="hidden" name="item_name" value="IFOR Centennial Registration Fee">
				<input type="hidden" name="item_number" value="centennial">
				<input type="hidden" name="no_shipping" value="1">
				<input type="hidden" name="currency_code" value="EUR">
				<!-- Payment Amount -->
				<?php  if ( $amount ) { echo '<input type="hidden" name="amount" value="'.$amount.'">'; } ?>
				<!-- Autofil Address -->
				<input type="hidden" name="address_override" value="1">
				<?php  if ( $first_name ) { echo '<input type="hidden" name="first_name" value="'.$first_name.'">'; } ?>
				<?php  if ( $last_name ) { echo '<input type="hidden" name="last_name" value="'.$last_name.'">'; } ?>
				<?php  if ( $address ) { echo '<input type="hidden" name="address1" value="'.$address.'">'; } ?>
				<?php  if ( $address_2 ) { echo '<input type="hidden" name="address2" value="'.$address_2.'">'; } ?>
				<?php  if ( $city ) { echo '<input type="hidden" name="city" value="'.$city.'">'; } ?>
				<?php  if ( $post_code ) { echo '<input type="hidden" name="zip" value="'.$post_code.'">'; } ?>
				<?php  if ( $email ) { echo '<input type="hidden" name="email" value="'.$email.'">'; } ?>
			</section>
			<input type="submit" name="submit" id="submit" value="Pay">
		</form>
	</main>
</body>
</html>