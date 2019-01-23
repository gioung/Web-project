<?php 
session_start();
include "dbconn.php";

$uid=$_SESSION['id'];
$sql="delete from member where uid='$uid'";
if($result=$conn->query($sql)){
    session_unset();
    session_destroy();
    echo "<script>alert('회원을 탈퇴하셨습니다.');</script>";
    echo "<script>location.href='index.php';</script>";
}
else{
    echo $conn->error.":".$sql;
}
?>