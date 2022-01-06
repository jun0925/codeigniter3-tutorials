<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter를 사용하여 CSV 데이터를 MySQL로 가져오기</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container box">
        <h3 align="center">CodeIgniter를 사용하여 CSV 데이터를 MySQL로 가져오기</h3>
        <form method="post" id="import_csv" enctype="multipart/form-data">
            <div class="form-group">
                <label>CSV 파일 선택</label>
                <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
            </div>
            <br />
            <button type="submit" name="import_csv" class="btn btn-info" id="import_csv">CSV 가져오기</button>
        </form>
        <br />
        <div id="imported_csv_data"></div>
    </div>
    <script>
        $(document).ready(function(){
            // ajax로 data를 로드함
            load_data();

            function load_data()
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>csv_import/display_data",
                    method: "POST",
                    success: function(data)
                    {
                        $("#imported_csv_data").html(data);
                    }
                });
            }

            $("#import_csv").on("submit", function(event){
                event.preventDefault();
                $.ajax({
                    url: "<?php echo base_url(); ?>csv_import/import_csv",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function()
                    {
                        $("#import_csv_btn").html('Importing...');
                    },
                    success: function(data)
                    {
                        $("#import_csv")[0].reset();
                        $("#import_csv_btn").attr('disabled', false);
                        $("import_csv_btn").html('Import Done');
                        load_data();
                    }
                });
            });
        });
    </script>
</body>
</html>