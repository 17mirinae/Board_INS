<!DOCTYPE html>

<head>
    <style>
        body {
            background-image: url('./Paris_Sky.jpg');
            background-size: 100%;
            background-repeat: repeat;
        }

        div {
            margin: auto;
        }

        audio {
            display: none;
        }
    </style>
</head>

<body>
    <h1 align=center>Calendar Board</h1>
    <audio src="./Letter.mp3" autoplay controls loop></audio>
    <hr>
    <p align=center>
        <a href="Calendar.php"><button>달력으로</button></a>
        <a href="Board.php"><button>게시판으로</button></a><br>
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
    date_default_timezone_set('Asia/Seoul');

    $date_for_search = $_GET['date'];

  $link=mysqli_connect("localhost","root","MSQL111") or die("Read DB Fail!");
  mysqli_select_db($link, "fedora");
  
            $query = "SELECT id, title, writer, date, search, file, checkLock FROM board WHERE date LIKE '".$date_for_search.",%' ORDER BY id desc;";
            $res = mysqli_query($link, $query);
            while($row = mysqli_fetch_array($res)){
                echo "<tr bgcolor = 'honeydew'><td align = center>".$row[0]."</td>";
                if($row[6] == '1') {
                    echo "<td align=center><a href='Lock.php?num=$row[0]'>$row[1]</a>";
                }
                else echo "<td align = center><a href = 'Board_Read.php?num=$row[0]'>$row[1]</a>";
                
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
    <p align=center>
        <a href="./Board_Write.php"><button>글쓰기</button></a>
        <a href="./Board_Delete.php"><button>글삭제</button></a>
</body>

</html>
