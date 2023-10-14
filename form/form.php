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
    </style>
</head>

<body>
    <?php
    include 'config.php';
    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $gender = $_POST['gender'];
        $sql = " INSERT INTO information (fullname, username, email, phone, password, confirmPassword, gender)
        VALUES ( '$fullname' , '$username' , '$email' , '$phone', '$password', '$confirmPassword', '$gender')";
        $result = mysqli_query($conn, $sql);
        if (!$result)
            die(
                $msg = 'Faild'
            );
    }
    if (isset($_POST['result'])) {
        // Chuyển hướng đến trang khác
        header("Location: result1.php");
        exit(); // Kết thúc kịch bản PHP để đảm bảo chuyển hướng hoạt động đúng cách
    }
    ?>
    <form method="get" name="registration">
        <h3>Registration</h3>
        <table>
            <tr>
                <td>Full Name<br>
                    <input type="text" name="fullname" value="<?php
                    if (isset($_GET['submit']))
                        if (!empty($_GET['fullname']))
                            echo $_GET['fullname'];
                    ?>">
                </td>
                <td>
                    Username<br>
                    <input type="text" name="username" value="<?php
                    if (isset($_GET['submit']))
                        if (!empty($_GET['username']))
                            echo $_GET['username'];
                    ?>">
                </td>
            </tr>
            <tr>
                <td>Email<br>
                    <input type="text" name="email" value="<?php
                    if (isset($_GET['submit']))
                        if (!empty($_GET['email']))
                            echo $_GET['email'];
                    ?>">
                </td>
                <td>
                    Phone Number<br>
                    <input type="text" name="phone" value="<?php
                    if (isset($_GET['submit']))
                        if (!empty($_GET['phone']))
                            echo $_GET['phone'];
                    ?>">
                </td>
            </tr>
            <tr>
                <td>Password<br>
                    <input type="password" name="password" value="<?php
                    if (isset($_GET['submit']))
                        if (!empty($_GET['password']))
                            echo $_GET['password'];
                    ?>" required>
                </td>
                <td>Confirm Password<br>
                    <input type="password" name="confirmPassword" value="<?php
                    if (isset($_GET['submit']))
                        if (!empty($_GET['confirmPassword']))
                            echo $_GET['confirmPassword'];
                    ?>">
                </td>
            <tr>
                <td>
                    Gender<br>
                    <input type="radio" name="gender" value="male" <?php
                    if (isset($_GET['submit']) and $_GET['gender'] === "male") {
                        echo "checked";
                    }
                    ?>> Male
                    <input type="radio" name="gender" value="female" <?php
                    if (isset($_GET['submit']) and $_GET['gender'] === "female") {
                        echo "checked";
                    }
                    ?>> Female
                    <input type="radio" name="gender" value="not" <?php
                    if (isset($_GET['submit']) and $_GET['gender'] === "not") {
                        echo "checked";
                    }
                    ?>> Prefer not to say
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Register" class="submit-button">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>