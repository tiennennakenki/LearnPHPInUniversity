<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show data from ct_hoadon table</title>
</head>
<body>
<table align="center" border="true">
    <tr>
        <th>So_hoa_don</th>
        <th>Ma_sua</th>
        <th>So_luong</th>
        <th>Don_gia</th>
    </tr>
    <?php
//        require ("config.php");
        //1-> mo ket noi
        include ("config.php");
        $conn=new mysqli($hostname,$username,$password,$dbname);
        if ($conn->connect_error){
            echo "loi ket noi db".$conn->connect_error;
        }
        //2-> xay dung cau truy van
        $query='select * from ct_hoadon';// tiep can huong 1
        //3-> thuc thi cau truy van
        $result=$conn->query($query);
        if (!$result) echo "cau truy van bi sai";
        //4->xu ly ket qua tra ve
        if ($result->num_rows != 0){
            while ($row=$result->fetch_array()){//row la 1 mang
                if ($row['Don_gia']>=50000) {//don gia lon hon 50000 va ma_sua bat dau bang VN
                    echo "<tr>";
                    echo "<td>" . $row['So_hoa_don'] . "</td>";
                    echo "<td>" . $row['Ma_sua'] . "</td>";
                    echo "<td>" . $row['So_luong'] . "</td>";
                    echo "<td>" . $row['Don_gia'] . "</td>";
                    echo "</tr>";
                }
            }
        } else echo "bang khong co du lieu";
        //5-> don dep bo nho, dong ket noi
        $conn->free($result);
        $conn->close();

    ?>
</table>

</body>
</html>
