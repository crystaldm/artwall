<?php

// $conn = NULL;

//check for form submission
// if(isset($_POST)) {
// 	// if(isset($_POST['lazy-email']) && isset($_POST['lazy_password'])) {
// 	// 	//both reg and login share the above fields. now differenciate
// 	// 	if(isset($_POST['lazy-password-conf'])) {
// 	// 		register();
// 	// 	} else {
// 	// 		login();
// 	// 	}
// 	// }
// }

/**
* @method is_logged_in
* @description check if $_SESSION has a login variable
* @returns {Boolean} if variable exists, return true, else false
*/
function is_logged_in() {
	return true;
	echo "in::is_logged_in()";
	// if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
	// 	return true;
	// } else {
	// 	return false;
	// }
}

/**
* @method sanitize
* @description clear out hacker stuff from form ($_POST) and query string ($_GET) input
* @param {String} $var input variable
* @returns {String|false} si cleaned, return string, otherwise return a false
*/
function sanitize($var) {
	if(strlen($var) > 1000) { //too long
		return false;
	}
	//clear out hacker junk
	$cleaned = filter_var($str, FILTER_SANITIZE_STRING);
	return $cleaned;
}

/**
* @method db_connect
* @description connect to database
*/
function db_connect() {
	// global $conn; //have to declare global vars in functions
	// $conn = mysqli_connect("localhost","artwall","artwall","artwall");
	//
	// // Check connection
	// if (mysqli_connect_errno())
	//   {
	// 	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	// 	  return false;
	//   }
	//   return true;
}

/**
* @method db_disconnect
* @description disconnect from database
*/
function db_disconnect() {
	// global $conn;
	// mysqli_close($conn);
	// $conn = NULL;
}

/**
* @method register
* @description register a new user
*/
function register() {
	// $name = sanitize($_POST['lazy-name']);
	// $email = sanitize($_POST['lazy-email']);
	// $password = sanitize($_POST['lazy-password']);
	// $password_conf = sanitize($_POST['lazy-password-conf']);
	// //create new user record, add info
}

/**
* @method login
* @description login to existing account, via a form
*/
function login() {
	// $email = sanitize($_POST['lazy-email']);
	// $password = sanitize($_POST['lazy-password']);
	// //check email and password, log in if OK
	// if(db_connect()) {
	// 	$sql = "SELECT * FROM Users WHERE email=$email AND password=$password";
	// 	$query = mysqli_query($con, $strSQL);
	// 	//if it exists, we will enter the while() loop
	// 	while($result = mysqli_fetch_array($query)) {
	// 		//echo "Username:".$result["username"]; //DEBUG ONLY!!!
	// 		$_SESSION['logged_in'] = true; //this is what is used by function is_logged_in();
	// 	}
	// }
	// db_disconnect();
}

/**
* @method post
* @description login to existing account, via a form
*/
function post() {
}

?>
