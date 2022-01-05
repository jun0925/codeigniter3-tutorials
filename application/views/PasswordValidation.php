<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong Password Validation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 offset-md-1">
                <div class="user_about_content_box">
                    <div class="tab-pane">
                        <h3>Strong Password Validation</h3>
                    </div>
                    <div class="col-md-8">
                        <?php 
                        if($this->session->flashdata('success'))
                        {
                            echo '<span class="text-success" style="font-weight:bold">'.$this->session->flashdata('success').'</span>';
                        }
                        ?>
                    </div>
                    <form method="post" action="<?php echo base_url('passwordcontroller/index'); ?>">
                        <div class="col-md-8">
                            <div class="form-group" id="prime_cat">
                                <input type="email" value="<?php echo set_value('email'); ?>" name="email" class="form-control input-group-lg" placeholder="Email">  
                            </div>
                            <?php 
                            if(form_error('email'))
                            {
                                echo '<span style="color:red">'.form_error('email').'</span>';
                            }
                            ?>
                            <div class="form-group" id="prime_cat">
                                <input type="text" value="<?php echo set_value('new_password'); ?>" name="new_password" class="form-control input-group-lg" placeholder="New Password">
                            </div>
                            <?php 
                            if(form_error('new_password'))
                            {
                                echo "<span style='color:red'>".form_error('new_password')."</span>";
                            } 
                            ?>
                            <div class="form-group" id="prime_cat">
                                <input type="password" value="<?php echo set_value('confirm_password'); ?>" name="confirm_password" class="form-control input-group-lg" placeholder="Confirm Password">  
                            </div>
                            <?php 
                            if(form_error('confirm_password'))
                            {
                                echo "<span style='color:red'>".form_error('confirm_password')."</span>";
                            } 
                            ?>
                            <div class="form-group col-md-12">
                                <input  class="btn btn-primary" type="submit" value="Create account">
                            </div>
                        </div>
                    </form>
                </div> <!--Content box ends-->
            </div>
        </div>
    </div>
</body>
</html>