<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tổng dãy số</title>
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            $array = $_POST['string'];
            $sumOfArray = array_sum(explode(",", $array));
        }
    ?>
    <form method="post" name="sum" action="">
        <table style="background: greenyellow;">
            <tr style="background: green">
                <th style="color: white;" colspan="2">NHẬP VÀ TÍNH TRÊN DÃY SỐ</th>
            </tr>
            <tr>
                <td>Nhập dãy số:</td>
                <td>
                    <input type="text" name="string" size="20" value="<?php 
                        if(isset($array)) echo $array;
                    ?>">
                    <span style="color: red;">(*)</span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input style="background: yellow;" type="submit" name="submit" value="Tổng dãy số">
                </td>
            </tr>
            <tr>
                <td>Tổng dãy số:</td>
                <td>
                    <input type="text" name="sumOfString" size="10" readonly value="<?php 
                        if(isset($sumOfArray)) echo $sumOfArray;
                    ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span style="color: red;">(*)</span>
                    Các số được nhập cách nhau bằng dấu "," 
                </td>
            </tr>
        </table>
    </form>
</body>
</html>