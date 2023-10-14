<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        $phantu = $_POST['phantu'];

        function taomang($phantu)
        { 
            $mang = array();
            for ($i = 0; $i < $phantu; $i++) {
                $mang[] = rand(0, 20);
            }
            return $mang;
        }

        function timmax($mang)
        {
            $max = $mang[0];
            foreach ($mang as $value) {
                if ($value > $max) {
                    $max = $value;
                }
            }
            return $max;
        }

        function timmin($mang)
        {
            $min = $mang[0];
            foreach ($mang as $value) {
                if ($value < $min) {
                    $min = $value;
                }
            }
            return $min;
        }

        function Sum($mang)
        {
            $sum = 0;
            foreach ($mang as $value) {
                $sum += $value;
            }
            return $sum;
        }

        if ($phantu > 0) {
            $taomang = taomang($phantu);
            $mang = implode(" ", $taomang);
            $max = timmax($taomang);
            $min = timmin($taomang);
            $tongmang = Sum($taomang);
        } else {
            $msg = "(*)Số phần tử phải lớn hơn 0";
        }
    }
    ?>

    <form action="" method="post" >
        <table align="center" style="border: 1px solid;">
            <tr>
                <th colspan="2" style="background-color: #cd1076; color: white; text-align: center">
                    PHÁT SINH MẢNG VÀ TÍNH TOÁN
                </th>
            </tr>
            <tr style="background-color: #ffb6c1;">
                <td>Nhập số phần tử:</td>
                <td>
                    <input type="number" name="phantu" size="20" value="<?php
                    if (isset($phantu))
                        echo $phantu;
                    ?>">
                </td>
            </tr>
            <tr style="background-color: #ffb6c1;">
                <td></td>
                <td>
                    <input size="16" style="background-color: yellow;" type="submit" name="submit"
                        value="Phát sinh và tính toán">
                </td>
            </tr>
            <tr>
                <td>Mảng:</td>
                <td>
                    <input size="30" style="background-color: #ee9572;" type="text" name="mang" value="<?php
                    if (isset($mang))
                        echo $mang;
                    ?>">
                </td>
            </tr>
            <tr>
                <td>GTLN (MAX) trong mảng:</td>
                <td>
                    <input readonly size="12" style="background-color: #ee9572;" type="text" name="max" value="<?php
                    if (isset($max))
                        echo $max;
                    ?>">
                </td>
            </tr>
            <tr>
                <td>TTNN (MIN) trong mảng:</td>
                <td>
                    <input readonly size="12" style="background-color: #ee9572;" type="text" name="min" value="<?php
                    if (isset($min))
                        echo $min;
                    ?>">
                </td>
            </tr>
            <tr>
                <td>Tổng mảng:</td>
                <td>
                    <input readonly size="12" style="background-color: #ee9572;" type="text" name="tongmang" value="<?php
                    if (isset($tongmang))
                        echo $tongmang;
                    ?>">
                </td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="2">(<strong style="color: red;">Ghi chú:</strong> Các phần tử
                    trong mảng sẽ có giá trị từ 0 đến 20)</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; color:red">
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