<?php

require("get.php");

$query = "SELECT location.*,      
              user.name AS user_name
              FROM location
              INNER JOIN user ON location.userid = user.id";


    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>location</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">location</a></li>
                    <li class="breadcrumb-item active">location</li>
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
            <h3 class="card-title">location</h3>

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
                                Name
                            </th>
                            <th style="width: 10%">
                                Contry
                            </th>
                            <th style="width: 10%">
                                City
                            </th>
                            <th style="width: 10%">
                                Street Name
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
                                <?php echo $row["contry"] ?>
                                </td>
                       
                               	
                                <td>
                                <?php echo $row["city"] ?>
                                </td>

                                <td>
                                <?php echo $row["streetName"] ?>
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