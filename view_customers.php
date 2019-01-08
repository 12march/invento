<?php
ob_start();
include('layouts/header.php');
include('controller/customerController.php');
confirm_login();

$customers = new customer();
$result = $customers->allCustomers();
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
                                    <a href="add_customer.php" class="btn btn-info">Add New Customer</a>
                                </div>
                            </div>
                            <div class="card-body- pt-3 pb-4">
                                <div class="table-responsive">
                                    <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php $idno=""; ?>
                                        <?php while($row = mysqli_fetch_assoc($result)) : ?>
                                           <?php $idno++; ?>
                                            <tr>
                                               <td><?= $idno; ?></td>
                                                <td><?= $row['first_name']; ?></td>
                                                <td><?= $row['last_name']; ?></td>
                                                <td><?= $row['email']; ?></td>
                                                <td><?= $row['phone']; ?></td>
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
