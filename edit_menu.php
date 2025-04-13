<?php

require_once "core/init.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM menu where id = '$id'";
        $result = mysqli_query($link, $query);
        if(!$result){
            die("Query Error :".mysqli_errno($link)." - ".mysqli_error($link));
        }
        $data = mysqli_fetch_assoc($result);

        if(!count($data)){
            echo "<script>alert('Data tidak ditemukan.');window.location='index.php';</script>";
        }

    }else{
        echo "<script>alert('Masukan ID yang ingin diedit');window.location='index.php';</script>";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <style type="text/css">
        *{
            font-family: 'Trebuchet MS';
        }
        h1 {
            text-transform: uppercase;
            color: salmom;
        }
        .base {
            width: 400px;
            border-radius: 3px;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            background-color: #ededed;
        }
        label {
            margin-top: 10px;
            float: left;
            text-align: left;
            width: 100%;
        }
        input {
            padding: 6px;
            width: 100%;
            box-sizing: border-box;
            background-color: #f8f8f8;
            border: 2px solid #ccc;
            outline-color: salmon;
        }
        button {
            background-color: salmon;
            color: #fff;
            padding: 10px;
            font-size: 12px;
            border: 0;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <center><h1>Edit Menu " <?php echo  $data['nama_menu']; ?> "</h1></center>
    <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
    <section class="base">
        <div>
            <label>Nama Menu</label>
            <input type="text" name="nama_menu" autofocus required value="<?php echo $data['nama_menu']; ?>"/>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
        </div>
        <div>
            <label>Deskripsi Menu</label>
            <input type="text" name="deskripsi" value="<?php echo $data['deskripsi']; ?>"/>
        </div>
        <div>
            <label>Harga</label>
            <input type="text" name="harga" required value="<?php echo $data['harga']; ?>"/>
        </div>
        <div>
            <label>Gambar</label>
            <img src="img/<?php echo $data['gambar_menu']; ?>" style="width: 120px;float: left; margin-bottom: 5px;">
            <input type="file" name="gambar_menu"/>
            <i style="float : left; font-size: 11px; color: red;">Abaikan jika tidak merubah gambar</i>
        </div>
        <div>
            <br>
            <button type="submit">Simpan Perubahan</button>
        </div>
    </section>
    </form>
    
</body>
</html>