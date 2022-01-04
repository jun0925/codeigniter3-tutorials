<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <table width="600" border="1" cellspacing="5" cellpadding="5">
        <tr style="background:#CCC">
            <th>No</th>
            <th>title</th>
            <th>contents</th>
            <th>update</th>
            <th>delete</th>
        </tr>
        <?php 
        $i = 1;
        foreach($data as $row)
        {
            echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$row->title."</td>";
                echo "<td>".$row->contents."</td>";
                echo "<td>". anchor('blog/update/'.$row->id, 'Update')."</td>";
                echo "<td>". anchor('blog/delete/'.$row->id, 'Delete') ."</td>";
            echo "<tr>";
            $i++;
        }
        ?>
    </table>
    <br />
    <?php echo anchor('blog/create', "Create"); ?>
</body>
</html>