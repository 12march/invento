<?php
ob_start();
include('layouts/header.php');
include('controller/categoryController.php');
confirm_login();

include("core/formDataHandler.php");

$categories = new category();
$result = $categories->allCategories();
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
                        <h4 class="weight500 d-inline-block pr-3 mr-3 border-right">View Customers</h4>
                    </div>
                </div>
                <!--/page title-->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-header border-0">
                                <div class="custom-title-wrap bar-primary">
                                    
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal4" data-whatever="@mdo">Add New Category</button>
                                    
                                </div>
                            </div>
                            <div class="card-body- pt-3 pb-4">
                                <div class="table-responsive">
                                    <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Edit </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php $idno=""; ?>
                                        <?php while($row = mysqli_fetch_assoc($result)) : ?>
                                           <?php $idno++; ?>
                                            <tr>
                                               <td><?= $idno; ?></td>
                                                <td width="70%"><?= $row['category_name']; ?></td>
                                                <td class="text-center">
<!--                                                    <label for="exampleFormControlSelect1">Add to invoice</label>-->
                                                     <span id="pendInvoice" onclick="pendingInvoice();" class='btn btn-xs btn-info'><i class='fa fa-gear fa-lg'></i></span>
                                                </td>
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
            

           
           <!--========= MODAL ADD CATEGORY  ============-->
            
            <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel5" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel5">Add Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Category:</label>
                                    <input type="text" name="category" class="form-control" id="recipient-name">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="add_category" class="btn btn-primary">Submit</button>
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
