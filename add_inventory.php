<?php
ob_start();
include('layouts/header.php');
include('controller/inventoryController.php');
confirm_login();

include('core/formDataHandler.php');

$categories = new inventoryController();
$result = $categories->getCategory();
?>
      
       
        <!--main content wrapper-->
        <div class="content-wrapper">

            <div class="container-fluid">
                <?php echo Message(); 
                        echo SuccessMessage();
                    ?>
                <!--page title-->
                <div class="page-title mb-4 d-flex align-items-center">
                    <div class="mr-auto">
                        <h4 class="weight500 d-inline-block pr-3 mr-3 border-right">Add New Inventory</h4>
                    </div>
                </div>
                <!--/page title-->

                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        
                        <div class="card card-shadow mb-4">
                            <div class="card-header border-0">
                                <div class="custom-title-wrap bar-primary">
                                </div>
                            </div>
                            <div class="card-body">
                                
                                <form action="" method="POST">
                                   <div class="row">
                                       <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Product Name</label>
                                                <input type="text" name="product_name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter product name" required>
                                            </div>
                                       </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1"> Category</label>
                                                <select name="category" class="form-control" id="exampleFormControlSelect1" required>
                                                        <option>-- Select Category --</option>
                                                        
                                                    <?php while($row = mysqli_fetch_assoc($result)) : ?>
            
                                                        <option value="<?= $row['id']; ?>"><?= $row['category_name']; ?></option>
                                                    
                                                    <?php endwhile ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="price">Cost Price</label>
                                                <input type="text" name="cost_price" class="form-control" id="price" aria-describedby="emailHelp" placeholder="Enter price" required>
                                            </div>
                                       </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="costprice">Selling Price</label>
                                                <input type="text" name="selling_price" class="form-control" id="costprice" placeholder="Enter Selling price" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="quantity">Quantity </label>
                                                <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Enter quantity" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="costprice">Minimum Required</label>
                                                <input type="text" name="minimum" class="form-control" id="costprice" placeholder="Enter Selling price" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button type="submit" name="add_inventory" class="btn btn-purple">Submit</button>
                                       </div>
                                    </div>
                                </form>
                                
                                
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            
<?php include('layouts/footer.php'); ?>
<?php ob_end_flush(); ?>
