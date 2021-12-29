<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>데이터 보기</title>
</head>
<body>
    <table width="600" border="1" cellspacing="5" cellpadding="5">
        <tr style="background:#CCC">
            <th>No</th>
            <th>이름</th>
            <th>이메일</th>
            <th>연락처</th>
        </tr>
        <?php 
        $i = 1;
        foreach($data as $row)
        {
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$row->name."</td>";
            echo "<td>".$row->email."</td>";
            echo "<td>".$row->mobile."</td>";
            echo "</tr>";
            $i++;
        }
        ?>
    </table>
</body>
</html>