<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$server='localhost';
$username='root';
$password='';
$database='art';

$connection = mysqli_connect($server,$username,$password,$database);

if(!$connection)
{
    echo "Opps...Something Went Wrong In Connection";
}
else
{
   // echo "Very_Guud...";
}