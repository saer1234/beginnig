<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
    <link href="sign-up.css" rel="stylesheet"/>
</head>
<body style="background-image: url('icon/login.jpg');background-repeat: no-repeat;background-size: cover;background-position: center;background-attachment: fixed;">
	<h2>Sign Up</h2>
	<form method="post" action="sign-up.php">
		<label for="email">Email:</label>
		<input type="email" id="email" name="email"><br><br>
		<label for="username">Username:</label>
		<input type="text" id="username" name="username"><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br><br>
		<label for="phone">Phone Number:</label>
		<input type="tel" id="phone" name="phone"><br><br>
		<label for="address">Address:</label>
		<input type="text" id="address" name="address"><br><br>
		<label for="city">City:</label>
		<input type="text" id="city" name="city"><br><br>
		<label for="zip">Zip Code:</label>
		<input type="text" id="zip" name="zip"><br><br>
		<input type="submit" name="submit" value="Sign Up">
        <button onclick="window.location.href='Login.php';">Go Back</button>
        
	<?php
	// Check if form has been submitted
	if (isset($_POST['submit'])) {
		// Retrieve form data
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$zip = $_POST['zip'];

		// Validate input
		if (empty($email) || empty($username) || empty($password) || empty($phone) || empty($address) || empty($city) || empty($zip)) {
			echo "<label class='extra-message'>Please fill in all required fields.</label>";
		} else {
			require_once "connect.php";  
			// Sanitize input
			$email = mysqli_real_escape_string($conn, $email);
			$username = mysqli_real_escape_string($conn, $username);
			$password = mysqli_real_escape_string($conn, $password);
			$phone = mysqli_real_escape_string($conn, $phone);
			$address = mysqli_real_escape_string($conn, $address);
			$city = mysqli_real_escape_string($conn, $city);
			$zip = mysqli_real_escape_string($conn, $zip);

			// Hash password
			$password = md5($password);

			// Query database to check if email or username already exist
			$sql = "SELECT * FROM client WHERE email='$email' OR username='$username'";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				// Email or username already exists, display error message
				echo "<label class='extra-message'>An account with this email or username already exists.</label>";
			} else {
				// Insert new user into database
				$sql = "INSERT INTO client(email,username, password, phone, address, city, zipCode) VALUES ('$email', '$username', '$password', '$phone', '$address', '$city', '$zip')";
				if (mysqli_query($conn, $sql)) {
					// User registered successfully, redirect to
                    echo "<label class='extra-message'>Registration successful!</label>";
                } else {
                    echo "<label class='extra-message'>Error: " . mysqli_error($conn)."</label>";
                }
            }
    
            // Close database connection
            mysqli_close($conn);
        }
    }
    ?>
       </form>
    </body>
<html>