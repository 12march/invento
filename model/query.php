<?php
include('core/connectdb.php');

class db
{
    
    
    //* Select all results from a db table 
    public static function get($table_name, $where_clause='')
    {
        // db connection
        $conn = open_db_connection(); 
        
        // check for optional where clause
        $whereSQL = '';
        if(!empty($where_clause))
        {
            // check to see if the 'where' keyword exists
            if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
            {
                // not found, add keyword
                $whereSQL = " WHERE ".$where_clause;
            } else
            {
                $whereSQL = " ".trim($where_clause);
            }
        }
       
        // build the query
        $sql = "SELECT * FROM ".$table_name.$whereSQL . " ORDER BY id desc";

        if($conn->query($sql)== true){
            $result =$conn->query($sql);
            return $result;
        }
    
    }
    
    
    public static function insert($table_name, $form_data)
    {
        // db connection
        $conn = open_db_connection();
        
        // retrieve the keys of the array (column titles)
        $fields = array_keys($form_data);

        // build the query
        $sql = "INSERT INTO ".$table_name."
        (`".implode('`,`', $fields)."`)
        VALUES('".implode("','", $form_data)."')";

        // run and return the query result resource
        return $conn->query($sql);
    }
    
    
     //* Sum of numeric column 
    public static function sum($table_name, $column, $where_clause='')
    {
        // db connection
        $conn = open_db_connection(); 
        
        // check for optional where clause
        $whereSQL = '';
        if(!empty($where_clause))
        {
            // check to see if the 'where' keyword exists
            if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
            {
                // not found, add keyword
                $whereSQL = " WHERE ".$where_clause;
            } else
            {
                $whereSQL = " ".trim($where_clause);
            }
        }
       
        // build the query
        $sql = "SELECT SUM($column) FROM ".$table_name.$whereSQL;

        if($conn->query($sql)== true){
            $result =$conn->query($sql);
            return $result;
        }
    
    }
    
    
    //* Sum of numeric column 
    public static function count($table_name, $column, $where_clause='')
    {
        // db connection
        $conn = open_db_connection(); 
        
        // check for optional where clause
        $whereSQL = '';
        if(!empty($where_clause))
        {
            // check to see if the 'where' keyword exists
            if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
            {
                // not found, add keyword
                $whereSQL = " WHERE ".$where_clause;
            } else
            {
                $whereSQL = " ".trim($where_clause);
            }
        }
       
        // build the query
        $sql = "SELECT COUNT($column) FROM ".$table_name.$whereSQL;

        if($conn->query($sql)== true){
            $result =$conn->query($sql);
            return $result;
        }
    
    }
    
}


        
        
        
        
        
        
        
        
        
        
        
        
        
        
     
//    // Including the db_connection
//    include 'includes/connectdb.php';
//    include 'includes/passenc.php';
//
//    class mod_login
//    {
//        public function login($email, $password){
//            
//            try{
//                
//                $password = encryptdata($password);
//                
//                // db connection
//                $conn = open_db_connection();
// 
//                $sql = "SELECT * FROM admin_tb 
//                WHERE username='$email' AND password='$password' " ;
//                $result =$conn->query($sql);
//                $row = mysqli_fetch_array($result);
//                    
//                if ($email != $row['user_email'] && $password != $row['password']){
//                    $_SESSION['ErrorMessage']="Your Email and Password Dont Match";
//                    header("Location: index.php");
//                    exit;
//                } else {
//                    // Saving user details in session
//                    $_SESSION['admin_id'] = $row['row_id'];
//                    $_SESSION['firstname'] = $row['firstname'];
//                    $_SESSION['lastname'] = $row['lastname'];
//                    $_SESSION['username'] = $row['username'];
//                    $_SESSION['email'] = $row['user_email'];
//                   // $_SESSION['role'] = $row['role'];
//                    
//                    
//                    $_SESSION["SuccessMessage"]= "Welcome Back";
//                        header("Location:dashboard.php");
//                        exit;
//                } 
//                
//            } catch(Exception $e) {
//                echo '<script type="text/javascript">alert("'.$e->getMessage();'");</script>';
//                return 'Message: ' .$e->getMessage();
//            }
//        }
//        
//    }


?>