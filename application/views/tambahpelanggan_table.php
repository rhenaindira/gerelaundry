<div class="container mt-4">
    <h3>Data Pelanggan</h3>
    <p>Daftar Pelanggan Laundry Gerees</p>
    <div class="mb-3">
        <input type="text" id="cari" class="form-control" placeholder="Pencarian...">
   </div>  
    <table class="table table-bordered" id="searchid">
        <thead>
            <tr class="table-success">
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>No Hp</th>
                <th>Alamat</th>
                <th>Aksi</th> 
            </tr>
        </thead>
        <tbody>
    <?php
	if(empty($hasil))
	{
		echo "";	
	}
	else
	{
		$no=1;
		foreach($hasil as $data):
	?>
    
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $data->namaPelanggan; ?></td>
        <td><?php echo $data->noHp; ?></td>
        <td><?php echo $data->alamat; ?></td>
        <td width="150">
        <button class="btn btn-sm btn-primary"  onclick="editdata('<?php echo isset($data->idPelanggan) ? $data->idPelanggan : ''; ?>')">
            <i class="fas fa-edit"></i>
        </button>

        <button class="btn btn-sm btn-danger" onclick="hapusdata('<?php echo isset($data->idPelanggan) ? $data->idPelanggan : ''; ?>')">
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
    function hapusdata(idPelanggan) {
    if (confirm("Apakah yakin menghapus data ini?")) 
    {
        window.location.href = "<?php echo base_url(); ?>Tambahpelanggan/hapusdata/" + idPelanggan;
    }
}

    function editdata(idPelanggan)
    {
        load("tambahpelanggan/editdata/"+idPelanggan,"#script");    
    }
    </script>
</div>
