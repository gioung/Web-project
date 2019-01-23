<?php 
$no=$_POST['no'];
$title=$_POST['title'];
$msg=$_POST['msg'];

include "dbconn.php";
$sql="update list set title='$title',msg='$msg' where no=$no";
if($conn->query($sql)){
    echo "<script>alert('수정완료')</script>";
    echo "<script>location.href='listcontact.php?page=1'</script>";
}
else{
    echo $conn->error.":".$sql;
}

?>