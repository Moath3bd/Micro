<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection logic here
    // Replace the following lines with your actual database connection code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "microe";
    $result = mysql_query($conn, $query) or die(mysql_error($conn, $query));

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    // Retrieve user input
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id=$_POST['id'];
    $name=$_POST['name'];

    // Validate user credentials (you should hash passwords in a real-world scenario)
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = :email AND password = :password AND id=:id AND ame=:name");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password); // Note: You should hash the password in a real-world scenario
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Valid credentials, start a session
        $_SESSION['email'] = $email;
        header("Location: dashboard.php"); // Redirect to the dashboard or another authenticated page
    } else {
        // Invalid credentials, display an error message
        echo "Invalid email or password";
    }


    if ($result) {
        $user = mysql_fetch_assoc($result);
        $rows = mysql_num_rows($result);

        if ($rows == 1) {
            $_SESSION['name'] = $name;

            // Check user role and redirect accordingly
            if ($user['rule'] == 0) {
                header("Location: index.php");
                exit();
            } elseif ($user['rule'] == 1) {
                header("Location: Admin/index.php");
                exit();
            } else {
                // Handle other roles or show an error message
                echo "<div class='form'>
                      <h3>Invalid User Role.</h3><br/>
                      <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                      </div>";
            }
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="loginPageCss.css">
</head>
<body>
<img class="wave" src="media/wave (2).png" alt="wave">
	<div class="container">
		<div class="img">
			<img src="media/bg.png" alt="bg">
		</div>
		<div class="login-content">
			<form>
				<img src="media/avatar.png">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>email</h5>
           		   		<input type="email" class="input" name="email" id="email">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password" id="password">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" class="btn" value="Login" id="submitBtn">
                <p id="alret" style="color:red;"></p>
            </form>
        </div>
    </div>
</body>
</html>
