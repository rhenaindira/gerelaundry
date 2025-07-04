<div class="container mt-4">
    <table class="table table-bordered" id="searchid">
        <thead>
            <tr class="table-info">
                <th>No</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Harga</th>
                <th>Nama Pelanggan</th>
                <th>Jenis Layanan</th>
                <th>Nama Kasir</th>
                <th>Status</th>           
            </tr>
        </thead>
    <tbody>
    <?php
    if(empty($hasil)) {
        echo "<tr><td colspan='8'>Tidak ada data.</td></tr>";  
    } else {
        $no = 1;
        foreach($hasil as $data): 
    ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $data->tanggalmasuk; ?></td>
        <td><?php echo $data->tanggalkeluar; ?></td>
        <td><?php echo number_format($data->harga, 0, ',', '.'); ?></td>
        <td><?php echo $data->namaPelanggan; ?></td>
        <td><?php echo $data->namalayanan; ?></td>
        <td><?php echo $data->NamaLengkap; ?></td>
        <td><?php echo $data->status; ?></td>
      </tr>
    <?php
        $no++;
        endforeach;
    }
    ?> 
    </tbody>
    </table>
</div>
