<?php
include "nav.php";
navbar();
include "koneksi.php";
$qry_member = mysqli_query($conn,"select * from member");
echo mysqli_error($conn);
?>
<link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
    crossorigin="anonymous">
<h3 style="justify-content: center;text-align: center;padding-top: 1rem;font-size: 40px;">TRANSAKSI</h3>
<div class="form-control" style="justify-content: center;align-items: center;padding-top: 1rem;padding-right: 3rem;padding-left: 4rem;">
    <form action="transaksi.php" method="GET">
        <div class="row mb-2">
            <label for="paket-count-input" class="col-form-label col-sm-2">Jumlah Pesanan</label>
            <div class="col-sm-1">
                <input type="number" class="form-control" id="paket-count-input" name="paket_count" value="<?= isset($_GET['paket_count']) ? $_GET['paket_count'] : 1 ?>">
            </div>
            <button type="submit" class="btn btn-primary col-sm-1" style="background-color: rgb(0, 170, 255); border: rgb(0, 170, 255);">&#x21bb;</button>
        </div>
    </form>
    <form action="proses_transaksi.php" method="POST">
        Nama Member :
        <select name="id_member" class="form-select" aria-label="Default select example">
            <?php
            while ($dt_member = mysqli_fetch_array($qry_member)) {
            ?><option value="<?= $dt_member['id'] ?>"><?= $dt_member['nama'] ?></option>
    <?php
        }
    ?>
        </select>
        Tanggal :
        <input type="date" name="tgl" value="" class="form-control">
        Batas Waktu :
        <input type="date" name="batas_waktu" value="" class="form-control">
        Tanggah Bayar :
        <input type="date" name="tgl_bayar" value="" class="form-control">
        Status :
        <div class="form-check">
            <input class="form-check-input" name="status" type="radio" value="baru" id="flexCheckDefault" checked>
            <label class="form-check-label" for="flexCheckDefault">
                Baru
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="status" type="radio" value="proses" id="flexCheckChecked" >
            <label class="form-check-label" for="flexCheckChecked">
                Proses
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="status" type="radio" value="selesai" id="flexCheckChecked" >
            <label class="form-check-label" for="flexCheckChecked">
                Selesai
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="status" type="radio" value="diambil" id="flexCheckChecked" >
            <label class="form-check-label" for="flexCheckChecked">
                Diambil
            </label>
        </div>
        Dibayar :
        <div class="form-check">
            <input class="form-check-input" name="dibayar" type="radio" value="dibayar" id="flexCheckChecked">
            <label class="form-check-label" for="flexCheckChecked">
                Dibayar
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="dibayar" type="radio" value="belum_dibayar" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Belum Dibayar
            </label>
        </div>
        <?php for ($i = 0; $i < (isset($_GET['paket_count']) ? $_GET['paket_count'] : 1); $i++) : ?>
            Paket :
            <select name="id_paket[]" class="form-select" aria-label="Default select example" name="jenis" style="margin-top: 1rem;">
                <?php
                $qry_paket = mysqli_query($conn, "select * from paket");
                while ($dt_paket = mysqli_fetch_array($qry_paket)) {
                ?><option value="<?= $dt_paket['id'] ?>"><?= $dt_paket['jenis'] ?> Rp. <?= $dt_paket['harga'] ?></option><?php
                }
                ?>
            </select>
            QTY :
            <input type="number" name="qty[]" value="1" class="form-control">
        <?php endfor ?>
        <div class="button mb-4" style="padding-top: 2rem;">
            <div class="d-grid gap-2">
                <button class="btn btn-success" type="submit" name="simpan" value="tambah paket" style="">TAMBAH TRANSAKSI </button>
            </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php
?>