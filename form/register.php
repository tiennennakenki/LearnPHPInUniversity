<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET['submit'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "form-login";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            //echo "Success";
        }

        $fullname = $_GET['fullname'];
        $username = $_GET['username'];
        $email = $_GET['email'];
        $phone = $_GET['phone'];
        $password = $_GET['password'];
        $confirmPassword = $_GET['confirmPassword'];
        $gender = $_GET['gender'];
        $options = [
            'cost' => 12,
        ];

        if (preg_match("/^[a-zA-Z0-9.-_]+@[a-zA-Z]+\.[a-zA-Z]{2,}$/", $email)) {
            if (preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W]).{8,}$/", $password)) {
                if ($password == $confirmPassword) {
                    $emailAlready = "SELECT * FROM `information` WHERE email = '$email'";
                    $result = mysqli_query($conn, $emailAlready);

                    if (mysqli_num_rows($result) > 0) {
                        $msg = "Email đã tồn tại";
                    } else {
                        $hashedPassword = password_hash($password,PASSWORD_DEFAULT,$options);
                        $sql = "INSERT INTO `information`(`fullname`, `username`, `email`, `phone`, `password`, `gender`) 
                        VALUES ('$fullname','$username','$email','$phone','$hashedPassword','$gender')";
                        if (mysqli_query($conn, $sql)) {
                            header("Location: form-login.php");
                        } else {
                            $msg = "Lỗi" . mysqli_error($conn);
                        }
                    }
                } else {
                    $msg = "Mật khẩu không khớp";
                }
            } else {
                $msg = "Mật khẩu không hợp lệ";
            }
        } else {
            $msg = "Email không hợp lệ";
        }
    }
    ?>
    <form action="" method="get">
        <table align="center" style="background-color: antiquewhite;">
            <tr>
                <th colspan="2">Registration</th>
            </tr>
            <tr>
                <td>Full name <br>
                    <input type="text" name="fullname" value="<?php
                    if (isset($fullname))
                        echo $fullname;
                    ?>" required>
                </td>
                <td>User name <br>
                    <input type="text" name="username" value="<?php
                    if (isset($username))
                        echo $username;
                    ?>" required>
                </td>
            </tr>
            <tr>
                <td>Email <br>
                    <input type="text" name="email" value="<?php
                    if (isset($email))
                        echo $email;
                    ?>" required>
                </td>
                <td>Phone number <br>
                    <input type="text" name="phone" value="<?php
                    if (isset($phone))
                        echo $phone;
                    ?>" required>
                </td>
            </tr>
            <tr>
                <td>Password <br>
                    <input type="text" name="password" value="<?php
                    if (isset($password))
                        echo $password;
                    ?>" required>
                </td>
                <td>Confirm Password <br>
                    <input type="text" name="confirmPassword" value="<?php
                    if (isset($confirmPassword))
                        echo $confirmPassword;
                    ?>" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">Gender <br>
                    <input type="radio" name="gender" value="male" <?php
                    if (isset($_GET['submit']) and $_GET['gender'] === "male")
                        echo "checked";
                    ?> required> Male
                    <input type="radio" name="gender" value="female" <?php
                    if (isset($_GET['submit']) and $_GET['gender'] === "female")
                        echo "checked";
                    ?>> Female
                    <input type="radio" name="gender" value="not" <?php
                    if (isset($_GET['submit']) and $_GET['gender'] === "not")
                        echo "checked";
                    ?>> Not
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input style="width: 100%; background-color: blue" type="submit" name="submit" value="Register">
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    if (isset($msg))
                        echo $msg;
                    ?>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>