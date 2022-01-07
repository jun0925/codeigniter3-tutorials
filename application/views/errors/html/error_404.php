<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$ci = new CI_Controller();
$ci =& get_instance();
$ci->load->helper('url');
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Page Not Found</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Amarante' rel='stylesheet' type='text/css'>
    <style type="text/css">
        body{
            background:url('<?php echo base_url();?>assets/front/iamges/404.png');
            margin:0;
            background-repeat:no-repeat;
        }
    </style>
</head>
<body>
    <div class="container" style="margin-top:200px;margin-left:550px;">
        <p><a class="btn btn-warning" href="<?php echo base_url(); ?>">Go Back to Home</a></p>
    </div>
</body>
</html>
