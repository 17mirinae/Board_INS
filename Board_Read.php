<?php
    header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<h1 align=center>Read</h1>
<head>
    <style>
        body {
            background-image: url('./Paris_Sky.jpg');
            background-size: 100%;
            background-repeat: repeat;
        }

	table {
	    display: center;
	    margin: 0 auto;
	}

        td {
            text-align: center;
            background: lightblue;
        }

        .tdInput {
            text-align: center;
            background: honeydew;
        }

        audio {
            display: none;
        }

    </style>
</head>

<body>
    <hr>
    <audio src="./AsWeLive.mp3" autoplay controls loop></audio>
    <table width = 800 height = 200 align: center>
    <?php
        $num = $_GET['num'];

        $link = mysqli_connect("localhost", "root", "MSQL111") or die("DB Connection Failed");
        mysqli_select_db($link, "fedora") or die("DB Selection Failed");

        $query = "SELECT title, writer, ip, date, content, file from board where id='$num'";
        $res = mysqli_query($link, $query);

        while($row = mysqli_fetch_array($res)) {
            echo "<tr bgcolor='lightblue'><td width=120><b>제목</b></td><td bgcolor='honeydew' class='tdInput'>$row[0]</td></tr>";
            echo "<tr bgcolor='lightblue'><td><b>작성자</b></td><td bgcolor='honeydew' class='tdInput'>$row[1]</td></tr>";
            echo "<tr bgcolor='lightblue'><td><b>IP</b></td><td bgcolor='honeydew' class='tdInput'>$row[2]</td></tr>";
            echo "<tr bgcolor='lightblue'><td><b>작성일자</b></td><td bgcolor='honeydew' class='tdInput'>$row[3]</td></tr>";
            echo "<tr bgcolor='lightblue'><td><b>내용</b></td><td height = 150 bgcolor='honeydew' class = 'tdInput'>$row[4]</td></tr>";
            echo "<tr bgcolor='lightblue'><td><b>첨부파일</b></td><td class='tdInput'><img src='./Images/$row[5]' alt='No Image' height=150 weight=150 bgcolor='honeydew'></td></tr>";
        }

        $query = "UPDATE board SET search = search + 1 WHERE id = '$num'";
        $res = mysqli_query($link, $query);
    ?>
    </table><br><br>
    <p align=center>
        <a href ="./Board.php"><button>글목록</button></a>
        <?php echo "<a href='./Board_Edit.php?num=$num'><button>글수정</button></a>"; ?>
        <a href="./Board_Delete.php"><button>글삭제</button></a></p>

    <?php
        $query = "select writer, content, date, no from Comment where id = '$num'";
        $res = mysqli_query($link, $query);

        echo "<table align = center width=800>";
        while($row = mysqli_fetch_array($res)) {
            echo "<tr bgcolor='lightblue'><td width=360><b>$row[0]</b></td><td width=160 colspan='2'>$row[2]</td></tr>";
            echo "<tr><td bgcolor='honeydew'>$row[1]</td>
		<form action='./Comment_Edit.php?no=$row[3]' method='GET'>
		<td width=80 bgcolor='white'><a href='./Comment_Edit.php?no=$row[3]'>수정</a></td>
		<input type='hidden' name='postNum' value=$num>
		</form>
	
		<td width=80 bgcolor='white'><a href='./Comment_Delete.php?num=$num'>삭제</a></td></tr>";
        }
        echo "</table>";
        echo "<p align = center>";
        echo "<a href='./Comment_Write.php?num=$num'><button>댓글 작성</button></a></p>";
    ?>
</body>
</html>
