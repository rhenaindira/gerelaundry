<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Transaksi Laundry</title>
    <style>
        @page {
            font-family: 'Times New Roman', Times, serif;
            font-size: 14px;
            margin: 40px 80px 40px 70px;
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.6;
        }
        .container {
            width: 85%;
            margin: 0 auto;
            text-align: center;
        }
        .content {
            text-align: left;
            margin-top: 10px;
        }
        .line {
            border-top: 1px solid #333;
            margin: 10px 0;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="container">
    <p><strong>NOTA TRANSAKSI LAUNDRY</strong></p>
    <p><strong>GERE LAUNDRY</strong></p>
    <p>Jalan Kampus Bukit Jimbaran, Kuta Selatan - Badung, Bali</p>
    <div class="line"></div>

    <div class="content">
        <p>Tanggal Masuk: <?php echo isset($transaksi['tanggalmasuk']) ? htmlspecialchars($transaksi['tanggalmasuk']) : 'N/A'; ?></p>
        <p>Nama Kasir: <?= isset($transaksi['NamaLengkap']) ? htmlspecialchars($transaksi['NamaLengkap']) : 'N/A'; ?></p>
        <p>No. Transaksi: <?php echo isset($transaksi['notransaksi']) ? htmlspecialchars($transaksi['notransaksi']) : 'N/A'; ?></p>
    </div>
    
    <div class="line"></div>
    
    <div class="content">
    <p>Nama Pelanggan: <?php echo isset($transaksi['namaPelanggan']) ? htmlspecialchars($transaksi['namaPelanggan']) : 'N/A'; ?></p>
        <?php if (!empty($idJenisLayanan)) : ?>
            <?php foreach ($idJenisLayanan as $item): ?>
                <p><?php echo htmlspecialchars($item['namalayanan']); ?>: Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?></p>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-center">Tidak ada layanan</p>
        <?php endif; ?>
    </div>

    <div class="line"></div>
    
    <div class="content">
        <p>Total: <span class="text-right">Rp <?php echo isset($transaksi['harga']) ? number_format($transaksi['harga'], 0, ',', '.') : '0'; ?></span></p>
        <p>Bayar: <span class="text-right">Rp <?php echo isset($transaksi['bayar']) ? number_format($transaksi['bayar'], 0, ',', '.') : '0'; ?></span></p>
        <p>Kembali: <span class="text-right">Rp <?php echo isset($transaksi['kembalian']) ? number_format($transaksi['kembalian'], 0, ',', '.') : '0'; ?></span></p>
    </div>
    
    <div class="line"></div>
    
    <div class="footer">
        <p class="text-center">TERIMA KASIH SUDAH MENGGUNAKAN LAYANAN KAMI</p>
        <p class="text-center"><strong>GERE LAUNDRY</strong></p>
        <p class="text-center"><small>Hitung dan periksa laundry Anda, pengaduan setelah meninggalkan outlet tidak kami layani.</small></p>
    </div>
</div>

</body>
</html>
