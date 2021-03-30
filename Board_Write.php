<!DOCTYPEhtml>
<h1 align=center>Write</h1>
<html>
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
    <p align=center>
        <a href="Board.php"><button>글목록</button></a>
    </p>
    <audio src="./AsWeLive.mp3" autoplay controls loop></audio>
    <form name='my_form' enctype="multipart/form-data" action="Board_Accept.php" method="POST">
        <table align=center>
            <?php
            $link = mysqli_connect("localhost", "root", "MSQL111") or die("DB Connection Failed!");
            mysqli_select_db($link, "fedora");

            date_default_timezone_set('Asia/Seoul');
            $date = Date("Y/n/j, H:i:s D");
            $ip = $_SERVER["REMOTE_ADDR"];

            echo "<tr><td><b>작성자 : </b></td><td class='tdInput'><textarea name='writer' required/></textarea></td></tr>";
            echo "<tr><td><b>제목 : </b></td><td class='tdInput'><textarea name='title' cols = 100 required></textarea></td></tr>";
            echo "<tr><td><b>내용 : </b></td><td class='tdInput'><textarea name='content' rows = 20 cols = 100 required/></textarea></td></tr>";
            echo "<tr><td><b>비밀번호 : </b></td><td class='tdInput'><input type='password' name='password' required/><input type='checkbox' value = '1' name = 'lock'/>해당 글 잠금</td></tr>";
            echo "<tr><td><b>첨부파일 : </b></td><td class='tdInput'><input name='userfile' type='file'  size=80000/></td></tr>";
            echo "</table>\n";
            echo "<p align = center><input type='submit' value = '작성'></p>";

            $writer = $_POST['writer'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $password = $_POST['password'];
            
            if(isset($_POST['lock'])) {
                $isLock = '1';
            } else {
                $isLock = '0';
            }

            ini_set("display_errors", "1");
            $uploaddir = '/var/www/html/Board/Images/';
            $uploadfile = $uploaddir.basename($_FILES['userfile']['name']);
            echo '<pre>';
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
            } else {
                print "파일 업로드 공격의 가능성이 있습니다!\n";
            }
            echo '자세한 디버깅 정보입니다:';
            $file=$_FILES['userfile']['name'];
            print_r($_FILES);
            print "</pre>";
            
            $query = "select id from board order by id asc";
            $res = mysqli_query($link, $query);

            while($row = mysqli_fetch_row($res)) {
                $id = $row[0];
            }

            $id = $id + 1;
            
            if(($writer != '') && ($title != '') && ($content != '') && ($password != '') && ($isLock == '1')) {

                $query = "insert into board(id, writer, password, title, content, ip, date, search, file, checkLock) values('$id', '$writer', '$password', '$title', '$content', '$ip', '$date', '0', '$file', '$isLock') on duplicate key update id = id + 1;";
                $res = mysqli_query($link, $query) or die("Insert Fail!");
                
                echo "<script>location.href = 'Board.php';</script>";
            }
            else if(($writer != '') && ($title != '') && ($content != '') && ($password != '') && ($isLock == '0')) {
                $query = "insert into board(id, writer, password, title, content, ip, date, search, file) values('$id', '$writer', '$password', '$title', '$content', '$ip', '$date', '0', '$file') on duplicate key update id = id + 1;";
                $res = mysqli_query($link, $query) or die("Insert Fail!");
                
                echo "<script>location.href = 'Board.php';</script>";
            }?>
        </table>
    </form>
</body>

</html>
