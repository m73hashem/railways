<?php 
	session_start();
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	unset($_SESSION['log']);
  	unset($_SESSION['userid']);
  	unset($_SESSION['usermail']);
  	header("location: ../home_page.php");
  }


	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', 'pw', 'railways'); //pw is mysql password if not exists set to ''

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username1']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 !== $password_2) {
			array_push($errors, "The two passwords do not match");
		}
        /*
        //Check if a value exists in a table
function record_exists ($con,$table, $column, $value) {
    $checkQuery = "SELECT $column FROM {$table} WHERE {$column} = {$value}";
    $result = mysqli_query($con,$checkQuery);
    if (mysqli_num_rows($result)>0) 
    {return TRUE;} 
    else {
        return FALSE;
    }
}
        //check mail
        if (record_exists ($db, 'users', 'email', $email))
        {array_push($errors, "email used");}
        */
        
    $checkQuery = "SELECT email FROM users WHERE email = '".$email."'";
    $result = mysqli_query($db,$checkQuery);
        if (mysqli_num_rows($result) > 0){
        array_push($errors, "the email is used");}
    
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			$_SESSION['log']=true;
            //header('location: index.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);
			$query2 = "SELECT user_id FROM users WHERE username='$username' AND password='$password'";
			$res = mysqli_query($db, $query2);//get user id
            $value = mysqli_fetch_object($res);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
                $_SESSION['log'] = true;
                $_SESSION['userid'] = $value->user_id;//////////////////////////////////
                //////////////////////////////
				//header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

//////////


?>