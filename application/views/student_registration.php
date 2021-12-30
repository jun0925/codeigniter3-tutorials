<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration form</title>
</head>
<body>
    <form method="post">
        <table width="600" align="center" border="1" cellspacing="5" cellpadding="5">
            <tr>
                <td colspan="2"><?php echo @$error; ?></td>
            </tr>

            <tr>
                <td width="230">Enter Your Name</td>
                <td width="329"><input type="text" name="name" /></td>
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
                <td>Enter Mobile</td>
                <td><input type="text" name="mobile" /></td>
            </tr>

            <tr>
                <td>Select Your Corse</td>
                <td>
                    <select name="course">
                        <option value="">Select Course</option>
                        <option>PHP</option>
                        <option>Java</option>
                        <option>Wordpress</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="2" align="center"><input type="submit" name="register" value="Register Me" /></td>
            </tr>
        </table>
    </form>
</body>
</html>