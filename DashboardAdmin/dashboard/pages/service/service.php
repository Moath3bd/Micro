<?php

require("get.php");

?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>services</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">services</a></li>
                    <li class="breadcrumb-item active">services</li>
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
            <h3 class="card-title">services</h3>

            <div class="card-tools">
                <form action="service/create.php">
                    <button style="margin:-5px;" class="btn btn-primary">ADD</button>
                </form>
            </div>
        </div>
        <div class="card-body p-0">
            <?php if (!empty($data)) : ?>

                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 10%">
                                Title
                            </th>
                            <th style="width: 10%">
                                Description
                            </th>

                            <th style="width: 10%">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td>
                                    <?php echo $row["id"] ?>
                                </td>
                                <td>
                                    <?php echo $row["serviceTitle"] ?>
                                </td>
                                <td>
                                    <?php echo $row["description"] ?>
                                </td>
                        

                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="service/edit.php?edit=<?php echo $row['id']; ?>">

                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>

                                    <a class="btn btn-danger btn-sm" href="service/delete.php?delete=<?php echo $row['id']; ?>">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
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