<div class="container mt-4">
    <h3>Data Layanan Laundry</h3>
    <br></br>
    <table class="table table-bordered">
        <thead>
            <tr class="table-info">
                <th>No</th>
                <th>Nama Layanan</th>
                <th>Kategori Layanan</th>
                <th>Berat</th>
                <th>Jenis Layanan</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
    <tbody>
    <?php
    if(empty($hasil)) {
        echo "";  
    } else {
        $no = 1;
        foreach($hasil as $data): 
    ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $data->namalayanan; ?></td>
        <td><?php echo $data->KategoriLayanan; ?></td>
        <td><?php echo $data->Banyak; ?></td>
        <td><?php echo $data->JenisLayanan; ?></td>
        <td><?php echo number_format($data->harga, 0, ',', '.'); ?></td>
        <td width="150">
        <button class="btn btn-sm btn-primary" onclick="editdata('<?php echo isset($data->idJenisLayanan) ? $data->idJenisLayanan : ''; ?>')">
            <i class="fas fa-edit"></i>
        </button>

        <button class="btn btn-sm btn-danger" onclick="hapusdata('<?php echo isset($data->idJenisLayanan) ? $data->idJenisLayanan : ''; ?>')">
           <i class="fas fa-trash"></i>
        </button>
        </td>
      </tr>
    <?php
        $no++;
        endforeach;
    }
    ?> 
    </tbody>
    </table>
    <div id="script"></div>
    <script language="javascript">
    function hapusdata(idJenisLayanan) {
        if (confirm("Apakah yakin menghapus data ini?")) 
        {
        window.location.href = "<?php echo base_url(); ?>Tambahlayanan/hapusdata/" + idJenisLayanan;
        }
}
    function editdata(idJenisLayanan)
    {
        load("tambahlayanan/editdata/"+idJenisLayanan,"#script");    
    }
    </script>
</div>
