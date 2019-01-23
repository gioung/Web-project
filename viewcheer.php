<?php 
include "dbconn.php";
#응원 내용 출력 페이지
$sql="select uid,title,content from cheer";

if($result = $conn->query($sql)){
    if($result->num_rows>0){
        echo "<table><tr>
        <th>고객아이디</th><th>응원제목</th><th>응원내용</th></tr>";
        while($row = $result -> fetch_assoc()){
        echo "<tr><td>".$row['uid']."</td>";   
        echo "<td>".$row['title']."</td>";
        echo "<td>".$row['content']."</td>";
         echo "</tr>";
        }
        echo "</table>";?>
        
         <?php   
    }
}
else {
    echo $conn->error.":".$sql;
}
?>