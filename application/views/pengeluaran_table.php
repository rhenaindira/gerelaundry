<div class="container mt-4">
    <h3>Data Pengeluaran Laundry</h3>
    <p>Daftar pengeluaran Laundry Gerees</p>
    <table class="table table-bordered">
        <thead>
            <tr class="table-primary">
                <th>No</th>
                <th>Tanggal</th>
                <th>Kategori </th>
                <th>Total</th>
                <th>Keterangan</th> 
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
        <td><?php echo $data->tanggal; ?></td>
        <td><?php echo $data->kategori; ?></td>
        <td><?php echo $data->total; ?></td>
        <td><?php echo $data->keterangan; ?></td>
        <td width="150">
        <button class="btn btn-sm btn-primary"  onclick="editdata('<?php echo isset($data->idPengeluaran) ? $data->idPengeluaran : ''; ?>')">
            <i class="fas fa-edit"></i>
        </button>

        <button class="btn btn-sm btn-danger" onclick="hapusdata('<?php echo isset($data->idPengeluaran) ? $data->idPengeluaran : ''; ?>')">
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
    function hapusdata(idPengeluaran) {
    if (confirm("Apakah yakin menghapus data ini?")) 
    {
        window.location.href = "<?php echo base_url(); ?>Pengeluaran/hapusdata/" + idPengeluaran;
    }
}

    function editdata(idPengeluaran)
    {
        load("Pengeluaran/editdata/"+idPengeluaran,"#script");    
    }
    </script>
</div>
