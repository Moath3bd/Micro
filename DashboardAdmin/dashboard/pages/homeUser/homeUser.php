<?php

require("get.php");

?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Home User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home User</a></li>
                    <li class="breadcrumb-item active">Home User</li>
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
            <h3 class="card-title">Home User</h3>

            <div class="card-tools">
                <form action="homeUser/create.php">
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

                            <th style="width: 20%">
                                Logo
                            </th>

                            <th style="width: 20%">
                                Image
                            </th>
                           

                            <th style="width: 20%">
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

                                <td style="text-align: center;">
                                    <?php if (!empty($row['logo']) && file_exists("images/" . $row['logo'])) : ?>
                                        <img src="<?php echo "images/" . $row['logo']; ?>" alt="images" style="max-width: 80px; max-height: 80px;">
                                    <?php else : ?>
                                        <p>No logo available</p>
                                    <?php endif; ?>
                                </td>

                                <td style="text-align: center;">
                                    <?php if (!empty($row['image']) && file_exists("images/" . $row['image'])) : ?>
                                        <img src="<?php echo "images/" . $row['image']; ?>" alt="images" style="max-width: 80px; max-height: 80px;">
                                    <?php else : ?>
                                        <p>No logo available</p>
                                    <?php endif; ?>
                                </td>

                            
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="homeUser/edit.php?edit=<?php echo $row['id']; ?>">

                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>

                                    <a class="btn btn-danger btn-sm" href="homeUser/delete.php?delete=<?php echo $row['id']; ?>">
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