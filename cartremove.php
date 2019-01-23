<?php 
//표시된 체크박스 삭제
include "dbconn.php";
if(isset($_POST['delete'])){
    $delete=$_POST['delete'];
    $count=count($delete);

    for($i=0;$i<$count;$i++){
        #for문을 이용하여 하나씩 삭제 cart와 cart_number join
        $sql="select number,cart.cdate,cart.uid,cart.goodsid,cart.size from cart,cart_number where number=".$delete[$i]."
        and cart_number.cdate=cart.cdate and cart_number.uid=cart.uid and cart_number.goodsid=cart.goodsid
        and cart_number.size=cart.size";
            if($result=$conn->query($sql)){
                if($result->num_rows>0){
                    $row=$result->fetch_assoc();
                    $sql=$sql="delete from cart where cdate='".$row['cdate']."' and uid='".$row['uid'].
                    "' and goodsid=".$row['goodsid']." and size='".$row['size']."'";
                if(!($result=$conn->query($sql)))
                  echo $conn->error.":".$sql;
                #cart_number에서 해당 레코드 삭제
                $sql="delete from cart_number where number=".$row['number'];
                if(!($result=$conn->query($sql)))
                    echo $conn->error.":".$sql;  
                }
            }
    }
    echo "<script>alert('선택항목이 삭제되었습니다!');</script>";
    $conn->close();
   echo "<script>location.href = 'cartview.php';</script>";
}
else{
   echo "<script>alert('선택항목이 없습니다!');</script>";
   $conn->close();
   echo "<script>location.href = 'cartview.php';</script>";
}
?>