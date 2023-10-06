<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include 'config.php';
    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $firstName = $_POST['firstName'];
        $address = $_POST['address'];
        $idClass = $_POST['idClass'];
        $sql = " INSERT INTO lop (tenSV, hoSV, diaChi, idLop)
        VALUES ( '$name' , '$firstName' , '$address' , '$idClass')";
        $result = mysqli_query ($conn , $sql );
        if (! $result ) die (
            $msg = 'Faild'
        );
    }
    if (isset($_POST['result'])) {
        // Chuyển hướng đến trang khác
        header("Location: result1.php");
        exit(); // Kết thúc kịch bản PHP để đảm bảo chuyển hướng hoạt động đúng cách
    }
    ?>

    <form action="" method="post">
        <table style="background: AntiqueWhite;" align="center">
            <tr>
                <th colspan="2" style="background: 	#ff1493; color: white">Nhập thông tin SV</th>
            </tr>
            <tr>
                <td>Tên:</td>
                <td>
                    <input type="text" name="name" value="<?php 
                        if(isset($name)) echo $name;
                    ?>" >
                </td>
            </tr>
            <tr>
                <td>Họ:</td>
                <td>
                    <input type="text" name="firstName" value="<?php 
                        if(isset($firstName)) echo $firstName;
                    ?>" >
                </td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td>
                    <input type="text" name="address" value="<?php 
                        if(isset($address)) echo $address;
                    ?>" >
                </td>
            </tr>
            <tr>
                <td>ID của lớp:</td>
                <td>
                    <input type="text" name="idClass" value="<?php 
                        if(isset($idClass)) echo $idClass;
                    ?>" >
                </td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="2"> <!-- Sử dụng colspan để căn giữa hàng và có 3 ô -->
                    <input type="submit" name="send" value="Gửi">
                    <input type="submit" name="delete" value="Xóa">
                    <input type="submit" name="result" value="Xem kết quả">
                </td>
            </tr>

        </table>
    </form>
</body>
</html>