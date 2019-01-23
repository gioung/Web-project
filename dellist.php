<?php 
    $no=$_GET['no'];

    include "dbconn.php";
    $sql="delete from list where no=$no";
    if($conn->query($sql)){
        echo "<script>alert('삭제완료');</script>";
        echo "<script>location.href='listcontact.php?page=1'</script>";
    }
    else{
        echo $conn->error.":".$sql;
    }
?>