<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        tr:nth-child(even) {
            background-color: #D6EEEE;
        }
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Mã khách hàng</th>
            <th>Tên khách hàng</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>SĐT</th>
            <th>Email</th>
        </tr>
        <?php
        //Ket noi CSDL
        include 'config.php';
        $sql = "SELECT * FROM khachhang";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) != 0) {
            while ($row = mysqli_fetch_row($result)) {
                echo "<tr>";
                foreach ($row as $value) {
                    if ($value === "1") {
                        echo '<td style="text-align: center;">Nam</td>';
                    } elseif ($value === "0") {
                        echo '<td style="text-align: center;">Nữ</td>';
                    } else {
                        echo "<td>" . $value . "</td>";
                    }
                }
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>