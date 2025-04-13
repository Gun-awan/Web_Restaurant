<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu</title>
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
    <center><h1>Tambah Menu</h1></center>
    <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
    <section class="base">
        <div>
            <label>Nama Menu</label>
            <input type="text" name="nama_menu" autofocus required />
        </div>
        <div>
            <label>Deskripsi Menu</label>
            <input type="text" name="deskripsi"/>
        </div>
        <div>
            <label>Harga</label>
            <input type="text" name="harga" required />
        </div>
        <div>
            <label>Gambar</label>
            <input type="file" name="gambar_menu" required />
        </div>
        <div>
            <button type="submit">Tambahkan</button>
        </div>
    </section>
    </form>
    
</body>
</html>