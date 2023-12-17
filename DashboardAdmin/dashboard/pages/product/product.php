<?php

require("get.php");


// $query = "SELECT sub_catagory.id, sub_catagory.image,  
//               sub_catagory.name AS subcatagory_name,
//               catagory.name AS catagory_name
//               FROM sub_catagory
//               INNER JOIN catagory ON sub_catagory.catagory_id = catagory.id";


$query = "SELECT products.*,      
              sub_catagory.name AS sub_catagory_name
              FROM products
              INNER JOIN sub_catagory ON products.subid = sub_catagory.id";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Products</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Products</li>
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
            <h3 class="card-title">Products</h3>

            <div class="card-tools">
                <form action="product/create.php">
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
                            <th style="width: 10%">
                                Name
                            </th>
                            <th style="width: 10%">
                                Image
                            </th>
                            <th style="width: 10%">
                                Price
                            </th>
                            <th style="width: 10%">
                                Description
                            </th>
                            	
                            <th style="width: 10%">
                                Quantity
                            </th>
                            <th style="width: 10%">
                                Discount
                            </th>

                            <th style="width: 10%">
                                Sub category
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
                                <?php echo $row["name"] ?>
                                </td>

                                <td style="text-align: center;">
                                    <?php if (!empty($row['image']) && file_exists("images/" . $row['image'])) : ?>
                                        <img src="<?php echo "images/" . $row['image']; ?>" alt="images" style="max-width: 100px; max-height: 100px;">
                                    <?php else : ?>
                                        <p>No logo available</p>
                                    <?php endif; ?>
                                </td>


                                <td>
                                <?php echo $row["price"] ?>
                                </td>
                       
                               	
                                <td>
                                <?php echo $row["description"] ?>
                                </td>

                                <td>
                                <?php echo $row["quantity"] ?>
                                </td>

                                <td>
                                <?php echo $row["discount"] ?>
                                </td>

                                <td>
                                <?php echo $row["sub_catagory_name"] ?>
                                </td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="product/edit.php?edit=<?php echo $row['id']; ?>">

                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>

                                    <a class="btn btn-danger btn-sm" href="product/delete.php?delete=<?php echo $row['id']; ?>">
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