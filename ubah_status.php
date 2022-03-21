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
        $qry_get_transaksi=mysqli_query($conn,"select id, status, dibayar from transaksi where id='".$_GET['id']."'");
        $dt_transaksi=mysqli_fetch_array($qry_get_transaksi);
        ?>
        <h3>Update Status Transaksi</h3>
        <form action="proses_ubah_status.php" method="post">
        <input type="hidden" name="id" value="<?=$dt_transaksi['id']?>">
            Status :
        <div class="form-check" value="<?=$dt_transaksi['status']?>">
            <input class="form-check-input" name="status" type="radio" value="baru" id="flexCheckDefault" checked>
            <label class="form-check-label" for="flexCheckDefault">
                Baru
            </label>
        </div>
        <div class="form-check" value="<?=$dt_transaksi['status']?>">
            <input class="form-check-input" name="status" type="radio" value="proses" id="flexCheckChecked" >
            <label class="form-check-label" for="flexCheckChecked">
                Proses
            </label>
        </div>
        <div class="form-check" value="<?=$dt_transaksi['status']?>">
            <input class="form-check-input" name="status" type="radio" value="selesai" id="flexCheckChecked" >
            <label class="form-check-label" for="flexCheckChecked">
                Selesai
            </label>
        </div>
        <div class="form-check" value="<?=$dt_transaksi['status']?>">
            <input class="form-check-input" name="status" type="radio" value="diambil" id="flexCheckChecked" >
            <label class="form-check-label" for="flexCheckChecked">
                Diambil
            </label>
        </div>
        Dibayar :
        <div class="form-check" value="<?=$dt_transaksi['dibayar']?>">
            <input class="form-check-input" name="dibayar" type="radio" value="dibayar" id="flexCheckChecked">
            <label class="form-check-label" for="flexCheckChecked">
                Dibayar
            </label>
        </div>
        <div class="form-check" value="<?=$dt_transaksi['dibayar']?>">
            <input class="form-check-input" name="dibayar" type="radio" value="belum_dibayar" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Belum Dibayar
            </label>
        </div>
            <br>
            <input type="submit" name="simpan" value="Ubah Status" class="btn btn-primary">
        </form>
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    </body>
</html>