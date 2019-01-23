<?php 
    session_start();
    $uid=$_POST['uid'];
    $pwd=$_POST['pwd'];

    include "dbconn.php";
    $sql="select uid,pwd from member where uid='$uid' and pwd='$pwd'";
    $result=$conn->query($sql);
    if($result->num_rows>0){    
        $row=$result->fetch_assoc();
        $_SESSION['id']=$row['uid'];
        echo "<script>alert('로그인성공');</script>";
        echo "<script>location.href='index.php';</script>";
    }
    else{
        echo "<script>alert('아이디 또는 비밀번호가 유효하지 않습니다.');</script>";
        echo "<script>location.href='index.php';</script>";
    }
    $conn->close();
?>