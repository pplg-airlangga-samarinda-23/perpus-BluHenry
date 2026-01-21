<?php 
    include dirname(__DIR__) . '/database/koneksi.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $stok = $_POST['stok'];

        $sql = "INSERT INTO buku (judul, pengarang, stok) VALUES (?,?,?)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("ssi", $judul, $pengarang, $stok);
        $result = $stmt->execute();

        if($result ) {
            header("location:index.php");
        }
    }

?>


<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>tambah Buku</h1>

    <form action="" method="post">

        <div class="form-item">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul">
        </div>

        <div class="form-item">
            <label for="pengarang">Pengarang</label>
            <input type="text" name="pengarang" id="pengarang">
        </div>

        <div class="form-item">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok">
        </div>

        <button type="submit">Tambah</button>
</form>


    </body>
</html>