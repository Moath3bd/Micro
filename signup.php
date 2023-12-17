
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection logic here
    // Replace the following lines with your actual database connection code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "your_database";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    // Retrieve user input
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Simple validation (you should implement more robust validation)
    if ($password != $confirm_password) {
        header("Location: signup.html?message=Passwords+do+not+match");
        exit();
    }

    // Hash the password (use password_hash() in a real-world scenario)
    $hashed_password = md5($password);

    // Insert user data into the database
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    
    try {
        $stmt->execute();
        header("Location: signup.html?message=Account+created+successfully");
        exit();
    } catch (PDOException $e) {
        header("Location: signup.html?message=Email+already+exists");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" type="text/css" href="assets/css/signupp.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
    <img class="wave" src="media/wave (2).png" alt="wave">
    <div class="container">
        <div class="img">
            <img src="media/bg.png" alt="bg">
        </div>
        <div class="signup-content">
            <form action="signup.php" method="post">
                <h2 class="title">Sign Up</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Name</h5>
                        <input type="text" class="input" name="name" required>
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="email" class="input" name="email" required>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i"> 
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" name="password" required>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i"> 
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Confirm Password</h5>
                        <input type="password" class="input" name="confirm_password" required>
                    </div>
                </div>
                <input type="submit" class="btn" value="Sign Up">
                <p id="alert" style="color:red;"><?php echo isset($_GET['message']) ? $_GET['message'] : ''; ?></p>
            </form>
        </div>
    </div>
</body>
</html>
