<!DOCTYPE html>

<head>
    <style>
        body {
            background-image: url('./Paris_Sky.jpg');
            background-size: 100%;
            background-repeat: repeat;
        }

        audio {
            display: none;
        }

    </style>
</head>

<body>
    <div>
        <h1 align=center>Board</h1>
        <audio src="./ANewLife.mp3" autoplay controls loop></audio>
    </div>
    <hr>
    <p align=center>
        <a href="Calendar.php"><button>달력으로</button></a><br>
    </p>
    <table width=1000 align=center>
        <tr bgcolor='lightblue'>
            <th width="70" height="50">번호</th>
            <th width="500" height="50">제목</th>
            <th width="120" height="50">작성자</th>
            <th width="120" height="50">작성일자</th>
            <th width="100" height="50">조회수</th>
        </tr>
        <?php
    $link = mysql_connect("localhost", "chungmj1767", "mschungmj1767M") or die("Read DB Fail!");
    mysql_select_db("chungmj1767", $link);
        
    if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $no_of_records_per_page = 5;
            $offset = ($pageno-1) * $no_of_records_per_page;

            $total_pages_sql = "SELECT COUNT(*) FROM board";
            $result = mysql_query($total_pages_sql, $link);
            $total_rows = mysql_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);

            $sql = "SELECT id, title, writer, date, search, file, checkLock FROM board ORDER BY id desc LIMIT $offset, $no_of_records_per_page";
            $res_data = mysql_query($sql, $link);
            while($row = mysql_fetch_array($res_data)){
                echo "<tr bgcolor = 'honeydew'><td align = center>".$row[0]."</td>";
                if($row[6] == '1') {
                    echo "<td align=center><a href='Lock.php?num=$row[0]'>$row[1]</a>";
                }
                else echo "<td align = center><a href = 'boardread.php?num=$row[0]'>$row[1]</a>";
                
                if($row[5] && ($row[6] == '1')) echo "<img src='./$row[5]' width=20 height=20><img src='./Lock.png' width=20 height=20></td>";
                else if($row[5] && ($row[6] == '0')) echo "<img src='./$row[5]' width=20 height=20></td>";
                else if((!$row[5]) && ($row[6] == '1')) echo "<img src='./Lock.png' width=20 height=20></td>";
                else echo "</td>";
                
                echo "<td align = center>$row[2]</td>
                <td align = center>$row[3]</td>
                <td align = center>$row[4]</td>
                </tr>";
            }

    ?>
    </table>
    <table align=center>
        <tr>
            <td align=center><a href="?pageno=1"><button>[처음]</button></a></td>
            <td align=center class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><button>[이전]</button></a>
            </td>
            <td align=center class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><button>[다음]</button></a>
            </td>
            <td align=center><a href="?pageno=<?php echo $total_pages; ?>"><button>[마지막]</button></a></td>
        </tr>
    </table>
    <p align=center>
        <a href="./Board_Write.php"><button>글쓰기</button></a>
        <a href="./Board_Delete.php"><button>글삭제</button></a>
    </p>
</body>

</html>