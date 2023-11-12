<?php
include "koneksi.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - Tugas WAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="contain">
        <div class="mt-3">
            <h3 class="text-center">SUKANDA FOOD & BEVERAGES INVENTORY</h3>
            <h3 class="text-center">oleh Gede Dipta Narayana</h3>
        </div>

        <div class="card mt-3">
            <div class="card-header bg-primary text-white">
                Stock Vault
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modaladd">
                    Tambah Stock Data
                </button>
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>ID Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga (Rp.)</th>
                        <th>Kategori</th>
                        <th>Vendor</th>
                    </tr>

                    <?php
                    $id = 1503;
                    $show = mysqli_query($koneksi, "SELECT * FROM tstock ORDER BY id DESC");
                    while ($data = mysqli_fetch_array($show)) :
                    ?>

                        <tr>
                            <td><?= $id++ ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['harga'] ?></td>
                            <td><?= $data['kategori'] ?></td>
                            <td><?= $data['vendor'] ?></td>
                            <td>
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalchange<?= $id ?>">Ubah</a>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalerase<?= $id ?>">Hapus</a>
                            </td>
                        </tr>

                        <div class="modal fade modal-lg" id="modalchange<?= $id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Detail Produk</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <form method="POST" action="aksi_crud.php">
                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Produk</label>
                                                <input type="text" class="form-control" name="tnama" value="<?= $data['nama'] ?>" placeholder="Masukan Nama Produk">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Harga (Rp.)</label>
                                                <input type="int" class="form-control" name="tharga" value="<?= $data['harga'] ?>" placeholder="Masukan Nominal Saja">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Kategori</label>
                                                <select class="form-control" name="tkategori">
                                                    <option value="<?= $data['kategori'] ?>"><?= $data['kategori'] ?></option>
                                                    <option value="Dairy Product">Dairy Product</option>
                                                    <option value="Ice Cream">Ice Cream</option>
                                                    <option value="Frozen Food">Frozen Food</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Vendor</label>
                                                <input type="text" class="form-control" name="tvendor" value="<?= $data['vendor'] ?>" placeholder="Masukan Nama Vendor">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="bubah">Ubah Data</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->

                        <div class="modal fade modal-lg" id="modalerase<?= $id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <form method="POST" action="aksi_crud.php">
                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                        <div class="modal-body">
                                            <h5 class="text-center">Apakah Anda Yakin Ingin Menghapus Data? <br>
                                                <span class="text-danger"><?= $data['nama'] ?> - <?= $data['harga'] ?> </span>
                                            </h5>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="berase">Hapus Data</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>

                </table>

                <!-- Modal -->
                <div class="modal fade modal-lg" id="modaladd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Detail Produk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="aksi_crud.php">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" name="tnama" placeholder="Masukan Nama Produk">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Harga (Rp.)</label>
                                        <input type="int" class="form-control" name="tharga" placeholder="Masukan Nominal Saja">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kategori</label>
                                        <select class="form-control" name="tkategori">
                                            <option></option>
                                            <option value="Dairy Product">Dairy Product</option>
                                            <option value="Ice Cream">Ice Cream</option>
                                            <option value="Frozen Food">Frozen Food</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Vendor</label>
                                        <input type="text" class="form-control" name="tvendor" placeholder="Masukan Nama Vendor">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="bsimpan">Simpan Data</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>