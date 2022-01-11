<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codeigniter 다중 드래그 앤 드롭 이미지 업로드</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css' type='text/css' rel='stylesheet'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js' type='text/javascript'></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>PHP Dropzone 파일 업로드 예제</h2>
                <form action="<?php echo base_url('Upload_File/dragDropUpload/'); ?>" class="dropzone"></form>
            </div>
        </div>
        <div class="gallery">
            <div class="col-md-12">
                <h3>업로드된 파일:</h3>
                <?php 
                if(!empty($files))
                {
                    foreach($files as $row)
                    {
                        $filePath = "./upload/".$row["file_name"];
                        $fileMime = mime_content_type($filePath);
                        ?>
                        <embed src="<?php echo base_url('upload/'.$row['file_name']); ?>" type="<?php echo $fileMime; ?>" width="200px" height="140px">
                        <?php
                    }
                }
                else
                {
                    echo '<p>No file(s) found...</p>';
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>