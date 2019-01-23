<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <title>농산물마트</title>
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

                .divider {
                    margin: 0.5em 0 0.5em 0;
                    border: 0;
                    height: 1px;
                    width: 100%;
                    display: block;
                    background-color: #4f6fad;
                    background-image: linear-gradient(to right, #ee9cb4, #4f6fad);
                }

                input[type=text],
                input[type=email],
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

                input[type=submit],
                button {
                    background-color: #4CAF50;
                    color: white;
                    padding: 12px 20px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    float: right;
                    margin: 0 10px;
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

                .col-50{
                    float: left;
                    width: 50%;
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
    <h2>내용 확인</h2>
    <p>게시글의 내용을 확인하고 수정합니다.(수정 및 삭제는 작성자만 가능)</p>
    <?php 
        include_once "dbconn.php";
        if(isset($_GET['no']))$no=$_GET['no'];
        $sql="select * from list where no=$no";
        $result=$conn->query($sql);
        
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
        }
        else{
            echo $conn->error.":".$sql;
        }
        $state=0;

    ?>
    <div class="divider"></div>
    <div class="container">
        <form action="modlist_proc.php" method="post">
        
        <div class="row">
            <div class="col-25">
                <label for="no">글번호 : <?=$row['no']?></label>
                <input type="text" value="<?=$row['no']?>" name="no" hidden>
            </div>
            <div class="col-25">
                <label for="uid">ID : <?=$row['uid']?></label>
            </div>   
            <div class="col-50"> 
                <label for="wdate">작성일 : <?=$row['wdate']?></label>
            </div>
        </div>    
        <?php if($_SESSION['id']==$row['uid'])$state=1;?>
        <div class="row">
            <div class="col-25">
                <label for="title">제목 : </label>
            </div>
            <div class="col-75">
            <?php if($state==1) { ?>
                <input type="text" value="<?=$row['title']?>" name="title" required> 
            <?php }     
             else { ?>
                <label for="title"><?=$row['title']?></label>
            <?php } ?>   
            </div>  
        </div>   
            <div class="row">
              <div class="col-25">
                <label for="msg">내용</label>
              </div>
              <?php if($state==1) { ?>
                <textarea name="msg" cols="80" rows="10" required><?=$row['msg']?></textarea>  
              <?php }  
              else { ?>  
                <textarea name="msg" cols="80" rows="10" readonly><?=$row['msg']?></textarea> 
              <?php } ?>      
            </div>
            <div class="row">
            <button type="button" onclick="location.href='listcontact.php?page=1'">이전화면</label>
            <?php if($state==1) { ?>
            <button type="button" onclick="location.href='dellist.php?no=<?=$row['no']?>'">삭제하기</button>
            <input type="submit" value="수정하기">  <?php } ?>
            </div>
        </form>
    </div>

</body>

</html>