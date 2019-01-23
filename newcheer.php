<?php 
    session_start();
    $uid=$_SESSION['id'];
    $title=$_POST['title'];
    $content=$_POST['msg'];

    include "dbconn.php";
    $sql="insert into cheer(uid,title,content) values('$uid','$title','$content')";
    if($conn->query($sql)){
        echo "<script>alert('응원 감사드립니다^^');</script>";
        echo "<script>location.href='cheer.php';</script>";
    }
    else{
        echo $conn->error.":".$sql;
    }
    $conn->close();
?>