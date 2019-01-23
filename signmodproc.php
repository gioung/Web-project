<?php 
  
  $uid=$_POST['uid'];
  $uname=$_POST['uname'];
  $pwd=$_POST['pwd'];
  $telno=$_POST['telno'];
  $addr=$_POST['addr'];
  include "dbconn.php";
  $sql="update member set uname='$uname',pwd='$pwd',telno='$telno',addr='$addr' where uid='$uid'";
  if($conn->query($sql)){
      echo "<script>alert('수정완료');</script>";
      echo "<script>location.href='index.php'</script>";
  }
  else{
      echo $conn->error.":".$sql;
  }

?>