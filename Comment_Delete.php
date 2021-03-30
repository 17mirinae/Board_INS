<?php
	header("Content-Type: text/html;charset=utf-8");
?>
<!DOCTYPE html>
<head>
    <style>
        td {
            background-color: skyblue;
        }
        .tdInput {
            background-color: honeydew;
        }
        body {
            background-image: url('./Paris_Sky.jpg');
            background-size: 100%;
            background-repeat: repeat;
        }
    </style>
</head>
<body>
<h1 align = center>Comment Delete</h1><hr>
<?php
    $num = $_GET['num'];
    echo "<form action='Comment_Delete_Accept.php?num=$num' method='POST'>";
?>

    <br>
    <table align = center>
        <tr>
            <td align = center>
                <b>닉네임: </b>
            </td>
            <td class="tdInput">
                <input type=text name="de">
            </td>
        </tr>
        <tr>
            <td align = center>
                <b>비밀번호: </b>
            </td>
            <td class="tdInput">
                <input type=password name="pw">
            </td>
        </tr>
    </table>
<?php
        echo "<p align = center>";
        echo "<input type='submit' value='삭제'>";
        echo "<input type='hidden' name='boardNo' value='$num'/>";
?>
        </form>
        <?php echo "<p align = center><a href='./Board_Read.php?num=$num'><button>취소</button></a><p>"; ?>
</body>
</html>
