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
            <th>id sinh viên</th>
            <th>Tên sinh viên</th>
            <th>họ sinh viên</th>
            <th>Địa chỉ</th>
            <th>id lớp</th>
        </tr>
        <?php
        include 'config.php';
        $sql = "SELECT * FROM lop";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) != 0) {
            while ($row = mysqli_fetch_row($result)) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . $value . "</td>";
                }
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>