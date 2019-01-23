<?php 
    session_start();
    $uid=$_SESSION['id'];
    $size=$_GET['size'];
    $qty=$_GET['qty'];
    $goodsid=$_GET['goodsid'];
    $cdate=date("Y/m/d");

    if($size=='3kg')$price=$_GET['price3k']*$qty;
    elseif($size=='5kg')$price=$_GET['price5k']*$qty;
    
    include "dbconn.php";
    $sql="insert into cart values('$cdate','$uid',$goodsid,'$size',$qty,$price)";
    if($conn->query($sql)){
        echo "<script>alert('장바구니에 담았습니다!');</script>";
        echo "<script>location.href='index.php';</script>";
    }
    else{
        echo "<script>alert('중복상품불가!');</script>";
        echo "<script>location.href='index.php';</script>";
        die('중복상품불가!');
        
    }

    $sql="insert into cart_number(cdate,uid,goodsid,size) values('$cdate','$uid',$goodsid,'$size')";
    if(!($conn->query($sql))){
        echo "<script>alert('중복상품불가!');</script>";
        echo "<script>location.href='index.php';</script>";
    }

    
    $conn->close();

?>