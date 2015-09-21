<?php

$conn = NULL;

$DEBUG = false;

if($DEBUG === true) echo "loaded db.php<br>";

//check for form submission
if(isset($_POST)) {
	if($DEBUG === true) echo "post array is set<br>";
	if(isset($_POST['lazy-email']) && isset($_POST['lazy-password'])) {
		if($DEBUG === true) echo "username and password are set<br>";
		//both reg and login share the above fields. Now differentiate
		if(isset($_POST['lazy-password-conf'])) {
			if($DEBUG === true) echo "need to register<br>";
			register();
		}
		else {
			login();
		}
	}
}

/** 
 * @method is_logged_in
 * @description check if $_SESSION has a login variable
 * @returns {Boolean} if variable exists, return true, else false
 */
function is_logged_in() {
	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
		return true;
	}
	return false;
}

/** 
 * @method sanitize
 * @link http://code.tutsplus.com/tutorials/sanitize-and-validate-data-with-php-filters--net-2595
 * @description clear out hacker stuff from form ($_POST) and query string ($_GET) input
 * @param {String} $var input variable
 * @returns {String|false} if cleaned, return string, otherwise return a false
 */
function sanitize ($var) {
	if(strlen($var) > 1000) { //too big
		return false;
	}
	//clear out hacker junk
	$cleaned = filter_var($var, FILTER_SANITIZE_STRING);
	return $cleaned;
}

/** 
 * @method db_connect
 * @description connect to the database
 */
function db_connect () {
	if($DEBUG === true) echo "entering db_connect()<br>";
	
	global $conn; //ONLY in PHP do you have to declare global variables in functions
	$conn = mysqli_connect("localhost", "artwal", "artwal", "artwal");

	//check connection
	if (mysqli_connect_errno()) {
  		if($DEBUG === true) echo "Failed to connect to MySQL: " . mysqli_connect_error();
		return false;
	} else {
		if($DEBUG === true) echo "connected succesffuly<br>";
	}
	return true;
}

/** 
 * @method db_disconnect
 * @description disconnect from the database
 */
function db_disconnect () {
	global $conn;
	mysqli_close($conn);
	$conn = NULL;
}

/** 
 * @method register
 * @description register a new user, via a form
 */
function register() {
	$name = sanitize($_POST['lazy-name']);
	$email = sanitize($_POST['lazy-email']);
	$password = sanitize($_POST['lazy-password']);
	$password_conf = sanitize($_POST['lazy-password-conf']);
	//create new user record, add info

	if(db_connect()) {
		$sql = "INSERT INTO `artwal`.`Users` (`user_id`, `screenname`, `password`, `first_name`, `last_name`, `email`) VALUES (NULL, '$name', '$password', '', '', '$email')";

		$query = mysqli_query($conn, $sql);

		//auto login if registered
		if($query == true) {
			$_SESSION['logged_in'] = true;
		}
	}
}

/** 
 * @method login
 * @description login to existing account, via a form
 */
function login () {
	global $conn;
	if($DEBUG === true) echo "in login()<br>";
	//get users input
	$email = sanitize($_POST['lazy-email']);
	$password = sanitize($_POST['lazy-password']);

	if($DEBUG === true) echo "email is $email and password is $password<br>";
	
	//check email and password, log in if OK
	if(db_connect()) {
		//check for username and password in Users table
		$sql = "SELECT * FROM Users WHERE email='$email' AND password='$password'";
		if($DEBUG === true) echo "sql=$sql<br>";
		$query = mysqli_query($conn, $sql);
		// if($DEBUG === true) echo "msqli query returns:".$query."<br>";
		//if it exists, we will enter the while() loop
		while($result = mysqli_fetch_array($query)) {
			if($DEBUG === true) echo "entered mysql_fetch_array loop<br>";
			//if($DEBUG === true) echo "Username:".$result["username"]; //DEBUG ONLY!!!!!!!!!
			$_SESSION['logged_in'] = true; //this is what is used by function is_logged_in()
		}
	}
	if($DEBUG === true) echo "login complete<br>";
	db_disconnect();
}

/** 
 * @method logout
 * @description logout of account
 */
function logout() {
	$_SESSION['logged_in'] = false; //sets logged in state to false
	session_destroy(); //kills session array
}

/** 
 * @method post
 * @description add a post to a user account
 */
function post () {
	//if looged in, make a SQL query to add data tot he 'posts' table
	//very similar to the regsister() function
}

?>
