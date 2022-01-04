<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <?php echo form_open('blog/create')?>
        <h5>Title</h5>
        <input type="text" name="title" value="<?= set_value('title'); ?>" />
        <?php if(form_error('title'))
        {
            echo '<span style="color:red">'.form_error('title').'</span>';
        }
        ?>
        <h5>Contents</h5>
        <textarea name="contents" cols="30" rows="10" name="contents" value="<?= set_value('contents'); ?>"></textarea>
        <?php if(form_error('contents'))
        {
            echo '<span style="color:red">'.form_error('contents').'</span>';
        }
        ?>
        <br />
        <input type="submit" value="Create" />
        <?php echo anchor('Blog','Back'); ?>
    </form>
</body>
</html>