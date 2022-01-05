<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>save data using Ajax</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 </head>
</head>
<body>
    <div class="container">
        <h1 align="center">Ajax Form using CI</h1>
        <div class="form-group">
            <label for="name">Enter Your Name:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" />
        </div>
        <div class="form-group">
            <label for="email">Enter Your Email:</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" />
            <div id="msg"></div>
        </div>
        <div class="form-group">
            <label for="course">Enter Your Course:</label>
            <input type="text" name="course" id="course" class="form-control" placeholder="Enter course">
        </div>
        <input type="button" value="save data" class="btn btn-primary" id="butsave" />
    </div>
    <script type="text/javascript">
        // Ajax post
        $(document).ready(function()
        {
            // blur() 대상 엘리먼트가 포커스를 잃었을 때 이벤트를 처리하는 이벤트 핸들러
            $("#email").blur(function(){
                let email = $("#email").val();
                if(email != "")
                {
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url('/AjaxController/checkUser'); ?>",
                        dataType: "html",
                        data: {email: email},
                        success: function(res)
                        {
                            if(res == 1)
                            {
                                $("#msg").addClass("invalid-feedback");
                                $("#msg").css({"display":"block"});
                                $("#msg").html("This email already exists");
                            }
                            else
                            {
                                $("#msg").addClass("valid-feedback");
                                $("#msg").css({"display":"block"});
                                $("#msg").html("Congrates email available!");
                            }
                        },
                        error:function()
                        {
                            alert('some error');
                        }
                    });
                }
                else
                {
                    alert("pls enter your email id");
                }
            });

            $("#butsave").click(function()
            {
                let name = $("#name").val();
                let email = $("#email").val();
                let course = $("#course").val();

                if(name != "" && email != "" && course != "")
                {
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url('/AjaxController/savedata'); ?>",
                        dataType: 'html',
                        data: {name: name, email: email, course:course},
                        success: function(res)
                        {
                            if(res == 1)
                            {
                                alert('Data saved successfully');
                            }
                            else
                            {
                                alert('Data not saved');
                            }
                        },
                        error: function()
                        {
                            alert('data not saved');
                        }
                    });
                }
                else
                {
                    alert("pls fill all fields first");
                }
            });
        });
    </script>
</body>
</html>