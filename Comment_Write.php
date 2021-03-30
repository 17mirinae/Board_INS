<!DOCTYPE html>
<head>
    <style>
        body {
            background-image: url('./Paris_Sky.jpg');
            background-size: 100%;
            background-repeat: repeat;
        }
        td {
            margin: 0 auto;
            background-color: lightblue;
            text-align: center;
        }
        .tdInput {
            background-color: honeydew;
            text-align: left;
        }
    </style>
</head>
<body>
<h1 align = center>Comment Write</h1>
<hr>
    <p align = center>
        <?php
            $num = $_GET['num'];
            echo "<a href='Board_Read.php?num=$num'><button>취소</button></a>";
        ?>
    </p>
    <?php
        echo "<form action='Comment_Accept.php' method='POST'>";
    ?>
        <table height = 200 align = center>
        <?php

            echo "<tr>
                    <td width = 120><b>작성자</b></td>
                    <td class='tdInput'>
                        <textarea name='writer' rows = 2 cols = 100></textarea>
                    </td>
                  </tr>";
            echo "<tr>
                    <td><b>내용</b></td>
                    <td class='tdInput'>
                        <textarea name='content' rows = 10 cols = 100/></textarea>
                    </td>
                  </tr>";
            echo "<tr>
                    <td><b>비밀번호</b></td>
                    <td class='tdInput'>
                        <input type='password' name='password'/>
                    </td>
                  </tr>";
            echo "</table>\n";
        ?>
        </table>
        <p align = center>
            <script>
                document.write("<input type='submit' value='작성'>");
            </script>
        </p>
        <?php echo "<input type='hidden' name='boardNo' value='$num'/>";
        echo "</form>"; ?>
</body>
</html>
