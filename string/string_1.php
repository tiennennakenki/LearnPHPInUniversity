<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HCN</title>
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            $chieudai = $_POST['dai'];
            $chieurong = $_POST['rong'];
            if(is_numeric($chieudai) and is_numeric($chieurong)){
                if($chieudai > 0 and $chieurong > 0)
                    if($chieudai>=$chieurong)
                        $dientich = $chieudai*$chieurong;
                    else $msg="Chiều dài không được < hơn chiều rộng";
                else 
                    $msg="Chiều dài hoặc chiều rộng phải lớn hơn 0";
            }
            else {
                $msg="chiều dài hoặc chiều rộng không phải số";
            }
        }
    ?>
    <form action="" method="post">
        <table style="background: beige">
            <tr style="background: pink">
                <th colspan="2">
                    DIỆN TÍCH HÌNH CHỮ NHẬT
                </th>
            </tr>
            <tr>
                <td>Chiều dài:</td>
                <td>
                    <input type="number" name="dai" size="20" value="<?php 
                        if(isset($chieudai)) echo $chieudai;
                    ?>" step="any">
                </td>
            </tr>
            <tr>
                <td>Chiều rộng:</td>
                <td>
                    <input type="number" name="rong" size="20" value="<?php 
                        if(isset($chieurong)) echo $chieurong;
                    ?>" step="any">
                </td>
            </tr>
            <tr>
                <td>Diện tích:</td>
                <td>
                    <input type="text" name="dientich" size="20" readonly style="background: pink"
                    value="<?php 
                        if(isset($dientich)) echo $dientich;
                    ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <input type="submit" name="submit" value="Tính">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="color: red">
                    <?php 
                        if(isset($msg)) echo $msg;
                    ?>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>