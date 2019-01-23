<?php session_start(); 
if(empty($_SESSION['id'])){
    echo "<script>alert('로그인이 필요합니다.');</script>";
    echo "<script>location.href = 'index.php';</script>";
    
}?>
<!doctype html>
<html>

<head>
    <title>농산물 마트</title>
    <meta charset="utf-8">




</head>
<style>
    body {
        text-align: center;
    }

    table {
        border=collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: green;
        color: black;
    }

    td {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #f1f1f1;
        color: black;
    }

    img {
        width: 100px;
        height: 100px;
    }

    input[type=submit],
    button {

        background-color: #4CAF50;

        color: white;

        padding: 12px 20px;

        border: none;

        border-radius: 4px;

        cursor: pointer;

        float: right;
        margin: 5px;

    }



    input[type=submit]:hover,
    button:hover {

        background-color: #45a049;

    }
</style>
<body>
    <h1>장바구니</h1>
    <form action="cartremove.php" method="post">
    <?php 
    $uid=$_SESSION['id'];
    
    include "dbconn.php";
    /* 상품이름을 얻기위한 cart와 good의 join 
    항목 삭제를 위한 고유번호를 얻기위해 cart_number와 cart의 join */
    $sql="select name,number,cart.cdate,cart.size,cart.qty,cart.price from cart,cart_number,good
    where cart.uid=cart_number.uid and cart.uid='".$uid."' and cart.cdate=cart_number.cdate
    and cart.size=cart_number.size and cart.goodsid=cart_number.goodsid
    and cart.goodsid=id";


    $result=$conn->query($sql);
    if($result->num_rows>0){
        echo "<table>
                <tr>
                    <th>선택</th>
                    <th>주문일</th>
                    <th>상품</th>
                    <th>사이즈</th>
                    <th>수량</th>
                    <th>가격</th>
                </tr>";
        while($row=$result->fetch_assoc()){
            $check_num=$row['number'];
            //체크박스는 배열 delete[] 이용
        echo "<tr>
                <td><input type='checkbox' name='delete[]' value='$check_num'></td> 
                <td>".$row['cdate']."</td>
                <td>".$row['name']."</td>
                <td>".$row['size']."</td>
                <td>".$row['qty']."</td>
                <td>".$row['price']."</td>
        </tr>";
        } echo "</table>"; }
    else {
        echo $conn->error.":".$sql;
    }?>
    <input type="submit" value="삭제하기">
    <button type="button" class="btn" onclick="location.href='index.php'">메인화면</button>

    </form>
</body>
</html>