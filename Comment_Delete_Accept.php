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
    <h1 align = center>Comment Delete</h1>
    <hr>
<?php
    $num = $_GET['num'];

    $de = $_POST['de'];
    $pw = $_POST['pw'];

    $link=mysqli_connect("localhost","root","MSQL111") or die("Read DB Fail!");
    mysqli_select_db($link, "fedora");

    if(($de != '') && ($pw != '')) {
        $query = "delete from Comment where id='$num' and writer='$de' and password='$pw'";
	echo $query;
        $res = mysqli_query($link, $query) or die ("Delete Comment Failed");
    }
    else echo "<b>댓글 삭제가 완료되었습니다.<b><br><br>";

    echo "<p align = center><a href = 'Board_Read.php?num=$num'><button>확인</button></a></p>";
?>
</body>
</html>
