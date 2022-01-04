<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter Email send using SMTP</title>
</head>
<body>
    <div>
        <h3>Use the form below to send email</h3>
        <?php echo form_open('EmailController/send');?>
            <input type="email" name="to" placeholder="Enter Receiver Email" />
            <br /><br />
            <input type="text" name="subject" placeholder="Enter Subject" />
            <br /><br />
            <textarea name="message" row="6" placeholder="Enter your message here"></textarea>
            <br /><br />
            <input type="submit" value="Send Email" />
        </form>
    </div>
</body>
</html>