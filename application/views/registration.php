<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>등록 폼</title>
</head>
<body>
    <form method="post">
        <table width="600" border="1" cellspacing="5" cellpadding="5">
            <tr>
                <td width="230">이름을 입력하세요</td>
                <td width="329"><input type="text" name="name" /></td>
            </tr>
            <tr>
                <td>이메일 주소를 입력하세요</td>
                <td><input type="text" name="email"/></td>
            </tr>
            <tr>
                <td>연락처를 입력하세요</td>
                <td><input type="text" name="mobile"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="데이터저장" name="save" /></td>
            </tr>
        </table>
    </form>
</body>
</html>