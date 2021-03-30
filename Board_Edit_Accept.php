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
    <h1>Board Edit</h1>
    <hr>
    <?php
     
                $num = $_GET['num'];

                $link = mysqli_connect("localhost", "root", "MSQL111") or die("DB Connection Failed!");
                    mysqli_select_db($link, "fedora");

                    date_default_timezone_set('Asia/Seoul');
                $date = Date("Y/n/j, H:i:s D");
                $ip = $_SERVER["REMOTE_ADDR"];

                $writer = $_POST['writer'];
                $title = $_POST['title'];
                $content = $_POST['content'];
                $password = $_POST['password'];
                $file = $_FILES['userfile'];
    
                if(isset($_POST['lock'])) {
                    $isLock = '1';
                } else {
                    $isLock = '0';
                }
    
                if(!$file) {
                    ini_set("display_errors", "1");
                    $uploaddir = './Images/';
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
                }
    
            
            
                 if(($writer != '') && ($title != '') && ($content != '') && ($password != '')) {
                                $query = "UPDATE board SET writer = '$writer', password = '$password', title = '$title', content = '$content', ip = '$ip', date = '$date', search = '$search', file = '$file', checkLock = '$isLock' WHERE id = '$num'";
                                $res = mysqli_query($link, $query) or die("Update Failed");
                }

                echo "<b>글의 수정이 완료되었습니다.</b><br><br>";
                echo "<p align = center><a href = 'Board_Read.php?num=$num'><button>확인</button></a></p>";
        ?>
</body>

</html>
