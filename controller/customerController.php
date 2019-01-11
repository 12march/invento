<?php
include('model/query.php');
include('core/functions.php');

class customer
{

    public function insert($first_name, $last_name, $phone, $email)
    {
        
        // db connection
        $conn = open_db_connection(); 
        
        $form_data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'phone' => $phone,
            'email' => $email,
        );
        
        // table name
        $table = 'customers';
        
        // calling DB get method
        $result = DB::get($table);
        $row = $result->fetch_assoc();
        
        if($email == $row['email']){
            $_SESSION['ErrorMessage']="Customer already Exist";
            header("Location:customers.php");
            exit;
        } else {
        
            // Insert Method
            $sql = DB::insert($table, $form_data);

            //Check if insert method ran successfully
            // and redirect
            if (!$conn->query($sql)) {
                $_SESSION['SuccessMessage']="Customer Added Successfully";
                header("Location:customers.php");
                exit;
            } else {
                $_SESSION['ErrorMessage']="Error: " . $sql . "<br>" . mysqli_error($conn);
                header("Location:customers.php");
                exit;
            }
        }
    }
    
    
    // Get all categories
    public function allCustomers()
    {
        //db params
        $table = 'customers';
        
        // calling DB get method
        $result = DB::get($table);
        
        return $result;
    }
    
    

}