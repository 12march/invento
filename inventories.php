<?php
ob_start();
include('layouts/header.php');
include('controller/inventoryController.php');
confirm_login();

include('core/formDataHandler.php');

$inventory = new inventoryController();
$result = $inventory->allProduct();
$getCategory = $inventory->getCategory();
?>

        <!--main content wrapper-->
        <div class="content-wrapper">

            <div class="container-fluid">
                
                <!-- ALERT!!! -->
                <?php echo Message(); 
                    echo SuccessMessage();
                ?>
                
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
                                    
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal4" data-whatever="@mdo">Add New Product</button>

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
                                                <td>₦<?= number_format($row['price']); ?></td>
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
            
            
            <!--========= MODAL ADD PRODUCT  ============-->
            
            <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel5" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel5">Add New Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Product Name:</label>
                                            <input type="text" name="product_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Category:</label>
                                            <select name="category" class="form-control" id="exampleFormControlSelect1" required>
                                                    <option>-- Select Category --</option>

                                                <?php while($row = mysqli_fetch_assoc($getCategory)) : ?>

                                                    <option value="<?= $row['id']; ?>"><?= $row['category_name']; ?></option>

                                                <?php endwhile ?>

                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Cost Price:</label>
                                            <input type="text" name="cost_price" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Selling Price:</label>
                                            <input type="text" name="selling_price" class="form-control" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Quantity:</label>
                                            <input type="text" name="quantity" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Minimum Quantity:</label>
                                            <input type="text" name="minimum" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="add_inventory" class="btn btn-primary">Submit</button>
                                </div>
                                
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        <!--============== //END ===============-->

            <!--footer-->
<?php include('layouts/footer.php'); ?>

<?php ob_end_flush(); ?>
