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
    <h1>Comment Edit</h1><hr>
    <?php $num = $_POST['postNum'];
     echo "<form action='./Board_Read.php' method = 'GET'>";?>
    
    <?php
	$no = $_POST['commNum'];
        $link = mysqli_connect("localhost", "root", "MSQL111") or die("DB Connection Failed!");
        mysqli_select_db($link, "fedora");
        
        $writer = $_POST['writer'];
        $content = $_POST['content'];
        $password = $_POST['password'];

        if(($writer != '') && ($content != '') && ($password != '')) {
            $query = "UPDATE Comment SET writer = '$writer', content = '$content', password = '$password' WHERE no = '$no'";
            $res = mysqli_query($link, $query) or die("Update Failed");
        }

        echo "<b>댓글의 수정이 완료되었습니다.</b><br><br>";
	echo "<input type='hidden' name='num' value='$num'/>";
        echo "<p align = center><input type='submit' value='확인'></p>";
        echo "</form>";
    ?>
</body>
</html>
