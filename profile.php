
<?php
// Initialize variables with default values
$email = '';
$name = '';
$phone = '';
$password = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $phone = isset($_POST['Phone']) ? $_POST['Phone'] : '';
    $carPlate = isset($_POST['numberInput']) ? $_POST['numberInp9'] : '';

    // Database connection parameters
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'echarge';

    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Prepare the SQL query to update the user information
    $query = "UPDATE users SET name = :name, phone = :phone, carPlate = :carPlate WHERE email = :email";

    // Prepare and execute the query
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->rowCount() > 0) {
        // Update successful
        echo "User information updated successfully.";
    } else {
        // Update failed
        echo "Failed to update user information.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="profilee.css"> -->
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
  <div style="margin-left: 310px;">
<div class="container">
<div class="row">
  <div class="col-xs-15 col-sm-9">
    <form class="form-horizontal" style="align-items: center;">
        <div class="panel panel-default">
          <div class="panel-body text-center">
           <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-circle profile-avatar" alt="User avatar">
          </div>
        </div>

      <div class="panel panel-default">
        <div class="panel-heading">
        <h4 class="panel-title">Contact info</h4>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input type="tel" class="form-control">
            </div>
          </div> 
          <div class="form-group">
            <label class="col-sm-2 control-label">Mobile number</label>
            <div class="col-sm-10">
              <input type="tel" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">E-mail address</label>
            <div class="col-sm-10">
              <input type="email" class="form-control">
            </div>
          </div>
          <!-- <div class="form-group">
            <label class="col-sm-2 control-label">Work address</label>
            <div class="col-sm-10">
              <textarea rows="3" class="form-control"></textarea>
            </div>
          </div> -->
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
        <h4 class="panel-title">Security</h4>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Current password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">New password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <div class="checkbox">
                <input type="checkbox" id="checkbox_1">
                <label for="checkbox_1">Make this account public</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-default">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>
<script>window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-F1RTS0P1CD');</script>
<script type="text/javascript"></script>
<script async="" src="https://www.googletagmanager.com/gtag/js?id=G-F1RTS0P1CD"></script>
</body>
</html>
