<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function encryptdata($password)
{

$key = "excelgreenforever2018!";
$salt = "xpertechsolutions2014!";

$enc_pass = md5(md5($key . $password) . $salt);

return $enc_pass;
    
}

?>

