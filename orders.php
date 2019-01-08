<?php
ob_start();
include('layouts/header.php');
include('controller/salesController.php');
confirm_login();

include('core/formDataHandler.php');

$sales = new sales();
$customer = $sales->getCustomers();
$category = $sales->getCategories();
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
                        <h4 class="weight500 d-inline-block pr-3 mr-3 border-right">Sales</h4>
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
                                       <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <input type="number" name="quantity" class="form-control" id="quantity" required>
                                            </div>
                                       </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Customer </label>
                                                <select name="category" class="form-control" name="" id="customerName" required>
                                                        <option>-- Select Customer --</option>
                                                    <?php while($row = mysqli_fetch_assoc($customer)) : ?>
                                                    <?php $name = $row['first_name'] ." ". $row['last_name']; ?>
            
                                                        <option value="<?= $row['id']; ?>"><?= $name; ?></option>
                                                    
                                                    <?php endwhile ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Category </label>
                                                <select name="category" class="form-control" id="categoryName" onchange="getCategory();" required>
                                                        <option>-- Select Category --</option>
                                                        
                                                    <?php while($row = mysqli_fetch_assoc($category)) : ?>
            
                                                        <option value="<?= $row['category_name']; ?>"><?= $row['category_name']; ?></option>
                                                    
                                                    <?php endwhile ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                       <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Product Name</label>
                                                <select name="category" class="form-control" id="productName" required>
                                                        
                                                    
                                                </select>
                                            </div>
                                       </div>
                                       
                                       <?php $iso = rand(1000,99999); ?>
                                       <input value="<?= "INV-".date('Y').$iso; ?>" id="refNum" hidden>
                                       
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Add to invoice</label>
                                                     <span id="pendInvoice" onclick="pendingInvoice();" class='btn btn-xs btn-success'><i class='fa fa-check fa-lg'></i></span>
                                            </div>
                                       </div>
                                           
                                            <!-- invoice table  -->
                                        <?php include('layouts/table.php'); ?>
                                        
                                        
                                        
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

            <!--footer-->
<?php include('layouts/footer.php'); ?>
<?php ob_end_flush(); ?>