<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL의 데이터를 CSV파일로 내보내기</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Export Data -->
    <a href="<?php echo base_url('/ExportController/exportCSV'); ?>" class="btn btn-primary">내보내기</a><br /><br />

    <!-- User Records -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>이름</th>
                <th>이메일</th>
                <th>모바일</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($usersData as $key => $val)
            {
                echo "<tr>";
                    echo "<td>".$val['name']."</td>";
                    echo "<td>".$val['email']."</td>";
                    echo "<td>".$val['phone']."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>