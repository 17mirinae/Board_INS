<!DOCTYPE html>
<head>
    <style>
        * {
            text-align: center;
        }
        body {
            background-image: url('./Paris_Sky.jpg');
            background-size: 100%;
            background-repeat: repeat;
        }
    </style>
</head>
<body>
<h1 align = center>Comment Accept</h1><hr>
<?php
    $num = $_POST['boardNo'];
    echo "<form action=\"Board_Read.php?num=$num\" method=\"POST\">";
    $link = mysqli_connect("localhost", "root", "MSQL111") or die ("DB Connection Failed");
    mysqli_select_db($link, "fedora") or die("DB Selection Failed");

    date_default_timezone_set('Asia/Seoul');
    $date = Date("Y/n/j, H:i:s D");

    $content = $_POST['content'];
    $writer = $_POST['writer'];
    $password = $_POST['password'];

    $query = "select no from Comment";
    $res = mysqli_query($link, $query);
    while($row = mysqli_fetch_array($res)) {
        $CommentNo = $row[0];
    }
    $CommentNo += 1;

    if(($writer != '') && ($content != '') && ($password != '')) {
        $query = "INSERT INTO Comment(no, id, writer, password, content, date) VALUES('$CommentNo', '$num', '$writer', '$password', '$content', '$date');";
        $res = mysqli_query($link, $query) or die("Insert Failed");
    }
    echo "<p><b>댓글이 작성되었습니다.</b></p><br>";
    echo "<a href='Board_Read.php?num=$num'><button>확인</button></a>";
    echo "</form>";
?>

</body>
</html>
