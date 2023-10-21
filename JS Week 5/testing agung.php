<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class=container-fluid>
        <h2>TEST HITUNG</h2>

        <form action="latihan3.php" method="get">

            <!-- Angka 1 -->
            <div class="form-group mt-5">
                <label for="angka1">Angka pertama:</label>
                <input type="number" class="form-control" name="angka_pertama" id="input_angka" required>
            </div>

            <!-- Angka 1 -->

            <!-- Angka 2 -->
            <div class="form-group mt-5">
                <label for="angka2">Angka kedua :</label>
                <input type="number" class="form-control" name="angka_kedua" id="input_angka" required>
            </div>
            <!-- Angka 2 -->

            <!-- Operasi -->
            <div class="form-group mt-4">
                <label for="operasi">Operasi:</label>
                <select class="form-control" id="operasi" name="operasi" required>
                    <option selected>Pilih Operasi</option>
                    <option value="1">Tambah</option>
                    <option value="2">Kurang</option>
                    <option value="3">Kali</option>
                    <option value="3">Bagi</option>
                </select>
            </div>
            <!-- Button -->

            <button type="submit" class="btn btn-danger mt-3">Hitung!</button>

    </div>
    </form>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $angka = $_get["angka1"];
        $angka = $_get["angka2"];
        $operasi = $_get["operasi"];


        if ($operasi == "tambah") {
            $hasil = $angka1 + $angka2;
        } elseif ($operasi == "kurang") {
            $hasil = $angka1 - $angka2;
        } elseif ($operasi == "kali") {
            $hasil = $angka1 * $angka2;
        } elseif ($operasi == "bagi") {
            if ($angka2 != 0) {
                $hasil = $angka1 / $angka2;
            } else {
                $hasil = "Tidak bisa membagi dengan 0";
            }
        }

        // Tampilkan hasil
        echo "Hasil perhitungan: " . $hasil;
    }
    ?>

</body>

</html>