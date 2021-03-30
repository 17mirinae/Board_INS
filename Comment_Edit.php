<!DOCTYPE html>
<head>
    <style>
        * {
            text-align: center;
        }
        th {
            text-align: center;
            background-color: lightblue;
        }
        td {
            text-align: left;
            background-color: honeydew;
        }
        textarea {
            text-align: left;
        }
        input {
            text-align: left;
        }
        body {
            background-image: url('./Paris_Sky.jpg');
            background-size: 100%;
            background-repeat: repeat;
        }
    </style>
</head>
<body>
    <h1>Comment Edit</h1><hr>
    <p align = center>
    </p>
    <?php $no = $_GET['no'];
    echo "<form action='Comment_Edit_Accept.php' method='POST'>"; ?>
    <table align=center>
        <?php
            $link = mysqli_connect("localhost", "root", "MSQL111") or die("DB Connection Failed");
            mysqli_select_db($link, "fedora");
            $query = "SELECT id, writer, content, password FROM Comment WHERE no = '$no'";
            $res = mysqli_query($link, $query);
            while($row = mysqli_fetch_row($res)) {
                $num = $row[0];
                echo "<tr>
                    <th width = 120>작성자</th>
                    <td><textarea name='writer'>$row[1]</textarea></td>
                </tr>";
                echo "<tr>
                    <th>내용</th>
                    <td><textarea name='content' rows = 20 cols =100>$row[2]</textarea></td>
                </tr>";
                echo "<tr>
                    <th>비밀번호</th>
                    <td><input type='password' name = 'password' value ='$row[3]'></td>
                </tr>";
            }
    echo "</table>";
    echo "<p align = center><input type='submit' value='수정'></p>";
    echo "<input type='hidden' name='postNum' value='$num'/>";
    echo "<input type='hidden' name='commNum' value='$no' />";
    echo "</form>";
    echo "<a href='Board_Read.php?num=$num'><button>취소</button></a>";
        ?>
</body></html>
