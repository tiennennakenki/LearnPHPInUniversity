<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .submit-button {
            width: 100%;
        }
        form{
            background-color: beige;
            width: 355px;
            padding: 10px;
            margin: auto;
        }
        input{
            border-radius: 4px;
            height: 20px;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_GET['submit'])){
            $email = $_GET['email'];
            $name = $_GET['username'];
            $password=$_GET['password']; $confirmPassword=$_GET['confirmPassword'];
            if(preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)){
                if(preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W]).{8,}$/", $password)){
                    if($password === $confirmPassword){
                        $msg= "Full name: ". $name . "<br>Password" . $password;
                    }
                    else $msg = "(*)Xác nhận mật khẩu không khớp";
                }
                else $errorPassword = "(*)Mật khẩu phải chứa ít nhất 8 ký tự <br> bao gồm chữ hoa, chữ thường, chữ số và ký tự đặc biệt";
            }
            else 
            {
                $errorEmail = "(*)Email không hợp lệ";
                if(preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W]).{8,}$/", $password)){
                    if($password !== $confirmPassword){
                        $msg = "(*)Xác nhận mật khẩu không khớp";
                    }
                }
                else $errorPassword = "(*)Mật khẩu phải chứa ít nhất 8 ký tự <br> bao gồm chữ hoa, chữ thường, chữ số và ký tự đặc biệt";
            }
        }
    ?>
    <form method="get" name="registration">
        <table align="center">
        <h3 style="text-align: center; color: red">Registration</h3>
        <tr>
            <td>Full Name<br>
            <input type="text" name="fullname" value="<?php 
                if(isset($_GET['submit']))
                    if(!empty($_GET['fullname'])) echo $_GET['fullname'];
        ?>">
            </td>
            <td>
                Username<br>
                <input type="text" name="username" value="<?php 
                if(isset($_GET['submit']))
                    if(!empty($_GET['username'])) echo $_GET['username'];
        ?>">
            </td>
        </tr>
        <tr>
            <td>Email<br>
            <input type="text" name="email" value="<?php 
                if(isset($_GET['submit']))
                    if(!empty($_GET['email'])) echo $_GET['email'];
        ?>">
            </td>
            <td>
                Phone Number<br>
                <input type="text" name="phone" value="<?php 
                if(isset($_GET['submit']))
                    if(!empty($_GET['phone'])) echo $_GET['phone'];
        ?>">
            </td>
        </tr>
        <tr>
            <td>Password<br>
            <input type="password" name="password" value="<?php 
                if(isset($_GET['submit']))
                    if(!empty($_GET['password'])) echo $_GET['password'];
        ?>" required>
        </td>
        <td>Confirm Password<br>
            <input type="password" name="confirmPassword" value="<?php 
                if(isset($_GET['submit']))
                    if(!empty($_GET['confirmPassword'])) echo $_GET['confirmPassword'];
        ?>">
        </td>
        <tr>
            <td colspan="3">
                Gender<br>
                <input type="radio" name="gender" value="male" <?php 
                    if(isset($_GET['submit']) and $_GET['gender'] === "male") {
                        echo "checked";
                    }
                ?>> Male
                <input type="radio" name="gender" value="female" <?php 
                    if(isset($_GET['submit']) and $_GET['gender'] === "female") {
                        echo "checked";
                    }
                ?>> Female
                <input type="radio" name="gender" value="not" <?php 
                    if(isset($_GET['submit']) and $_GET['gender'] === "not") {
                        echo "checked";
                    }
                ?>> Prefer not to say
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input style="background: blue;" type="submit" name="submit" value="Register" class="submit-button">
            </td>
        </tr>
        <tr>
            <td style="text-align: center; color: red" colspan="2">
                <?php
                    if(isset($msg)) echo $msg . "<br>";
                    if(isset($errorEmail)) echo $errorEmail . "<br>";
                    if(isset($errorPassword)) echo $errorPassword . "<br>";
                ?>
            </td>
        </tr>
    </table>
    </form>
</body>
</html>