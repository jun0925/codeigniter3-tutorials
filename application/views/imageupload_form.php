<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image in Codeigniter</title>
</head>
<body>
    <?php echo @$error; ?>
    <?php echo form_open_multipart('ImageUpload/upload'); ?>
    <?php echo '<input type="file" name="profile_pic" size="20" />'; ?>
    <?php echo '<input type="submit" name="submit" value="upload" />'; ?>
    <?php echo '</form>'; ?>
</body>
</html>