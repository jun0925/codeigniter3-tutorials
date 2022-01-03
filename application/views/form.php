<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form method="post">
        <?php // echo validation_errors(); ?>
        <h5>Name</h5>
        <input type="text" name="name" value="<?php echo set_value('name'); ?>" />
        <?php if(form_error('name'))
        {
            echo '<span style="color:red">'.form_error('name').'</span>';
        }
        ?>
        <h5>Email</h5>
        <input type="email" name="email" value="<?php echo set_value('email'); ?>" />
        <?php if(form_error('email'))
        {
            echo '<span style="color:red">'.form_error('email').'</span>';
        }
        ?>
        <div><input type="submit" value="Submit" /></div>
    </form>
</body>
</html>