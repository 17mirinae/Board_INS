<!DOCTYPE html>
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
<?php $num = $_GET['num'] ?>
<form action="Lock_Check.php?num=<?=$num?>" method=post align = center>
    <br>
    <table align = center>
        <tr>
            <td><b>비밀번호</b></td>
            <?php echo "<td class='tdInput'><input type=password name='pw'></td>";?>
        </tr>
    </table>
    <br>
    <input type='submit' value='확인'>
</form>
<p>
    <a href="Board.php"><button>취소</button></a>
</p>
</body>
</html>
