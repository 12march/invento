<?php
include('../core/connectdb.php');


    // db connection
    $conn = open_db_connection(); 

    $name = $_POST['name'];

    $sql= "SELECT * FROM product_view WHERE category_name='$name' ";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        echo '<option value="'.$row['id'].'">'.$row['product_name'].'</option>';
    }
        

    
