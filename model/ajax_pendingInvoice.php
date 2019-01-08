<?php
include('../core/connectdb.php');


    // db connection
    $conn = open_db_connection(); 

    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO invoices (quantity)
    VALUES ('$quantity')";

    if ($conn->query($sql) === TRUE) {

        $sql= "SELECT * FROM invoices WHERE reference=1 ";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
                echo '
                
                <td class="text-center">
                    '.$quantity.'
                </td>
                <td class="text-center">
                    ggg
                </td>
                <td class="text-center">
                    ggg
                </td>
                <td class="text-center">
                    Game Pad
                </td>
                <td>
                    <span class="btn btn-xs btn-danger delete_item">
                        <i class="fa fa-trash fa-lg"></i>
                    </span>
                </td>
                ';
        }
        
    }
//    

