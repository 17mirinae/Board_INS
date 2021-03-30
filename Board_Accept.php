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
    <h1>Write</h1>
    <hr>
    <?php
     
                echo "<form action = 'Board.php' method = 'POST'>";

                $link = mysqli_connect("localhost", "root", "MSQL111") or die("DB Connection Failed!");
                mysqli_select_db($link, "fedora");

                date_default_timezone_set('Asia/Seoul');
                $date = Date("Y/n/j, H:i:s D");
                $ip = $_SERVER["REMOTE_ADDR"];

                $query = "select id from board order by id asc";
                $res = mysqli_query($link, $query);

                while($row = mysqli_fetch_row($res)) {
                    $id = $row[0];
                }

                $id = $id + 1;
		
                $writer = $_POST['writer'];
                $title = $_POST['title'];
                $content = $_POST['content'];
                $password = $_POST['password'];
                
		$uploads_dir="./Images";
		
		$error=$_FILES['userfile']['error'];
		$file_name=$_FILES['userfile']['name'];

/*		if($error != UPLOAD_ERR_OK) {
			switch($error) {
				case UPLOAD_ERR_INI_SIZE:
				case UPLOAD_ERR_FORM_SIZE:
					echo "파일이 너무 큽니다.(".$error.")";
					break;
				case UPLOAD_ERR_NO_FILE:
					break;
				default:
					echo "파일이 제대로 업로드되지 않았습니다.(".$error.")";
			}
		}*/

		$result=move_uploaded_file($_FILES['userfile']['tmp_name'],$uploads_dir.'/'.$file_name);
		$file = $file_name;
    
                if(isset($_POST['lock'])) {
                    $isLock = '1';
                } else {
                    $isLock = '0';
                }
/*echo "<pre>";
print_r($_POST);
echo "qwe<br>";
print_r($_FILES);
die();*/
            
                if(($writer != '') && ($title != '') && ($content != '') && ($password != '') && ($isLock == '1')) {
	                $query = "insert into board(id, writer, password, title, content, ip, date, search, file, checkLock) values('$id', '$writer', '$password', '$title', '$content', '$ip', '$date', '0', '$file',1) on duplicate key update id = id + 1;";
	                $res = mysqli_query($link, $query) or die("Insert Fail!");
	        } else if (($writer != '') && ($title != '') && ($content != '') && ($password != '') && ($isLock == '0')) {
	                $query = "insert into board(id, writer, password, title, content, ip, date, search, file) values('$id', '$writer', '$password', '$title', '$content', '$ip', '$date', '0', '$file') on duplicate key update id = id + 1;";
	                $res = mysqli_query($link, $query) or die("Insert Fail!");
                }
 
                echo "<b>글의 작성이 완료되었습니다.</b><br><br>";
                echo "<p align = center><a href = 'Board.php'><button>확인</button></a></p>";
    
                echo "</form>";
        ?>
</body>

</html>
