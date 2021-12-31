<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter Pagination Examples</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 class="text-primary">CodeIgniter Pagination Example</h2>
        <table class="table table-bordered">
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Email</td>
                <td>Coures</td>
            </tr>
            <tbody>
                <?php foreach($student as $res): ?>
                    <tr>
                        <td><?php echo $res->student_id; ?></td>
                        <td><?php echo $res->name; ?></td>
                        <td><?php echo $res->email; ?></td>
                        <td><?php echo $res->course; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p><?php echo $links; ?></p>
    </div>
</body>
</html>