<?php

/*=============================================
                Add New Inventory
=============================================*/
if (isset($_POST['add_inventory']))
{
        
    $product_name = test_input($_POST['product_name']);
    $category = test_input($_POST['category']);
    $price = test_input($_POST['selling_price']);
    $cost_price = test_input($_POST['cost_price']);
    $quantity = test_input($_POST['quantity']);
    $MinimumRequired = test_input($_POST['minimum']);
        
    $obj = new inventoryController();
    $obj->insert($product_name, $category, $price, $cost_price, $quantity, $MinimumRequired);
}


/*=============================================
                Add New Customer
=============================================*/
if (isset($_POST['add_customer']))
{
        
    $first_name = test_input($_POST['first_name']);
    $last_name = test_input($_POST['last_name']);
    $phone = test_input($_POST['phone']);
    $email = test_input($_POST['email']);
        
    $obj = new customer();
    $obj->insert($first_name, $last_name, $phone, $email);
}


/*=============================================
                Add New Category
=============================================*/
if (isset($_POST['add_category']))
{
        
    $category = test_input($_POST['category']);
        
    $obj = new category();
    $obj->insert($category);
}
