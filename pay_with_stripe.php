<?php 
	require_once 'config.php'; 
	header('Content-Type: text/javascript');
?>

function upgradeError(message) {
	console.log(message);
}

function processUpgrade(token, payFrom) {
	var upgradeData = {
		newLevel: 2,
		plan: 'standard',
		stripeToken: token.id,
		email: token.email,
	};
	
	$.post("upgrade_ajax.php", upgradeData, function(data, textStatus, jqXHR){
		if(data.status === "SUCCESS") {
			if (payFrom === "SIGNUP") {
				signupClose();
				openMessage("Welcome!", "You have successfully signed up with GiveToken.  An activation email has been sent to "+upgradeData.email+".  Please activate your account before logging in.");
			} else {
				location.reload();
			}
		} else if (data.status === "ERROR") {
			upgradeError("Upgrade failed: "+data.message);
		}  else {
			upgradeError("Upgrade failed: unknown data.status");
		}
	}).fail(function() {
		upgradeError("Upgrade failed!");
	});
}

function payWithStripe(email, payFrom) {
	
	var handler = StripeCheckout.configure({
		key: '<?php echo $stripe_publishable_key ?>',
//		image: '../images/logoicon.png',
		email: email,
		token: function(token) {
			processUpgrade(token, payFrom);
		}
	});

	// Open Checkout with further options
	handler.open({
		name: 'GiveToken',
		description: "GiveToken Standard ($24.99/month)",
		amount: 2499
	});
}
