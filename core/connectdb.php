<?php
    session_start();
    
    function open_db_connection()
    {
        try
        {  
            
          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "invento";
      

        // Create connection
        $con = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($con->connect_error) {
             echo '<script type="text/javascript">alert("Connection failed.");</script>';
            die("Connection failed: " . $con->connect_error);

        } 
        
        return $con;
        
        }
        catch(Exception $e) {
             echo '<script type="text/javascript">alert("'.$e->getMessage();'");</script>';
  echo 'Message: ' .$e->getMessage();
}

    }
    
     function close_db_connection($conn)
    {
          try
        {
           $conn->mysql_close();
           
        }
           catch(Exception $e) {
             echo '<script type="text/javascript">alert("'.$e->getMessage();'");</script>';
  echo 'Message: ' .$e->getMessage();
           }
    }

