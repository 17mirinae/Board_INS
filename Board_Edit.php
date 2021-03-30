<!DOCTYPE html>
<html>
<h1 align = center>Board Edit</h1>
<head>
    <style>
        body {
            background-image: url('./Paris_Sky.jpg');
            background-size: 100%;
            background-repeat: repeat;
        }
        td {
            text-align: center;
            background: lightblue;
        }
        .tdInput {
            text-align: left;
            background: honeydew;
        }
        audio {
            display: none;
        }
    </style>
</head>
<body>
    <hr>
    <p align = center>
        <a href="Board.php"><button>취소</button></a>
        <audio src="./AsWeLive.mp3" autoplay controls loop></audio>
    </p>
    <?php $num = $_GET['num'];
        echo "<form action='Board_Edit_Accept.php?num=$num' method='POST'>"; ?>
        <table align = center>
        <?php
            $link = mysqli_connect("localhost", "root", "MSQL111") or die("DB Connection Failed!");
            mysqli_select_db($link, "fedora");

            $query = "SELECT title, writer, content, password, file, checkLock FROM board WHERE id = '$num'";
            $res = mysqli_query($link, $query);

            while($row = mysqli_fetch_row($res)) {
                echo "<tr>
                        <td width=120><b>제목</b></td>
                        <td class='tdInput'>
                            <textarea name='title'>$row[0]</textarea>
                        </td>
                      </tr>";
                echo "<tr>
                        <td><b>작성자<b></td>
                        <td class='tdInput'>
                            <textarea name='writer'>$row[1]</textarea>
                        </td>
                      </tr>";
                echo "<tr>
                        <td><b>내용</b></td>
                        <td class='tdInput'>
                            <textarea name='content' rows = 20 cols = 100>$row[2]</textarea>
                        </td>
                      </tr>";
                echo "<tr>
                        <td><b>비밀번호</b></td>
                        <td class='tdInput'>
                            <input type = 'password' name ='password' value = '$row[3]'>
                            <input type='checkbox' value='$row[5]' name = 'lock'/>해당 글 잠금
                        </td>
                      </tr>";
                echo "<tr>
                        <td><b>첨부파일</b></td>
                        <td class='tdInput'>
                            <input name='userfile' type='file' />
                        </td>
                      </tr>";
            }
            echo "</table>";
        echo "<p align = center><input type = 'submit' value = '작성'></p>";

        echo "<input type='hidden' name='boardNo' value='$num'/>";
        ?>
</form>
</body>
</html>
