<!DOCTYPE html>
<head>
    <style>
        body {
            background-image: url('./Paris_Sky.jpg');
            background-size: 100%;
            background-repeat: repeat;
        }
        * {
            text-align: center;
        }
    </style>
</head>
<body>
<h1>Delete</h1>
<hr>
<?php
      $de = $_POST['de'];
      $pw = $_POST['pw'];

      $link=mysqli_connect("localhost","root","MSQL111") or die("Read DB Fail!");
      mysqli_select_db($link, "fedora");

      if(($de != '') && ($pw != '')) {
          $query = "delete from board where id='$de' and password='$pw'";
          $res = mysqli_query($link, $query) or die("Board Delete Failed");
      }

      echo "<p><b>수정이 완료되었습니다.</b></p><br><br>";
      echo "<p><a href = 'Board.php'><button>확인</button></a></p>";
?>
</body>
</html>
