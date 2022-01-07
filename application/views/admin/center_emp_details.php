<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Center Emp Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="box-body table-responsive" >
    <table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="col-md-2 col-xs-5">Name</th>
            <th class="col-md-2 col-xs-3">Depmt</th>
            <th class="col-md-2 col-xs-3">Course</th>
        </tr>
    </thead>
        <form method="post">
            <?php for ($i=0; $i < 3 ; $i++) 
            {?> 
            <tr>
                <td><input type="text" name="Name[]"></td>
                <td><input type="text" name="Depmt[]"></td>
                <td><input type="text" name="course[]"></td>
            </tr>
        
            <?php  } ?>
        
            <tr><td colspan="3" align="center"> 
            <input type="submit" class="btn btn-primary" value="save"></td></tr>
        </form>
    </table>
    </div>
</body>
</html>