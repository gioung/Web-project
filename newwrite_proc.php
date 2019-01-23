<?php 
session_start();
$uid=$_SESSION['id'];
$title=$_POST['title'];
$msg=$_POST['msg'];
$wdate=date("Y/m/d/ H:i:s");

include_once "dbconn.php";
$sql="insert into list(uid,title,msg,wdate) values('$uid','$title','$msg','$wdate')";

if($conn->query($sql)){
    echo "<script>alert('글 작성 완료');</script>";
    echo "<script>location.href='listcontact.php?page=1'</script>";
}
else{
    echo $conn->error.":".$sql;
}
?>