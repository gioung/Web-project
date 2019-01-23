<?php session_start();
    if(empty($_SESSION['id'])){
        echo "<script>alert('로그인이 필요합니다.');</script>";
        echo "<script>location.href='index.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            text-align: center;
        }

        #pizza {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #pizza td,
        #pizza th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #pizza tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #pizza tr:hover {
            background-color: #ddd;
        }

        #pizza th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
        }

        /* Style Page */

        .paging_area {
            width: 100%;
            height: 50px;
            padding-top: 7px;
            margin-left: auto;
        }

        .paging_area a,
        .paging_area span {

            color: black;
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            /*
                display: inline-block;
                border-radius: 3px;
                border: solid 1px #c0c0c0;
                background: #e9e9e9;
                box-shadow: inset 0px 1px 0px rgba(255,255,255, .8), 0px 1px 3px rgba(0,0,0, .1);*/
            padding: 3px 9px;
            font-weight: bold;
            text-decoration: none;
            color: #717171;
            text-shadow: 0px 1px 0px rgba(255, 255, 255, 1);
        }

        .paging_area a.active {
            background-color: dodgerblue;
            color: white;
        }

        .paging_area a:hover:not(.active) {
            background-color: #fefefe;
        }

        /* 검색 */

        .topnav .search-container {
            float: right;
        }

        .topnav input[type=text] {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: 3px solid #ddd;
            margin-right: 6px;
            margin-bottom: 10px;
        }

        .topnav .search-container button {
            float: right;
            padding: 6px 10px;
            margin-top: 8px;
            margin-right: 16px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }

        .topnav .search-container button:hover {
            background: #ccc;
        }

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
</head>

<body>
    <h1>게시판</h1>
    <hr>
    <div class="topnav">
        <div class="search-container">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
                <input type="text" name="page" value="1" hidden>
        </form>  
        </div>  
    </div>
    <?php 
    //페이징
    include_once "dbconn.php";
    $listsize=6; //한페이지에 보일 레코드 수
    $pages=3; //좌우에 보이는 페이지넘버
    if(isset($_GET['page']))
    $page=$_GET['page'];
    else
    $page=1;
    $search='%';
    $sql="select count(*) from list where title like '%'";
    $result=$conn->query($sql);
    $row=$result->fetch_row();
    $rowcount=$row[0];

    $pagecount=(int)($rowcount/$listsize);
    if($rowcount%$listsize>0){
        $pagecount++;
    }
    $startpage=max($page - $pages,1);
    $endpage=min($page+$pages,$pagecount);
    

    $offset=($page-1)*$listsize;
    $sql="select * from list where title like '%' order by no desc limit $offset,$listsize";
    $result=$conn->query($sql);
    if($result->num_rows>0){
    ?>
        <table id="pizza">
            <tr>
              <th style="width:7%">번호</th>
              <th>제목</th>
              <th style="width:10%">작성자</th>
              <th style="width:15%">작성일</th> 
            </tr>
        <?php 
        while($row=$result->fetch_assoc()){
            ?>
            <tr>
               <td><?=$row['no']?></td>
               <td><a href="modlist.php?no=<?=$row['no']?>"><?=$row['title']?></a></td>
               <td><?=$row['uid']?></td> 
               <td><?=$row['wdate']?></td>
            </tr>
        <?php }  ?> 
        </table>

        <div class="paging_area">
            <?php 
            //이전버튼
                if($page>1){
                    $prev = $page - 1;
                    echo "<a href='listcontact.php?page=$prev&search=$search'>이전</a>";
                }
                else
                    echo "<span>PREV</span>";
            //페이지 번호 출력
                for($p=$startpage; $p<=$endpage; $p++){
                    if($page==$p)
                    echo "<a class='active' href='#'>$p</a>";
                else
                    echo "<a href='listcontact.php?page=$p&search=$search'>$p</a>";
    }
           //다음버튼
                if($page<$pagecount){
                    $next=$page+1;
                    echo "<a href='listcontact.php?page=$next&search=$search'>다음</a>";
                }
                else echo "<span>NEXT</span>";
            
            ?>
        </div>
            <?php } else
                echo "검색된 레코드가 없습니다.";
        $conn->close();
         ?>      
        <hr>
            <button type="button" onclick="location.href='newwrite.html'">글쓰기</button>
            <button type="button" onclick="location.href='index.php'">메인화면</button>

</body>

</html>