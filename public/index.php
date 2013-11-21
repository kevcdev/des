<?php 
// controller
	require_once("../classes/class.Authentication.php");
	require_once("../classes/class.Session.php");

	$Session		= new TSession();
	$Authentication = new TAuthentication();

	$ControllerVars['loggedin'] = 0;

	if ($Authentication->isAuthorized()) {
		//logged in
//		echo "You are logged in. <br />";
		$ControllerVars['loggedin'] = 1;
	} else {
		//not logged in
//		echo "You are not logged in.<br />";
				
		if ($_POST['submit'] == 'Submit') {
			if ($Authentication->checkUserPass()) {
//				echo 'Logged in!';
				$ControllerVars['loggedin'] = 1;
				$Authentication->successfulLogin();
			} else {
				$Authentication->failedLogin();
//				echo 'Login Failure.';
			}
		} else {
			echo "You are not logged in.<br />";
		}

//		$_SESSION['loggedin'] = 1;

// Now we know users are loggedin.
	}
	echo "Login status is: ".$ControllerVars['loggedin'];

if ($ControllerVars['loggedin'] == 0) {
	$content = file_get_contents("../templates/loginform.html");
	echo $content;
}
die;


	if ($_SERVER['REQUEST_URI'] != '/') {
		preg_match('!name/[a-z]+)!imsx', $_SERVER['REQUEST_URI'], $pmatches);


		$content = file_get_contents("../templates/index.html"); 
		$content = str_replace('{text}', 'Hello '.$pmatches, $content);
		echo $content;
	} else {
		echo "Not on homepage.<br>";
	}
//	echo ($SERVER['REQUEST_URI'];
?>
