<?php
$server="localhost";
$account="ska2253";
$password="gioung1583!";
$dbname="ska2253";

$conn=new mysqli($server,$account,$password,$dbname); //객체기반형식
if($conn->connect_error){
    die("접속 오류 : " . $conn->connect_error);
}
?>