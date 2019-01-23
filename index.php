<?php session_start() ?>
<!-- 메인화면 -->
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <title>농산물 마트</title>
        <style>
    body{
        background : #e2e1e0;
        text-align:center;

    }
    h1{
        padding:32px;
    }
    .card{
        background: #fff;
        border:1px solid #999;
        border-radius:4px;
        display:inline-block;
        height:540px;
        width:300px;
        margin:10px;}
    img{
        width:100%;
        height:400px;
        margin-top:0;
    }
    .card-1{
        box-shadow:0 1px 3px rgba(0,0,0,0.12);
    }
    .card:hover img{
        transition: .3s transform;
        transform: scale(1.03,1.03);
    }
    .topnav {
                background-color: #333;
                overflow: hidden;
            }
            /* Style the links inside the navigation bar */
            .topnav a {
              float: left;
              color: #f2f2f2;
              text-align: center;
              padding: 14px 16px;
              text-decoration: none;
              font-size: 17px;
            }
            /* Change the color of links on hover */
            .topnav a:hover {
              background-color: #ddd;
              color: black;
            }
            /* Add a color to the active/current link */
            .topnav a.active {
              background-color: #4CAF50;
              color: green;
            }
            /* Right-aligned section inside the top navigation */
            .topnav-right {
              float: right;
            }       
    
</style>
    </head>

    <body>
    <div class="topnav">
          <a class="active" href="#">Home</a>
          <a href="listcontact.php?page=1">게시판</a>
          <a href="cartview.php">장바구니</a>
          <div class="topnav-right">
          <?php
          if(isset($_SESSION['id'])) { ?>
            <a href="signmodify.php"><?=$_SESSION['id'] ?>님</a> 
            <a href="logout.php">로그아웃</a>
          <?php } 
           else { 
              ?>
            <a href="signin.html">로그인</a>  
            <a href="signup.html">회원가입</a>
          <?php } ?>
            <a href="cheer.php">응원하기</a>
          </div>
        </div>       
   <h1>농산물 마트</h1>
   <?php 

    include_once "dbconn.php";
    $sql = "select * from good";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){ ?>
            <div class='card card-1'>
                <?php
                echo "<a href='order.php?id=".$row['id'].
                "&name=".$row['name'].
                "&price3k=".$row['price3k'].
                "&price5k=".$row['price5k'].
                "&image=".$row['image'].
                "'>";?>
                <img src=<?=$row['image']?>></a>

                <h3><?=$row['name']?></h3>
                <p> 3kg: <?=$row['price3k']?>원</p>
                <p> 5kg: <?=$row['price5k']?>원</p>
                </div>
       <?php } 
}else{
   echo "<p>검색된 레코드가 없습니다.</p>";
}
?>
</body>
</html>