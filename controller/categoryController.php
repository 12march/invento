<?php
include('model/query.php');
include('core/functions.php');

class category
{

    public function insert($category)
    {
        
        // db connection
        $conn = open_db_connection(); 
        
        $form_data = array(
            'category_name' => $category,
        );
        
        // table name
        $table = 'categories';
        
        // calling DB get method
        $result = DB::get($table);
        $row = $result->fetch_assoc();
        
        if($category == $row['category_name']){
            $_SESSION['ErrorMessage']="Category already Exist";
            header("Location:add_category.php");
            exit;
        } else {
        
            // Insert Method
            $sql = DB::insert($table, $form_data);

            //Check if insert method ran successfully
            // and redirect
            if (!$conn->query($sql)) {
                $_SESSION['SuccessMessage']="Category Added Successfully";
                header("Location:categories.php");
                exit;
            } else {
                $_SESSION['ErrorMessage']="Error: " . $sql . "<br>" . mysqli_error($conn);
                header("Location:categories.php");
                exit;
            }
        }
    }
    
    
    // Get all products
    public function allCategories()
    {
        //db params
        $table = 'categories';
        
        // calling DB get method
        $result = DB::get($table);
        
        return $result;
    }

    
    
}