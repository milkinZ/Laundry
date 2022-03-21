<?php
if($_POST){
    $alamat=$_POST['alamat'];
    $telepon=$_POST['telepon'];
    $cabang=$_POST['cabang'];
if(empty($alamat)){
    echo "<script>alert('Alamat tidak boleh kosong');location.href='tambah_outlet.php';</script>";
    }elseif(empty($telepon)){
        echo "<script>alert('Telepon tidak boleh kosong');location.href='tambah_outlet.php';</script>";
        }elseif(empty($cabang)){
            echo "<script>alert('Cabang tidak boleh kosong');location.href='tambah_outlet.php';</script>";
}else {
    include "koneksi.php";
    $insert=mysqli_query($conn,"insert into outlet (alamat,telepon,cabang) value ('".$alamat."','".$telepon."','".$cabang."')");
if($insert){
    echo "<script>alert('Sukses menambahkan outlet');location.href='tambah_outlet.php';</script>";
} else {
    echo "<script>alert('Gagal menambahkan outlet');location.href='tambah_outlet.php';</script>";
        }
    }
}
?>