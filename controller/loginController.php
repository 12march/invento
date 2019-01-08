<?php
    include('model/query.php');
    include('core/passenc.php');
    include('core/functions.php');

class loginController
{
    
    public function login($username, $password)
    {
        // encrypting password
        $password = encryptdata($password);
        
        //db params
        $table = 'admins';
        $query = "WHERE username='$username' AND password='$password' ";
        
        // calling DB get method
        $result = DB::get($table, $query);
        $row = $result->fetch_assoc();
        

        if ($username != $row['username'] && $password != $row['password']){
            $_SESSION['ErrorMessage']="Your Email and Password Dont Match";

            header("Location:index.php");
            exit;
        } else {
            // Saving user details in session
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['username'] = $row['username'];
            //$_SESSION['email'] = $row['user_email'];

            $_SESSION["SuccessMessage"]= "Welcome Back";
                header("Location:dashboard.php");
                exit;
            } 
        
    }
    
}

