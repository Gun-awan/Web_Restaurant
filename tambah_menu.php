<?php

require_once "core/init.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu</title>
</head>
<body>

    <center><p>Data Menu</p></center>
    <center><a href="tambah.php">+ &nbsp; Tambah Produk </a></center>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Menu</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $query= "SELECT * FROM menu ORDER BY id ASC";
                $result= mysqli_query($link,$query);

                if (!$result){
                    die("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
                }
                $no = 1;

                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['nama_menu']; ?></td>
                <td><?php echo substr($row['deskripsi'], 0, 20);?>...</td>
                <td>Rp <?php echo number_format($row['harga'], 0,',','.'); ?></td>
                <td><img src="gambar/<?php echo $row['gambar_menu']; ?>"></td>
            </tr>
            <?php
                $no++;

            }

            ?>
        </tbody>
    </table>
    
</body>
</html>