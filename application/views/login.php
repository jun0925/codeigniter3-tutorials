<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
</head>
<body>
    <form method="post">
        <table width="600" align="center" border="1" cellspacing="5" cellpadding="5">
            <tr>
                <td colspan="2"><?php echo @$error; ?></td>
            </tr>

            <tr>
                <td>Enter Your Email</td>
                <td><input type="text" name="email" /></td>
            </tr>

            <tr>
                <td>Enter Your Password</td>
                <td><input type="password" name="pass" /></td>
            </tr>

            <tr>
                <td colspan="2" align="center"><input type="submit" value="Login" name="login" /></td>
            </tr>
        </table>
    </form>
</body>
</html>