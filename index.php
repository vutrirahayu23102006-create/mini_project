<?php

require_once "products.php";
require_once "functions.php";

$totalSeluruhStok = 0;

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Information System (Desain)</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #333;
            color: white;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .stok-rendah {
            background-color: #ffe5e5;
        }

        .stok-rendah:hover {
            background-color: #ffd6d6;
        }

        .harga {
            white-space: nowrap;
        }

        .total {
            white-space: nowrap;
            font-weight: bold;
        }

        .total-seluruh {
            background-color: #eeeeee;
            font-weight: bold;
        }

        .total-seluruh td {
            border-top: 2px solid #333;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            color: #777;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Product Information System</h1>

    <p class="subtitle">
        Daftar Informasi Produk
    </p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Total Nilai Stok</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($products as $product): ?>

                <?php
                $totalNilaiStok = hitungTotalNilaiStok(
                    $product["harga"],
                    $product["stok"]
                );

                $totalSeluruhStok += $totalNilaiStok;

                $classStok = $product["stok"] < 3 ? "stok-rendah" : "";
                ?>

                <tr class="<?= $classStok ?>">

                    <td>
                        <?= $product["id"] ?>
                    </td>

                    <td>
                        <?= $product["nama"] ?>
                    </td>

                    <td>
                        <?= $product["kategori"] ?>
                    </td>

                    <td class="harga">
                        Rp <?= number_format($product["harga"], 0, ',', '.') ?>
                    </td>

                    <td>
                        <?= $product["stok"] ?>
                    </td>

                    <td>
                        <?= $product["deskripsi"] ?>
                    </td>

                    <td class="total">
                        Rp <?= number_format($totalNilaiStok, 0, ',', '.') ?>
                    </td>

                </tr>

            <?php endforeach; ?>

            <tr class="total-seluruh">

                <td colspan="6" style="text-align: right;">
                    Total Nilai Seluruh Stok
                </td>

                <td class="total">
                    Rp <?= number_format($totalSeluruhStok, 0, ',', '.') ?>
                </td>

            </tr>

        </tbody>
    </table>

    <div class="footer">
        Product Information System (Desain)
    </div>

</div>

</body>
</html>