<?php
include '../core/connectdb.php';

// db connection
$conn = open_db_connection(); 



//$form_data = array(
//    'first_name' => $first_name,
//    'last_name' => $last_name,
//    'email' => $email,
//    'address1' => $address1,
//    'address2' => $address2,
//    'address3' => $address3,
//    'postcode' => $postcode,
//    'tel' => $tel,
//    'mobile' => $mobile,
//    'website' => $website,
//    'contact_method' => $contact_method,
//    'subject' => $subject,
//    'message' => $message,
//    'how_you_found_us' => $how_you_found_us,
//    'time' => time()
//);

$title = "max";

$form_data = array(
    'category_name' => $title
);

function dbRowInsert($table_name, $form_data, $conn)
{
    // retrieve the keys of the array (column titles)
    $fields = array_keys($form_data);

    // build the query
    $sql = "INSERT INTO ".$table_name."
    (`".implode('`,`', $fields)."`)
    VALUES('".implode("','", $form_data)."')";

    // run and return the query result resource
    return mysqli_query($conn, $sql);
}

$table_name = "categories";

$f=dbRowInsert($table_name, $form_data, $conn);

if ($f) {
//    $_SESSION['ErrorMessage']="Product Added Successfully";
//    header("Location:dashboard.php");
    echo "Hello";
    exit;
} else {
//    $_SESSION['ErrorMessage']="Error: " . $sql . "<br>" . mysqli_error($conn);
//    header("Location:add_inventory.php");
//    exit;
    echo "fuck";
}

// the where clause is left optional incase the user wants to delete every row!
//function dbRowDelete($table_name, $where_clause='', $conn)
//{
//    // check for optional where clause
//    $whereSQL = '';
//    if(!empty($where_clause))
//    {
//        // check to see if the 'where' keyword exists
//        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
//        {
//            // not found, add keyword
//            $whereSQL = " WHERE ".$where_clause;
//        } else
//        {
//            $whereSQL = " ".trim($where_clause);
//        }
//    }
//    // build the query
//    $sql = "DELETE FROM ".$table_name.$whereSQL;
//
//    // run and return the query result resource
//    return mysqli_query($conn, $sql);
//}
//
//
//$table_name = "txn_type_config_tb";
//$clause = "WHERE txn_type_id = 4";
//
//dbRowDelete($table_name, $clause, $conn);