<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "form-login";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    } else {

    }

    if (isset($_GET['login'])) {
        $username = $_GET['username'];
        $password = $_GET['password'];

        $check_username = "SELECT * FROM `information` WHERE username = '$username'";
        $result = mysqli_query($conn, $check_username);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $hashedPassword = $row['password'];

                if (password_verify($password, $hashedPassword)) {
                    //header("Location: form.php");
    
                } else {
                    $msg = "Mật khẩu không đúng";
                }
            } else {
                $msg = "Tài khoản không tồn tại";
            }
        } else {
            echo "Lỗi truy vấn: " . mysqli_error($conn);
        }


    }

    ?>
    <form method="get" action="">
        <table align="center">
            <tr>
                <th colspan="2">Đăng nhập</th>
            </tr>
            <tr>
                <td>username</td>
                <td>
                    <input type="text" name="username">
                </td>
            </tr>
            <tr>
                <td>password</td>
                <td>
                    <input type="text" name="password">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input style="width: 100%;" type="submit" name="login" value="Đăng nhập">
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

    <?php
        $list = "SELECT * FROM `information`";
        $result_list = mysqli_query($conn, $list);

        echo "
            <p align = 'center'><b 'color = green'>DANH SÁCH</b></p>
            <table align = 'center' border='1'>
            <tr>
                <th>Fullname</th>
                <th>username</th>
                <th>email</th>
                <th>phone</th>
                <th>password</th>
            </tr>";
        if (mysqli_num_rows($result_list) <> 0) {
            while ($rows = mysqli_fetch_row($result_list)) {
                echo "<tr>
                <td>$rows[0]</td>
                <td>$rows[1]</td>
                <td>$rows[2]</td>
                <td>$rows[3]</td>
                <td>$rows[4]</td>
                </tr>";
            }
        }

        echo "</table>";
        ?>
</body>

</html>