<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-image: url('./Paris_Sky.jpg');
            background-size: 100%;
            background-repeat: repeat;
        }
        td {
            background-color: lightblue;
        }
        .tdInput {
            background-color: honeydew;
        }
        * {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 align = center>Locked</h1><hr>
<?php
    $num = $_GET['num'];
    $pwInput = $_POST['pw'];
    
    $link = mysqli_connect("localhost", "root", "MSQL111") or die("DB Connection Failed");
    mysqli_select_db($link, "fedora");
    
    $query = "SELECT password FROM board WHERE id = '$num'";
    $res = mysqli_query($link, $query);
    
    while($row = mysqli_fetch_row($res)) {
        $lockPassword = $row[0];
    }
    
    if($lockPassword == $pwInput) {
        echo "<form action='Board_Read.php?num=$num' method=post align = center>";
        echo "<b>비밀번호가 확인되었습니다.</b><br><br>";
        echo "<a href='Board_Read.php?num=$num'><button>확인</button></a>";
        echo "</form>";
    } else {
        echo "<form action='Board.php' method=post align = center>";
        echo "<b>틀린 비밀번호입니다.</b><br><br>";
        echo "<a href='Board.php'><button>확인</button></a>";
        echo "</form>";
    }
?>
</body>
</html>
