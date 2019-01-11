<?php
include('model/query.php');
include('core/functions.php');


class dashboard
{

    public function ProductsValue()
    {
        //db params
        $table = 'stock_value';
        $column = "totalValue";
        
        // calling DB get method
        $result = DB::sum($table, $column);
        $row = mysqli_fetch_array($result);
        $total = array_shift($row);
        
        return $total;
    }
    
    
    public function totalCustomers()
    {
        //db params
        $table = 'customers';
        $column = "id";
        
        // calling DB get method
        $result = DB::count($table, $column);
        $row = mysqli_fetch_array($result);
        $total = array_shift($row);
        
        return $total;
    }
    
    // Get all categories
    public function lowStocks()
    {
        //db params
        $table = 'products';
        
        // calling DB get method
        $limit = DB::get($table);
        $row = $limit->fetch_assoc();
        $MinimumRequired = $row['MinimumRequired'];
        
        $where = "WHERE InvertoryOnHand BETWEEN 1 AND '$MinimumRequired' ";
        
        // calling DB get method
        $result = DB::get($table, $where);
        return $result;
    }

}