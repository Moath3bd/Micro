<?php

require("get.php");



$query = "SELECT payement.*,      
              user.name AS user_name
              FROM payement
              INNER JOIN user ON payement.userid = user.id";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Payment</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Payment</a></li>
                    <li class="breadcrumb-item active">Payment</li>
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
            <h3 class="card-title">Payment</h3>

            
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
                                Card number
                            </th>

                            <th style="width: 10%">
                                CVV
                            </th>

                            <th style="width: 10%">
                                Amount
                            </th>

                            <th style="width: 10%">
                                Date Expire
                            </th>

                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row) : ?>
                            <tr>
                                <td>
                                    <?php echo $row["id"] ?>
                                </td>
                            

                                <td>
                                <?php echo $row["user_name"] ?>
                                </td>

                                <td>
                                <?php echo $row["cardNum"] ?>
                                </td>

                                <td>
                                <?php echo $row["cvv"] ?>
                                </td>

                                <td>
                                <?php echo $row["amount"] ?>
                                </td>
                                <td>
                                <?php echo $row["expDate"] ?>
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