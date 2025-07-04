<div class="container mt-4">
    <h3>Data Pegawai</h3>
    <p>Daftar Pegawai Laundry Gerees</p>
    <table class="table table-bordered">
        <thead>
            <tr class="table-primary">
                <th>No</th>
                <th>Username Pegawai</th>
                <th>No Hp</th>
                <th>Password</th>
                <th>Nama Lengkap Pegawai</th> 
                <th>Level</th> 
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
        <td><?php echo $data->Username; ?></td>
        <td><?php echo $data->noHp; ?></td>
        <td><?php echo $data->Password; ?></td>
        <td><?php echo $data->NamaLengkap; ?></td>
        <td><?php echo $data->Level; ?></td>
        <td width="150">
        <button class="btn btn-sm btn-primary"  onclick="editdata('<?php echo isset($data->KodeLogin) ? $data->KodeLogin : ''; ?>')">
            <i class="fas fa-edit"></i>
        </button>

        <button class="btn btn-sm btn-danger" onclick="hapusdata('<?php echo isset($data->KodeLogin) ? $data->KodeLogin : ''; ?>')">
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
    function hapusdata(KodeLogin) {
    if (confirm("Apakah yakin menghapus data ini?")) 
    {
        window.location.href = "<?php echo base_url(); ?>Pegawai/hapusdata/" + KodeLogin;
    }
}

    function editdata(KodeLogin)
    {
        load("Pegawai/editdata/"+KodeLogin,"#script");    
    }
    </script>
</div>
