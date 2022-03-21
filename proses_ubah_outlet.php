<?php
if($_POST){
$id=$_POST['id'];
$alamat=$_POST['alamat'];
$telepon=$_POST['telepon'];
$cabang=$_POST['cabang'];
} if(empty($alamat)){
    echo "<script>alert('Alamat tidak boleh kosong');location.href='tampil_outlet.php';</script>";
} elseif(empty($telepon)){
    echo "<script>alert('Telepon tidak boleh kosong');location.href='tampil_outlet.php';</script>";
} elseif(empty($cabang)){
    echo "<script>alert('Cabang tidak boleh kosong');location.href='tampil_outlet.php?id=".$id."';</script>";
} else {
include "koneksi.php";
$update=mysqli_query($conn,"update outlet set alamat='".$alamat."',telepon='".$telepon."',cabang='".$cabang."' where id='".$id."'") or die(mysqli_error($conn));
if($update){
    echo "<script>alert('Sukses update outlet');location.href='tampil_outlet.php';</script>";
} else {
    echo "<script>alert('Gagal update outlet');location.href='ubah_outlet.php?id=".$id."';</script>";
}
}
?>