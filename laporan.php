<?php include("nav.php");
navbar();
?>
<!DOCTYPE html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">
        <title></title>
    </head>
    <body>
    <style>   
        @media print
        {
        .noprint {display:none;}
        }
    </style>
    <div style="float:right; padding-right:10px" class="noprint">
            <button class="btn btn-primary" onClick="window.print();">Print</button>
    </div>
    <h3>List Member</h3>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA</th>
                <th>ALAMAT</th>
                <th>JENIS KELAMIN</th>
                <th>TELEPON</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $qry_member = mysqli_query($conn, "select * from member");
            $no = 0;
            while ($data_member = mysqli_fetch_array($qry_member)) {
                $no++; ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $data_member['nama'] ?></td>
                    <td><?= $data_member['alamat'] ?></td>
                    <td><?= $data_member['jenis_kelamin'] ?></td>
                    <td><?= $data_member['tlp'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <h3>TAMPIL TRANSAKSI</h3>
            <table class="table table-hover table-striped">
                <thead>
                    <tr class="table-primary">
                        <th>NO</th>
                        <th>NAMA PELANGGAN</th>
                        <th>TGL</th>
                        <th>BATAS WAKTU</th>
                        <th>TGL BAYAR</th>
                        <th>STATUS</th>
                        <th>DIBAYAR</th>
                        <th>JENIS</th>
                        <th>QTY</th>
                        <th>JUMLAH</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "koneksi.php";
                    $qry_transaksi = mysqli_query($conn, "select t.id as id, m.nama as nama, t.tgl as tgl, batas_waktu, tgl_bayar, status, dibayar from transaksi t, member m where t.id_member = m.id");
                    echo mysqli_error($conn);
                    $no = 0;
                    while ($data_transaksi = mysqli_fetch_array($qry_transaksi)) {
                        $qry_detil_transaksi = mysqli_query($conn, "SELECT *, detil_transaksi.qty * paket.harga as total FROM detil_transaksi, paket WHERE detil_transaksi.id_transaksi = ".$data_transaksi['id']." AND paket.id = detil_transaksi.id_paket");
                        echo mysqli_error($conn);
                        $jumlah_pesanan = mysqli_num_rows($qry_detil_transaksi);
                        $no++;
                        $i = 0;
                        while ($data_dtl_transaksi = mysqli_fetch_array($qry_detil_transaksi)) {
                            $i++;
                            if ($i == 1) {
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data_transaksi['nama'] ?></td>
                        <td><?= $data_transaksi['tgl'] ?></td>
                        <td><?= $data_transaksi['batas_waktu'] ?></td>
                        <td><?= $data_transaksi['tgl_bayar'] ?></td>
                        <td><?= $data_transaksi['status'] ?></td>
                        <td><?= $data_transaksi['dibayar'] ?></td>
                        <td><?= $data_dtl_transaksi['jenis'] ?></td>
                        <td><?= $data_dtl_transaksi['qty'] ?></td>
                        <td><?= $data_dtl_transaksi['total'] ?></td>
                    </tr>
                    <?php
                    } else {
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?= $data_dtl_transaksi['jenis'] ?></td>
                        <td><?= $data_dtl_transaksi['qty'] ?></td>
                        <td><?= $data_dtl_transaksi['total'] ?></td>
                        <td>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>   
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>