<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <!-- custom css file link  -->
  <link rel="stylesheet" href="product.css">

</head>

<body>
  <div class="container">
    <div class="shopping-cart">
      <h1 class="heading">ٍShoping Cart</h1>

      <table>
        <thead>
          <th>image</th>
          <th>product name</th>
          <th>price</th>
          <th>qunity</th>
          <th>Total price</th>
          <th>Action</th>
        </thead>
        <tbody>
          <?php
          require('configuration/config.php');
          session_start();
          $totalamount = 0;
          $id = $_SESSION['id'];
          $sql = "SELECT * FROM cart WHERE userid=:id";
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':id', $id);
          $stmt->execute();
          if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          ?>
              <tr>
                <td><img src="<?php echo $row['image']; ?>" height='75' alt=""></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price'] . "$"; ?></td>
                <td>
                  <form action="cart.php" method="post">
                    <input type="hidden" name="cartid" value="<?php echo $row['productid']; ?>">
                    <input type="number" min="1" name="cartquinty" value="<?php echo $row['quinty']; ?>">
                    <input type="submit" name="edit" value="Edit" class="option-btn">
                  </form>
                </td>
                <td><?php echo $totalprice = ($row['price'] * $row['quinty']); ?></td>
                <td><a href="cart.php?remove=<?php echo $row['productid']; ?>" class="delete-btn" onclick="return confirm('Remove items from the cart?');">remove</a></td>
              </tr>
          <?php
              $totalamount += $totalprice;
            }
          } else {
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">The basket is empty</td></tr>';
          }
          ?>

          <tr class="table-bottom">
            <td colspan="4">Total amount</td>
            <td><?php echo $totalamount . "$"; ?></td>
            <td><a href="cart.php?delete_all" onclick="return confirm('Remove all products from the cart?');" class="delete-btn">Delete all</a></td>
          </tr>
        </tbody>
      </table>


    </div>

  </div>
</body>

</html>
<?php

if (isset($_POST['edit'])) {
  $productid = $_POST['cartid'];
  $cartquinty = $_POST['cartquinty'];
  $sql = "UPDATE cart SET quinty=:cartquinty WHERE productid=:productid AND userid=:id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':cartquinty', $cartquinty);
  $stmt->bindParam(':productid', $productid);
  $stmt->bindParam(':id', $id);
  if ($stmt->execute()) {
    $message[] = 'cart quinty updated successfully';
    header("Refresh:1,url=cart.php");
  }
}
if (isset($_GET['remove'])) {
  $removeid = $_GET['remove'];
  $sql = "DELETE FROM cart WHERE productid =:removeid AND userid=:id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':removeid', $removeid);
  $stmt->bindParam(':id', $id);
  if ($stmt->execute()) {
    header('location:cart.php');
  }
}


if (isset($_GET['delete_all'])) {
  $sql = "DELETE FROM cart WHERE userid =:id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $id);
  if ($stmt->execute()) {
    header('location:cart.php');
  }
}
?>