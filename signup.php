<?php 
session_start();
if(!empty($_POST['uid']))
$uid=$_POST['uid'];
else die("아이디 입력값이 없습니다.");
if(!empty($_POST['uname']))
$uname=$_POST['uname'];
else die("이름 입력값이 없습니다.");
if(!empty($_POST['pwd']))
$pwd=$_POST['pwd'];
else die("비밀번호 입력값이 없습니다.");
if(!empty($_POST['telno']))
$telno=$_POST['telno'];
else die("연락처 입력값이 없습니다.");
if(!empty($_POST['addr']))
$addr=$_POST['addr'];
else die("주소 입력값이 없습니다.");

include "dbconn.php";
$sql = "insert into member values('$uid','$uname','$pwd','$telno','$addr')";

if($conn->query($sql)==TRUE){
    $_SESSION['id']=$uid;
    $_SESSION['name']=$uname;
    
    echo "회원가입이 성공하셨습니다 $uid - $uname ";
    echo "<a href='index.php'>메인화면</a>으로 이동";
}
else{
    echo "Error : ".$conn->error."<br>";
    echo $sql;
}
$conn->close();


?>