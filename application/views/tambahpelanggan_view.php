<script language="javascript">
function simpantambahpelanggan() {
    var namaPelanggan = $('#namaPelanggan').val();
    if (namaPelanggan == "") {
        alert("Nama Pelanggan masih kosong...");
        $('#namaPelanggan').focus();
        return false;
    }

    var noHp = $('#noHP').val();
    if (noHp == "") {
        alert("No. Hp masih kosong...");
        $('#noHP').focus();
        return false;
    }

    var alamat = $('#alamat').val();
    if (alamat == "") {
        alert("Alamat masih kosong...");
        $('#alamat').focus();
        return false;
    }

    $('#formtambahpelanggan').submit(); 
}
</script>

<div class="col mb-9">
    <div class="card-header bg-success text-white">Form Data Pelanggan</div>
    <div class="card-body">
    <?php
	$pesan=$this->session->flashdata('pesan');
	if ($pesan=="")
	{
		echo "";	
	}
	else
	{

	?>
	
	<div class="alert alert-success alert-dismissible fade show" role="alert">
   <button type="button" class="btn btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close">
  </button>
	<?php echo $pesan; ?>                        
	</div>
	
	<?php
	}
	?>
        <form name="formtambahpelanggan" id="formtambahpelanggan" method="post" action="<?php echo site_url('Tambahpelanggan/simpandata'); ?>">
        <input type="hidden" name="idPelanggan" id="idPelanggan"/>
            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2">Masukkan Nama Pelanggan</div>
                    <div class="col-sm-10">
                        <input type="text" name="namaPelanggan" id="namaPelanggan" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2">Masukkan No. HP Pelanggan</div>
                    <div class="col-sm-10">
                        <input type="text" name="noHp" id="noHp" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2">Alamat</div>
                    <div class="col-sm-10">
                        <textarea name="alamat" id="alamat" class="form-control" rows="3"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                    <input type="button" value="Simpan" class="btn btn-primary btn-sm" onClick="simpantambahpelanggan();">
                    <input type="reset" value="Batal" class="btn btn-warning btn-sm">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
