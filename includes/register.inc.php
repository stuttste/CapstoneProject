<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
 
$error_msg = "";
 
if (isset($_POST['username'], $_POST['email'], $_POST['p'], $_POST['Fname'], $_POST ['Lname'], $_POST ['State'], $_POST['Univ'])) {
    // Sanitize and validate the data passed in
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
		  $Fname = filter_input(INPUT_POST, 'Fname', FILTER_SANITIZE_STRING);
	    $Lname = filter_input(INPUT_POST, 'Lname', FILTER_SANITIZE_STRING);
		  $State = filter_input(INPUT_POST, 'State', FILTER_SANITIZE_STRING);
		    $Univ = filter_input(INPUT_POST, 'Univ', FILTER_SANITIZE_STRING);
}
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<p class="error">The email address you entered is not valid</p>';
    }

    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
 
    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //
 
    $prep_stmt = "SELECT id FROM MEMBERS WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
   // check existing email  
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= '<p class="error">A user with this email address already exists.</p>';
                        $stmt->close();
        }
                $stmt->close();
    } else {
        $error_msg .= '<p class="error">Database error Line 39</p>';
                $stmt->close();
    }
 
    // check existing username
    $prep_stmt = "SELECT id FROM MEMBERS WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
 
                if ($stmt->num_rows == 1) {
                        // A user with this username already exists
                        $error_msg .= '<p class="error">A user with this username already exists</p>';
                        $stmt->close();
                }
                $stmt->close();
        } else {
                $error_msg .= '<p class="error">Database error line 55</p>';
                $stmt->close();
        }
 
    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.
 
    if (empty($error_msg)) {
        // Create a random salt
        //$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE)); // Did not work
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
		
		$normPass = $password;
        // Create salted password 
        $password = hash('sha512', $password . $random_salt);
 
        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO MEMBERS (Username, Email, Password, Salt,Fname,Lname,State,University) VALUES ($username, $email, $password, $random_salt,$Fname,$Lname,$State,$Univ)")) {
		$insert_stmt->bind_param( $username, $email, $password, $random_salt,$Fname,$Lname,$State,$Univ);}
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            } else{
				$to			= $email;
				$subject 	= 'PET Account Verification';
				$message	= '
				Thanks for creating an account!
				Before you can login, please follow the link below to activate your account.
				
				------------------------------
				Email: '.$email.'
				Password: '.$normPass.'
				------------------------------
				
				Activation link:
				http://g3cap.tk/staging/verify.php?email='.$email.'&hash='.$random_salt.'
				';
				
				$headers = 'From:stuttste@gmail.com'."\r\n";
				mail($to, $subject, $message, $headers);
				}
			
        header('Location: ./register_success.php');
    }

?>