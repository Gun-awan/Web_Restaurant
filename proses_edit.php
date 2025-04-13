<?php

require_once "core/init.php";

$id = $_POST['id'];
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

    $query = "UPDATE menu SET nama_menu = '$nama_menu', deskripsi = '$deskripsi', harga = '$harga', gambar_menu = '$nama_gambar_baru' ";
    $query .= "WHERE id = '$id'";
    $result = mysqli_query($link, $query);

    if (!$result){
        die("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
    }else{
        echo "<script>alert('Data berhasil diubah!');window.location='crud_menu.php';</script>";
    }

    }else{
        echo "<script>alert('Format hanya bisa png atau jpg!');window.location='edit_menu.php';</script>";
    }

    }else{
        $query = "UPDATE menu SET nama_menu = '$nama_menu', deskripsi = '$deskripsi', harga = '$harga'";
            $query = " WHERE id = '$id'";
            $result = mysqli_query($link, $query);

            if (!$result){
                die("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
            }else{
                echo "<script>alert('Data berhasil ubah!');window.location='crud_menu.php';</script>";
            }

}

?>

