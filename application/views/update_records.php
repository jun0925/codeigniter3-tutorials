<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>데이터 수정하기</title>
</head>
<body>
    <?php 
    $i = 1;
    foreach($data as $row)
    {
    ?>
    <form method="post">
        <table width="600" border="1" cellspacing="5" cellpadding="5">
            <tr>
                <td width="230">이름을 입력하세요</td>
                <td width="329"><input type="text" name="name" value="<?php echo $row->name; ?>" /></td>
            </tr>
            <tr>
                <td>이메일을 입력하세요</td>
                <td><input type="text" name="email" value="<?php echo $row->email; ?>" /></td>
            </tr>
            <tr>
                <td>연락처를 입력하세요</td>
                <td><input type="text" name="mobile" value="<?php echo $row->mobile; ?>" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="update" value="데이터 수정" /></td>
            </tr>
        </table>
    </form>
    <?php
    }
    ?>
</body>
</html>