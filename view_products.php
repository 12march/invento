<?php
ob_start();
include('layouts/header.php');
include('controller/inventoryController.php');
confirm_login();

$categories = new inventoryController();
$result = $categories->allProduct();
?>

        <!--main content wrapper-->
        <div class="content-wrapper">

            <div class="container-fluid">

                <!--page title-->
                <div class="page-title mb-4 d-flex align-items-center">
                    <div class="mr-auto">
                        <h4 class="weight500 d-inline-block pr-3 mr-3 border-right">View Products</h4>
                    </div>
                </div>
                <!--/page title-->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-header border-0">
                                <div class="custom-title-wrap bar-primary">
                                    <a href="add_inventory.php" class="btn btn-info">Add New Product</a>
                                </div>
                            </div>
                            <div class="card-body- pt-3 pb-4">
                                <div class="table-responsive">
                                    <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Category</th>
                                            <th>Age</th>
                                            <th>Available Product</th>
                                            <th>Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php $idno=""; ?>
                                        <?php while($row = mysqli_fetch_assoc($result)) : ?>
                                           <?php $idno++; ?>
                                            <tr>
                                               <td><?= $idno; ?></td>
                                                <td><?= $row['product_name']; ?></td>
                                                <td><?= $row['unique_id']; ?></td>
                                                <td><?= $row['category_name']; ?></td>
                                                <td><?= $row['product_name']; ?></td>
                                                <td>
                                                   <?php
                                                    echo ($row['InventoryOnHand'] == '') ? "Finished" : $row['InventoryOnHand']; 
                                                    ?>
                                                </td>
                                                <td>#<?= $row['price']; ?></td>
                                            </tr>
                                       <?php endwhile ?>
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!--footer-->
<?php include('layouts/footer.php'); ?>

<?php ob_end_flush(); ?>
