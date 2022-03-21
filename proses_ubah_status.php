<?php
if($_POST){
$id=$_POST['id'];
$status=$_POST['status'];
$dibayar=$_POST['dibayar'];
} if(empty($status)){
    echo "<script>alert('Status tidak boleh kosong');location.href='tampil_transaksi.php';</script>";
} elseif(empty($dibayar)){
    echo "<script>alert('Status tidak boleh kosong');location.href='tampil_transaksi.php?id=".$id."';</script>";
} else {
include "koneksi.php";
$update=mysqli_query($conn,"update transaksi set status='".$status."',dibayar='".$dibayar."' where id='".$id."'") or die(mysqli_error($conn));
if($update){
    echo "<script>alert('Sukses update transaksi');location.href='tampil_transaksi.php';</script>";
} else {
    echo "<script>alert('Gagal update transaksi');location.href='ubah_status.php'?id=".$id.";</script>";
}
}
?>