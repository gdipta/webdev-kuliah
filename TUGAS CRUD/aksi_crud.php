<?php

include "koneksi.php";

if (isset($_POST['bsimpan'])) {

    $simpan = mysqli_query($koneksi, "INSERT INTO tstock (nama, harga, kategori, vendor)
                                      VALUES'$_POST[tnama]',
                                             '$_POST[tharga]',
                                             '$_POST[tkategori]',
                                             '$_POST[tvendor]");

    if ($simpan) {
        echo "<script>
            alert('Tambah Data Berhasil!');
            document.location='index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal Disimpan!');
            document.location='index.php';
        </script>";
    }
}

if (isset($_POST['bubah'])) {

    $ubah = mysqli_query($koneksi, "UPDATE tstock SET
                                                        nama = '$_POST[tnama]',
                                                        harga = '$_POST[tharga]',
                                                        kategori = '$_POST[tkategori]',
                                                        vendor = '$_POST[tvendor]'
                                                    WHERE id = '$_POST[id]'
                                                        ");

    if ($ubah) {
        echo "<script>
            alert('Ubah Data Berhasil!');
            document.location='index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal Diubah!');
            document.location='index.php';
        </script>";
    }
}

if (isset($_POST['berase'])) {

    $ubah = mysqli_query($koneksi, "DELETE FROM tstock WHERE id = '$_POST[id]'");

    if ($ubah) {
        echo "<script>
            alert('Hapus Data Berhasil!');
            document.location='index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal Dihapus!');
            document.location='index.php';
        </script>";
    }
}
