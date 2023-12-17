<?php
    require('configuration/config.php');    
    session_start();

    $userid = $_SESSION['id'];
    $id = $_POST['id']; //done
    $name = $_POST['name']; //done
    $price = $_POST['price'];//done
    $quinty = $_POST['quinty'];
    $image = $_POST['image'];

    // echo($name.' and '. $quinty);

    $sql = "SELECT * FROM cart WHERE name=:name AND userid=:userid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':userid', $userid);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $_SESSION['ADDED']=true;
        header('location:shop-single.php?id='.$userid.'&productId='.$id);
        exit();

    } else {

        $sql = "INSERT INTO cart(userId,productId,name,price,quinty,image) VALUES (:userid,:productid,:name,:price,:quinty,:image)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userid', $userid);
        $stmt->bindParam(':productid', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':quinty', $quinty);
        $stmt->bindParam(':image', $image);
        $stmt->execute();
        // echo  $maseege[] = "The product has been added successfully to basket";
        $_SESSION['ADD']=true;
        header('location:shop-single.php?id='.$userid.'&productId='.$id);
        exit();
    }

?>
