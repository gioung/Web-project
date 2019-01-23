<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <title>회원정보수정</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {

            box-sizing: border-box;

        }

        body {

            width: 600px;

            margin-left: auto;

            margin-right: auto;

        }

        input[type=text],
        input[type=password],
        select,
        textarea {

            width: 100%;

            padding: 12px;

            border: 1px solid #ccc;

            border-radius: 4px;

            resize: vertical;

        }

        input[type=text]:read-only {
            background: #ccc;
        }



        label {

            padding: 12px 12px 12px 0;

            display: inline-block;

        }



        input[type=submit],
        button[type=button] {

            background-color: #4CAF50;

            color: white;

            padding: 12px 20px;

            border: 10px;

            border-radius: 10px;

            cursor: pointer;

            float: right;
            margin: 4px;

        }



        input[type=submit]:hover,
        button:hover {

            background-color: #45a049;

        }



        .container {

            border-radius: 5px;

            background-color: #f2f2f2;

            padding: 20px;

        }



        .col-25 {

            float: left;

            width: 25%;

            margin-top: 6px;

        }



        .col-75 {

            float: left;

            width: 75%;

            margin-top: 6px;

        }



        /* Clear floats after the columns */

        .row:after {

            content: "";

            display: table;

            clear: both;

        }
    </style>
</head>

<body>

</body>

</html>
<!DOCTYPE html>
<html lang="ko">

<head>
    <title>회원정보수정</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {

            box-sizing: border-box;

        }

        body {

            width: 600px;

            margin-left: auto;

            margin-right: auto;

        }

        input[type=text],
        input[type=password],
        select,
        textarea {

            width: 100%;

            padding: 12px;

            border: 1px solid #ccc;

            border-radius: 4px;

            resize: vertical;

        }

        input[type=text]:read-only {
            background: #ccc;
        }



        label {

            padding: 12px 12px 12px 0;

            display: inline-block;

        }



        input[type=submit],
        button[type=button] {

            background-color: #4CAF50;

            color: white;

            padding: 12px 20px;

            border: 10px;

            border-radius: 10px;

            cursor: pointer;

            float: right;
            margin: 4px;

        }



        input[type=submit]:hover,
        button:hover {

            background-color: #45a049;

        }



        .container {

            border-radius: 5px;

            background-color: #f2f2f2;

            padding: 20px;

        }



        .col-25 {

            float: left;

            width: 25%;

            margin-top: 6px;

        }



        .col-75 {

            float: left;

            width: 75%;

            margin-top: 6px;

        }



        /* Clear floats after the columns */

        .row:after {

            content: "";

            display: table;

            clear: both;

        }
    </style>
</head>

<body>
    <h2>회원정보수정</h2>
    <p>회원님의 정보를 수정합니다.</p>
    <hr>
    <?php 
        include "dbconn.php";
        $uid=$_SESSION['id'];
        $sql="select * from member where uid='$uid'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            $row=$result->fetch_row();
        }
        else{
            echo $conn->error.":".$sql;
        }
    ?>
    <div class="container">
        <form action="signmodproc.php" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="fname">아이디</label>
                </div>
                <div class="col-75">
                    <input type="text" readonly name="uid" value="<?=$row[0]?>" id="fname">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="username">이름</label>
                </div>
                <div class="col-75">
                    <input type="text" required name="uname" value="<?=$row[1]?>" id="username">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="userpwd">비밀번호</label>
                </div>
                <div class="col-75">
                    <input type="password" required name="pwd" value="<?=$row[2]?>" id="userpwd">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="usertel">전화번호</label>
                </div>
                <div class="col-75">
                    <input type="text" required name="telno" value="<?=$row[3]?>" id="usertel">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="useraddr">주소</label>
                </div>
                <div class="col-75">
                    <input type="text" required name="addr" value="<?=$row[4]?>" id="useraddr">
                </div>
            </div>
            <div class="row">
                <input type="submit" value="수정하기">
                <button type="button" onclick="location.href='signout.php'">회원탈퇴</button>
            </div>
        </form>
    </div>
</body>

</html>