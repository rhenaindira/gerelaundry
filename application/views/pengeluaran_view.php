<script language="javascript">
function simpanpengeluaran() {
    var tanggal = $('#tanggal').val();
    if (tanggal == "") {
        alert("Pilih Tanggal masih kosong...");
        $('#tanggal').focus();
        return false;
    }

    var kategori = $('#kategori').val();
    if (kategori == "") {
        alert("Kategori masih kosong...");
        $('#kategori').focus();
        return false;
    }

    var total = $('#total').val();
    if (total == "") {
        alert("Total masih kosong...");
        $('#total').focus();
        return false;
    }

    var keterangan = $('#keterangan').val();
    if (keterangan == "") {
        alert("Keterangan masih kosong...");
        $('#keterangan').focus();
        return false;
    }

    $('#formpengeluaran').submit(); 
}
</script>

<div class="col mb-9">
    <div class="card-header bg-primary text-white">Form Pengeluaran</div>
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
        <form name="formpengeluaran" id="formpengeluaran" method="post" action="<?php echo site_url('Pengeluaran/simpandata'); ?>">
        <input type="hidden" name="idPengeluaran" id="idPengeluaran"/>
            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2">Pilih Tanggal </div>
                    <div class="col-sm-10">
                        <input type="date" name="tanggal" id="tanggal" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2"> Pilih Kategori Pengeluaran </div>
                    <div class="col-sm-10">
                        <select name="kategori" id="kategori" class="form-control">
                            <option value=""disabled selected> Pilih Kategori </option>
                            <option value="Gaji">Gaji</option>
                            <option value="Bonus">Bonus</option>
                            <option value="Bahan Baku">Bahan Baku</option>
                            <option value="Listrik">Listrik</option>
                            <option value="Air">Air</option>
                            <option value="Sewa">Sewa</option>
                            <option value="LainLain">Lain - Lain</option> 
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2">Total </div>
                    <div class="col-sm-10">
                        <input type="number" name="total" id="total" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2">Keterangan </div>
                    <div class="col-sm-10">
                        <input type="text" name="keterangan" id="keterangan" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                    <input type="button" value="Simpan" class="btn btn-primary btn-sm" onClick="simpanpengeluaran();">
                    <input type="reset" value="Batal" class="btn btn-warning btn-sm">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
