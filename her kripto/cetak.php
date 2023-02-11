<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Utama</title>
</head>

<body style="width: 700px; margin: auto; padding: 10px;"onload="print()">
    <h2 style="text-align: center;">DATA PERSEDIAAN BARANG</h2>
    <table border="1" style="border-collapse: collapse; margin-top: 10px; width: 100%;">
        <tr style="text-align: center; font-weight: bold;">
            <td>No</td>
            <td>Nama Barang</td>
            <td>Stok</td>
            <td>Harga (Rp)</td>
        </tr>
        <?php
        include 'koneksi.php';
        $nomor_urut = 0;
        $result = selectAllData();
        $countData = mysqli_num_rows($result);
        if ($countData < 1) { 
        ?>
            <tr>
                <td colspan="5" style="text-align: center; font-weight: bold; font-size: 12px; padding: 5px;">TIDAK ADA DATA</td>
            </tr>

            <?php
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $nomor_urut = $nomor_urut + 1;
            ?>

                <tr style="text-align: center;">
                    <td><?php echo $nomor_urut; ?></td>
                    <td><?php echo $row['nama_barang']; ?></td>
                    <td><?php echo $row['stok']; ?></td>
                    <td>Rp. <?php echo number_format($row['harga']); ?></td>
                </tr>

        <?php }
        } ?>
    </table>

</body>

</html>