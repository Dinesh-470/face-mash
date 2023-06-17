<?php 
$hostname = 'sql311.epizy.com';
$user = 'epiz_34234189';
$password = 'QpqsO6eaWWE0aE';
$db = 'epiz_34234189_samsruthi_collee';
$conn = new mysqli($hostname,$user,$password,$db);

if ($conn->connect_error)
{
    die("connection failed :".$conn->connect_error);
}
?>