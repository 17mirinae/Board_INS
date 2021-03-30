<!DOCTYPE html>
<head>
    <style>
        body {
            background-image: url('./Paris_Sky.jpg');
            background-size: 100%;
            background-repeat: no-repeat;
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
<h1 align = center>Delete</h1><hr>
<form action="Board_Delete_Accept.php" method=post align = center>
    <br>
    <table align = center>
        <tr>
            <td width = 120><b>글의 번호</b></td>
            <td class = 'tdInput'><input type=text name="de"></td>
        </tr>
        <tr>
            <td><b>비밀번호</b></td>
            <td class="tdInput"><input type=password name="pw"></td>
        </tr>
    </table>
    <br>
    <input type='submit' value='삭제'>
    </form>
    <p>
        <a href="Board.php"><button>취소</button></a>
    </p>
</body>
</html>
