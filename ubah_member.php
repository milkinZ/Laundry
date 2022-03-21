<!DOCTYPE html>
<html>
    <head>
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
        crossorigin="anonymous">
        <title></title>
    </head>
    <body>
    <?php
    include ("nav.php");
    navbar();
?>
        <?php
        include "koneksi.php";
        $qry_get_member=mysqli_query($conn,"select * from member where id='".$_GET['id']."'");
        $dt_member=mysqli_fetch_array($qry_get_member);
        ?>
        <h3>Update Member</h3>
        <form action="proses_ubah_member.php" method="post">
            <input type="hidden" name="id" value="<?=$dt_member['id']?>">
            Nama :
            <input type="text" name="nama" value="<?=$dt_member['nama']?>" class="form-control">
            Alamat :
            <input type="text" name="alamat" value="<?=$dt_member['alamat']?>" class="form-control">
            Jenis Kelamin :
            <select class="form-select" name="jenis_kelamin" value="<?=$dt_member['jenis_kelamin']?>" aria-label="Default select example">
                <option selected value="<?=$dt_member['jenis_kelamin']?>">Pilih Jenis Kelamin</option>
                <option value="laki-laki">Laki - Laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
            Telepon :
            <input type="text" name="tlp" value="<?=$dt_member['tlp']?>" class="form-control">
            <br>
            <input type="submit" name="simpan" value="Ubah Member" class="btn btn-primary">
        </form>
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    </body>
</html>