<?php

require("get.php");



// $query = "SELECT orderu.*,      
//               user.name AS user_name
//               FROM orderu
//               INNER JOIN user ON orderu.userid = user.id";

$query = "SELECT DISTINCT
po.id AS ID,
u.name AS user_name,
p.name AS product_name,
c.name AS catagory_name,
sc.name AS subcatagory_name,
py.amount AS payement_amount,
o.date AS purchase_date
FROM
productorder po
JOIN products p ON po.productid = p.id
JOIN orderu o ON po.orderid = o.id
JOIN user u ON o.userid = u.id
JOIN payement py ON u.id = py.userid
JOIN sub_catagory sc ON p.subid = sc.id
JOIN catagory c ON sc.catagory_id = c.id";


    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Orders</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Orders</a></li>
                    <li class="breadcrumb-item active">Orders</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Orders</h3>

           
        </div>
        <div class="card-body p-0">
            <?php if (!empty($result)) : ?>

                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            
                            <th style="width: 10%">
                                Users
                            </th>
                            <th style="width: 10%">
                                Products
                            </th>
                            <th style="width: 10%">
                                Sub category
                            </th>
                            <th style="width: 10%">
                                Category
                            </th>
                            <th style="width: 10%">
                                Amount
                            </th>
                            <th style="width: 10%">
                                Date
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                   
                        <?php foreach ($result as $row) : ?>
                            <tr>
                                <td>
                                    <?php echo $row["ID"] ?>
                                </td>
                                <td>

                                <?php echo $row["user_name"] ?>
                                </td>

                                <td>
                                <?php echo $row["product_name"] ?>
                                </td>

                                <td>
                                <?php echo $row["catagory_name"] ?>
                                </td>

                                <td>
                                <?php echo $row["subcatagory_name"] ?>
                                </td>

                                <td>
                                <?php echo "$" . $row["payement_amount"] ?>
                                </td>
                                
                                <td>
                                <?php echo $row["purchase_date"] ?>
                                </td>

                         
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>No data available.</p>
            <?php endif ?>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->