<script language="javascript">
function simpanpegawai() {
    var Username = $('#Username').val();
    if (Username == "") {
        alert("Username masih kosong...");
        $('#Username').focus();
        return false;
    }

    var noHp = $('#noHP').val();
    if (noHp == "") {
        alert("No. Hp masih kosong...");
        $('#noHP').focus();
        return false;
    }

    var Password = $('#Password').val();
    if (Password == "") {
        alert("Password masih kosong...");
        $('#Password').focus();
        return false;
    }

    var NamaLengkap = $('#NamaLengkap').val();
    if (NamaLengkap == "") {
        alert("Nama Lengkap masih kosong...");
        $('#NamaLengkap').focus();
        return false;
    }

    var Level = $('#Level').val();
    if (Level == "") {
        alert("Level masih kosong...");
        $('#Level').focus();
        return false;
    }

    $('#formpegawai').submit(); 
}
</script>

<div class="col mb-9">
    <div class="card-header bg-primary text-white">Form Tambah Pegawai</div>
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
	
	<div class="alert alert-primary alert-dismissible fade show" role="alert">
   <button type="button" class="btn btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close">
  </button>
	<?php echo $pesan; ?>                        
	</div>
	
	<?php
	}
	?>
        <form name="formpegawai" id="formpegawai" method="post" action="<?php echo site_url('Pegawai/simpandata'); ?>">
        <input type="hidden" name="KodeLogin" id="KodeLogin"/>
            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2">Masukkan Username</div>
                    <div class="col-sm-10">
                        <input type="text" name="Username" id="Username" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2">Masukkan No. HP </div>
                    <div class="col-sm-10">
                        <input type="text" name="noHp" id="noHp" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2">Masukkan Password</div>
                    <div class="col-sm-10">
                        <textarea name="Password" id="Password" class="form-control" rows="3"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2">Masukkan Nama Lengkap</div>
                    <div class="col-sm-10">
                        <textarea name="NamaLengkap" id="NamaLengkap" class="form-control" rows="3"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2">Level</div>
                    <div class="col-sm-10">
                        <select name="Level" id="Level" class="form-control">
                            <option value="" disabled selected> Pilih Level Pegawai </option>
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                    <input type="button" value="Simpan" class="btn btn-primary btn-sm" onClick="simpanpegawai();">
                    <input type="reset" value="Batal" class="btn btn-warning btn-sm">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
