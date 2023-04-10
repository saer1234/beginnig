
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link href="login1.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="login">
<h2>Login</h2>
    <form class="login-body"method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <?php
session_start();

// Check if user is already logged in, if yes then redirect to dashboard
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard_".$_SESSION['status'].".php");
    exit;
}

// Check if form has been submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate input
    if (empty($username) || empty($password)) {
        echo "<label class='extra-message'>Please enter both username and password.</label>";
    } else {
        require_once "connect.php";
        // Sanitize input
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        // Hash password
        $password = md5($password);
        $count=0;
		$list = array("client","it","manager","employee");
		while($count!=4){
			$table =$list[$count];
        // Query database for user
        $sql = "SELECT * FROM $table WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $ro= mysqli_fetch_assoc($result);
            // User found, store user information in session and redirect to dashboard
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["id"]=$ro["ID"];
			$_SESSION["status"]=$list[$count];
            $sql="UPDATE $table SET status='online' where ID=".$ro['ID'];
            mysqli_query($conn,$sql);
            header("Location: dashboard_".$list[$count].".php");
            exit();
        } 
		$count++;
		}
            // User not found, display error message
            echo "<label class='extra-message'>Incorrect username or password.</label>";
        

        // Close database connection
        mysqli_close($conn);
    }
}
?>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" name="submit" value="Login"><br><br>
        <p>Don't have an account? <a href="sign-up.php">Sign up here</a>.</p>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
