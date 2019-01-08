<?php
include('model/query.php');
include('core/functions.php');

class inventoryController
{

    public function insert($product_name, $category, $price, $cost_price, $quantity, $MinimumRequired)
    {
        
        // db connection
        $conn = open_db_connection(); 
        
        $form_data = array(
            'product_name' => $product_name,
            'category_id' => $category,
            'price' => $price,
            'cost_price' => $cost_price,
            'unique_id' => uniqid(),
            'StartingInventory' => $quantity,
            'MinimumRequired' => $MinimumRequired,
            'InventoryOnHand' => $quantity
        );
        
        // table name
        $table = 'products';
        
        // calling DB get method
        $result = DB::get($table);
        $row = $result->fetch_assoc();
        
        if($product_name == $row['product_name']){
            $_SESSION['ErrorMessage']="Product already Exist";
            header("Location:add_inventory.php");
            exit;
        } else {
        
            // Insert Method
            $sql = DB::insert($table, $form_data);

            //Check if insert method ran successfully
            // and redirect
            if (!$conn->query($sql)) {
                $_SESSION['SuccessMessage']="Product Added Successfully";
                header("Location:view_products.php");
                exit;
            } else {
                $_SESSION['ErrorMessage']="Error: " . $sql . "<br>" . mysqli_error($conn);
                header("Location:add_inventory.php");
                exit;
            }
        }
    }
    
    
    // Get all categories
    public function getCategory()
    {
        //db params
        $table = 'categories';
        
        // calling DB get method
        $result = DB::get($table);
        
        return $result;
    }
    
    
    // Get all products
    public function allProduct()
    {
        //db params
        $table = 'product_view';
        
        // calling DB get method
        $result = DB::get($table);
        
        return $result;
    }

}