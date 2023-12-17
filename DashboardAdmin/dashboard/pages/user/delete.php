<?php 

session_start();

 require("../../../db.php");
 
 try {
     $pdo = new PDO("mysql:host=localhost;dbname=microe", "root", "");
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
     if (isset($_GET["delete"])) {
         $id = $_GET["delete"];
 
         // Prepare the DELETE statement
         $stmt = $pdo->prepare("DELETE FROM user WHERE id = :id");
         $stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
         // Execute the statement
         $delete = $stmt->execute();
 
         if ($delete) {
             $_SESSION['success'] = true;
             header('location: ../homePage.php?page=user');
         }
     }
 } catch (PDOException $e) {
     echo "Query failed: " . $e->getMessage();
 }
 
?>