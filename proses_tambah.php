<?php

require_once "core/init.php";

$nama_menu = $_POST['nama_menu'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$gambar_menu = $_FILES['gambar_menu']['name'];

if ($gambar_menu !=""){
    $ekstensi_diperbolehkan = array('png','jpg');
    $x = explode('.', $gambar_menu);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar_menu']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_menu;

    if(in_array($ekstensi, $ekstensi_diperbolehkan)=== true ){
        move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);

        $query = "INSERT INTO menu (nama_menu, deskripsi, harga, gambar_menu) VALUES ('$nama_menu', '$deskripsi', '$harga', '$nama_gambar_baru')";
        $result = mysqli_query($link, $query);

        if (!$result){
            die("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
        }else{
            echo "<script>alert('Data berhasil ditambahkan!');window.location='crud_menu.php';</script>";
        }

    }else{
        echo "<script>alert('Format hanya bisa png atau jpg!');window.location='tambah_menu.php';</script>";
    }

}else{
    $query = "INSERT INTO menu (nama_menu, deskripsi, harga, gambar_menu) VALUES ('$nama_menu', '$deskripsi', '$harga')";
        $result = mysqli_query($link, $query);

        if (!$result){
            die("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
        }else{
            echo "<script>alert('Data berhasil ditambahkan!');window.location='crud_menu.php';</script>";
        }

}

?>

