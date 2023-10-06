<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rectangle</title>
</head>
<body>
<?php
if (isset($_POST['submit'])){
    $width=$_POST['width'];
    $height=$_POST['height'];
    if ($width<$height || $width<=0 || $height<=0) $area="Nhap lai chieu dai, chieu rong";
    else $area=$width*$height;
}
?>

<form action="" method="post">
    <table bgcolor="#faebd7" align="center">
        <tr>
            <td colspan="2" bgcolor="orange" align="center">
                <h2> Tinh toan tren HCN </h2>
            </td>
        </tr>
        <tr>
            <td>
                Width
            </td>
            <td>
                <input type="text" name="width" placeholder="Nhap chieu dai" size="30"
                value="<?php if(isset($_POST['width'])) echo $_POST['width']; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Height
            </td>
            <td>
                <input type="text" name="height" placeholder="Nhap chieu rong" size="30"
                       value="<?php if(isset($_POST['height'])) echo $_POST['height']; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Area
            </td>
            <td>
                <input type="text" name="area" size="30" readonly value="<?php echo $area; ?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Tinh">
            </td>
        </tr>
    </table>
</form>
</body>
</html>