<?php

require_once "core/init.php";
$id = $_GET['id'];

$query = "DELETE FROM menu WHERE id = '$id'";
$result = mysqli_query($link,$query);

if (!$result){
    die("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
}else{
    echo "<script>alert('Data berhasil dihapus!');window.location='crud_menu.php';</script>";
}