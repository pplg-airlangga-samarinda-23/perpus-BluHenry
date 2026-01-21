<?php
 include dirname(__DIR__) . '/database/koneksi.php';

 if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    //$sql = "SELECT * FROM buku WHERE id=?";
    // $book = $koneksi->execute_query($sql, [$id])->fetch_assoc();    
    $stmt = $koneksi->prepare("SELECT * FROM buku WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $book = $result->fetch_assoc();

 } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $stok = $_POST['stok'];
    $id = $_GET['id'];

    $sql = "UPDATE buku SEt judul=?, pengarang=?, stok=? WHERE id=?";
    // $result = $koneksi->execute_query($sql, [$judul, $pengarang, $stok, $id]);
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssii", $judul, $pengarang, $stok, $id);
    $result = $stmt->execute();

    if ($result) {
        header("Location:index.php");
    }
 }

?>

<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>Edit Buku</h1>

        <form action="" method="post">

            <div class="form-item">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" value="<?= $book['judul'] ?>">
            </div>

            <div class="form-item">
                <label for="pengarang">Pengarang</label>
                <input type="text" name="pengarang" id="pengarang" value="<?= $book['pengarang'] ?>">
            </div>

            <div class="form-item">
                <label for="stok">Stok</label>
                <input type="number" name="stok" id="stok" value="<?= $book['stok'] ?>">
            </div>

            <button type="submit">Edit</button>

        </form>
    </body>
</html>
