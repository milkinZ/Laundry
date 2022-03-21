<?php
if($_POST){
$id=$_POST['id'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$tlp=$_POST['tlp'];
} if(empty($nama)){
    echo "<script>alert('Nama tidak boleh kosong');location.href='tampil_member.php';</script>";
} elseif(empty($alamat)){
    echo "<script>alert('Alamat tidak boleh kosong');location.href='tampil_member.php?id=".$id."';</script>";
} else {
include "koneksi.php";
$update=mysqli_query($conn,"update member set nama='".$nama."',alamat='".$alamat."',jenis_kelamin='".$jenis_kelamin."',tlp='".$tlp."' where id='".$id."'") or die(mysqli_error($conn));
if($update){
    echo "<script>alert('Sukses update member');location.href='tampil_member.php';</script>";
} else {
    echo "<script>alert('Gagal update member');location.href='ubah_member.php?id=".$id."';</script>";
}
}
?>