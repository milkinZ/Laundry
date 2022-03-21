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
    <span class="border border-3">
        <h3>Tambah User</h3>
        <form action="proses_tambah_user.php" method="post">
            Nama :
            <input type="text" name="nama" value="" class="form-control">
            Username :
            <input type="text" name="username" value="" class="form-control">
            Password :
            <input type="password" name="password" value="" class="form-control">
            Role :
            <select class="form-select" name="role" aria-label="Default select example">
                <option selected>Buka menu pilihan</option>
                <option value="admin">Admin</option>
                <option value="kasir">Kasir</option>
                <option value="owner">Owner</option>
            </select>
            <br>
            <input type="submit" name="simpan" value="Tambah User" class="btn btn-primary">
        </form>
    </span>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    </body>
</html>