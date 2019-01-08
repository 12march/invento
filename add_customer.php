<?php
ob_start();
include('layouts/header.php');
include('controller/customerController.php');
confirm_login();

include('core/formDataHandler.php');

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
                        <h4 class="weight500 d-inline-block pr-3 mr-3 border-right">Add New Customer</h4>
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
                                                <label for="name">First Name</label>
                                                <input type="text" name="first_name" class="form-control" aria-describedby="emailHelp" placeholder="First name" required>
                                            </div>
                                       </div>
                                         
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="price">Last Name</label>
                                                <input type="text" name="last_name" class="form-control" aria-describedby="emailHelp" placeholder="Last name" required>
                                            </div>
                                       </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="costprice">Phone </label>
                                                <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="quantity">Email </label>
                                                <input type="email" name="email" class="form-control" placeholder="Email address" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button type="submit" name="add_customer" class="btn btn-purple">Submit</button>
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
