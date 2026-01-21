<?php 
    include dirname(__DIR__) . '/database/koneksi.php';

    $sql = "SELECT * FROM buku";
    $result = $koneksi->query($sql);
    $books = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>Data Buku</h1>
        <a href="create.php">Tambah</a>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=0; foreach ($books as $book): ?>
                    <tr>
                        <td><?= ++$no; ?></td>
                        <td><?= $book['judul']; ?></td>
                        <td><?= $book['pengarang']; ?></td>
                        <td><?= $book['stok']; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $book['id'] ?>">Edit</a>
                            <a href="delete.php?id=<?= $book['id'] ?>">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
    </body>
</html>

