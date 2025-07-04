<script language="javascript">
function simpantambahlayanan() {
    var KategoriLayanan = $('#KategoriLayanan').val();
    if (KategoriLayanan == "") {
        alert("Kategori Layanan masih kosong...");
        $('#KategoriLayanan').focus();
        return false;
    }

    var namalayanan = $('#namalayanan').val();
    if (namalayanan == "") {
        alert("Nama Layanan masih kosong...");
        $('#namalayanan').focus();
        return false;
    }

    var Banyak = $('#Banyak').val();
    if (Banyak == "") {
        alert("Banyak masih kosong...");
        $('#Banyak').focus();
        return false;
    }

    var JenisLayanan = $('#JenisLayanan').val();
    if (JenisLayanan == "") {
        alert("Jenis Layanan masih kosong...");
        $('#JenisLayanan').focus();
        return false;
    }

    var harga = $('#harga').val();
    if (harga == "") {
        alert("Harga masih kosong...");
        $('#harga').focus();
        return false;
    }

    $('#formtambahlayanan').submit(); 
}
</script>

<div class="col mb-4">
    <div class="card-header bg-info text-white">Form Layanan</div>
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
	
	<div class="alert alert-info alert-dismissible fade show" role="alert">
   <button type="button" class="btn btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close">
  </button>
	<?php echo $pesan; ?>                        
	</div>
	
	<?php
	}
	?>


 
        <form name="formtambahlayanan" id="formtambahlayanan" method="post" action="<?php echo site_url('Tambahlayanan/simpandata'); ?>">
        <input type="hidden" name="idJenisLayanan" id="idJenisLayanan"/>

        <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2">Nama Layanan</div>
                    <div class="col-sm-10">
                        <input type="namalayanan" name="namalayanan" id="namalayanan" class="form-control" />
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2">Kategori Layanan</div>
                    <div class="col-sm-10">
                        <select name="KategoriLayanan" id="KategoriLayanan" class="form-control">
                            <option value="" disabled selected> Pilih Kategori Layanan </option>
                            <option value="Reguler">Reguler</option>
                            <option value="Express">Express</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2">Banyak</div>
                    <div class="col-sm-10">
                        <input type="Banyak" name="Banyak" id="Banyak" class="form-control" />
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2">Jenis Layanan</div>
                    <div class="col-sm-10">
                        <select name="JenisLayanan" id="JenisLayanan" class="form-control">
                            <option value=""disabled selected> Pilih Jenis Layanan </option>
                            <option value="Kg">Kg</option>
                            <option value="Pcs">Pcs</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2">Harga</div>
                    <div class="col-sm-10">
                        <input type="number" name="harga" id="harga" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <button type="submit" value="Simpan" class="btn btn-primary btn-sm">Submit</button>
                        <input type="reset" value="Batal" class="btn btn-warning btn-sm">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
