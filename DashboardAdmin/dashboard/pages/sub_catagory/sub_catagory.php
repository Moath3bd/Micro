<?php

require("get.php");


$query = "SELECT sub_catagory.id, sub_catagory.image,  
              sub_catagory.name AS subcatagory_name,
              catagory.name AS catagory_name
              FROM sub_catagory
              INNER JOIN catagory ON sub_catagory.catagory_id = catagory.id";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sub Category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Sub Category</a></li>
                    <li class="breadcrumb-item active">Sub Category</li>
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
            <h3 class="card-title">Sub Category</h3>

            <div class="card-tools">
                <form action="sub_catagory/create.php">
                    <button style="margin:-5px;" class="btn btn-primary">ADD</button>
                </form>
            </div>
        </div>
        <div class="card-body p-0">
            <?php if (!empty($result)) : ?>

                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                Name
                            </th>
                            <th style="width: 30%">
                                Image
                            </th>
                            <th style="width: 30%">
                                Category
                            </th>

                            <th style="width: 20%">
                                Actions
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

                                <?php echo $row["subcatagory_name"] ?>
                                </td>

                                <td style="text-align: center;">
                                    <?php if (!empty($row['image']) && file_exists("images/" . $row['image'])) : ?>
                                        <img src="<?php echo "images/" . $row['image']; ?>" alt="images" style="max-width: 100px; max-height: 100px;">
                                    <?php else : ?>
                                        <p>No logo available</p>
                                    <?php endif; ?>
                                </td>

                                <td>
                                <?php echo $row["catagory_name"] ?>
                                </td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="sub_catagory/edit.php?edit=<?php echo $row['id']; ?>">

                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>

                                    <a class="btn btn-danger btn-sm" href="sub_catagory/delete.php?delete=<?php echo $row['id']; ?>">
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