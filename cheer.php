<?php 
    session_start();
    if(empty($_SESSION['id'])){
        echo "<script>alert('로그인이 필요합니다.');</script>";
        echo "<script>location.href='index.php';</script>";}  
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>응원하기</title>
    <style>
        * {
            box-sizing: border-box
        }

        body {
            font-family: "Lato", sans-serif;
            margin: 0
        }

        /* Style the tab */

        .tab {
            float: left;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            width: 20%;
            height: 100vh;
        }

        /* Style the buttons inside the tab */

        .tab button {
            display: block;
            background-color: inherit;
            color: black;
            padding: 22px 16px;
            width: 100%;
            border: none;
            outline: none;
            text-align: left;
            cursor: pointer;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */

        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current "tab button" class */

        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */

        .tabcontent {
            float: left;
            padding: 0px 12px;
            width: 80%;
            border-left: none;
            height: 100vh;
        }

        /* Style the form */

        .rsvform {
            width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .divider {
            margin: 0.5em 0 0.5em 0;
            border: 0;
            height: 1px;
            width: 100%;
            display: block;
            background-color: #4f6fad;
            background-image: linear-gradient(to right, #ee9cb4, #4f6fad);
        }

        .listform {
            width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        input[type=text],
        input[type=datetime-local],
        input[type=number],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit],button[type=button] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            margin: 5px;
        }

        input[type=submit]:hover {
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
            color: white;
        }

        td {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #f1f1f1;
            color: black;
        }
    </style>
</head>

<body>
    <!-- 왼쪽 탭-->
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'newcheer')" id="defaultOpen">응원하기</button>
        <button class="tablinks" onclick="openTab(event, 'confirm')">응원의 글들</button>
        </div>

        <div id="newcheer" class="tabcontent">
            <div class="rsvform">
                <h2>응원하기</h2>
                <p>응원 한마디가 큰 힘이 됩니다!</p>
                <div class="divider"></div>
                <div class="container">
                    <form action="newcheer.php" method="post">
                        <div class="row">
                            <div class="col-25">
                                <label for="title">응원제목</label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="title" placeholder="응원 제목.." required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="msg">응원내용</label>
                            </div>
                            <div class="col-75">
                                <textarea name="msg" placeholder="응원 내용" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <input type="submit" value="응원하기">
                            <button type="button" onclick="location.href='index.php'">메인화면</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="confirm" class="tabcontent">
            <div class="listform">
                <h2>응원의 글들</h2>
                <p>회원님들의 응원 내용을 보여줍니다.</p>
                <?php 
                include "viewcheer.php"; ?>
            </div>
        </div>
        <script>
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}
    document.getElementById("defaultOpen").click();
</script>
</body>

</html>