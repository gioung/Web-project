<?php session_start();
    if(empty($_SESSION['id'])){
        echo "<script>alert('로그인이 필요합니다');</script>";
        echo "<script>location.href='index.php';</script>";
    }
    $image=$_GET['image'];
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <title>상품주문</title>
    <style>
        body,
        html {
            height: 100%;
            font-family: Arial, Helvetica, sans-serif;
            }
        * {
            box-sizing: border-box;
            }
         .bg-img {

            /* The image used */
            background-image: url(<?=$image?>);


            width: 700px;
            height: 500px;
            /* Center and scale the image nicely */
            background-position: center;

            background-repeat: no-repeat;

            background-size: cover;}
        /* Add styles to the form container */
        .container {

            position: absolute;

            right: 0;

            margin: 20px;

            max-width: 300px;

            padding: 16px;

            background-color: white;
        }
        /* Full-width input fields */

        input[type=text],
        input[type=number] {

            width: 100%;

            padding: 15px;

            margin: 5px 0 22px 0;

            border: none;

            background: #f1f1f1;

        }
        input[type=text]:focus,
        input[type=number]:focus {

            background-color: #ddd;

            outline: none;

        }
         input[type=radio] {

            margin: 5px 0;

        }

        /* Set a style for the submit button */
        .btn {

            background-color: #4CAF50;

            color: white;

            padding: 16px 20px;

            border: 10px;

            cursor: pointer;

            margin: 4px;

            width: 100%;

            opacity: 0.9;

        }
        .btn:hover {

            opacity: 1;

        }
         .title {

            position: absolute;

            top: 10px;

            left: 40px;

            color: black;

        }
    </style>
</head>

<body>  
    <?php 
        $id=$_GET['id'];
        $name=$_GET['name'];
        $price3k=$_GET['price3k'];
        $price5k=$_GET['price5k'];
        
    ?>
    <h1 class="title">상품주문</h1>
    <div class="bg-img">
        <form action="ordproc.php" method="get">
            <div class="container">
                <h2><?=$name?></h2>
                <label for="size"><b>옵션</b></label>
                <fieldset>
                    <input type="radio" name="size" value="3kg" checked>
                    3kg(<?=$price3k?>)<br>
                    <input type="radio" name="size" value="5kg">
                    5kg(<?=$price5k?>)<br>
                </fieldset>
                <label for="qty"><b>주문수량</b></label>
                <input type="number" name="qty" value="1" min="1" max="10">
                <input type="text" name="goodsid" value="<?=$id?>" hidden>
                <input type="text" name="price3k" value="<?=$price3k?>" hidden>
                <input type="text" name="price5k" value="<?=$price5k?>" hidden>
                <button type="submit" class="btn">장바구니 담기</button>
                <button type="button" class="btn" onclick="location.href='index.php'">메인화면
                </button>
    </div>
    </form>
    </body>

</html>