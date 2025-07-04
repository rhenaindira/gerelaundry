<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script language="javascript">
function simpantransaksi() {
    var tanggalmasuk = $('#tanggalmasuk').val();
    if (tanggalmasuk === "") {
        alert("Tanggal Masuk masih kosong...");
        $('#tanggalmasuk').focus();
        return false;
    }

    var tanggalkeluar = $('#tanggalkeluar').val();
    if (tanggalkeluar === "") {
        alert("Tanggal Keluar masih kosong...");
        $('#tanggalkeluar').focus();
        return false;
    }

    $('#formtransaksi').submit();  
    return false;
}
</script>

<script>
$(document).ready(function () {
    $("#idJenisLayanan").change(function () {
        var idJenisLayanan = $('#idJenisLayanan').val();

        if (idJenisLayanan === "") {
            $('#harga').val('');
        } else {
            $.ajax({
                url: "transaksi/caridatalayanan/" + idJenisLayanan,
                type: "GET",
                dataType: "json", 
                success: function (data) {
                    if (data.status === "success") {
                        $('#harga').val(data.harga);
                    } else {
                        alert("Harga tidak ditemukan untuk layanan ini!");
                    }
                },
                error: function () {
                    alert("Terjadi kesalahan saat mengambil data!");
                }
            });
        }
    });
});
</script>

<script>
$(document).ready(function () {
    $('#bayar').on('input', function () {
        var harga = $('#harga').val();  
        var bayar = $('#bayar').val();  
        
        var kembalian = parseInt(bayar - harga);
        
        $('#kembalian').val(kembalian);  
    });
});
</script>


<div class="col mb-9">
    <div class="card-header bg-primary text-white">Form Transaksi</div>
    <div class="card-body">
        <?php
        $pesan = $this->session->flashdata('pesan');
        if ($pesan) {
            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
            echo '<button type="button" class="btn btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo $pesan;
            echo '</div>';
        }
        ?>

        <form name="formtransaksi" id="formtransaksi" method="post" action="<?php echo site_url('Transaksi/simpandata'); ?>">
            <input type="hidden" name="idPelanggan" id="idPelanggan" />

            <div class="form-group">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Pilih Kasir</label>
                    <div class="col-sm-10">
                        <?php echo $this->mcaricombo->combologin('KodeLogin'); ?>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Pilih Nama Pelanggan</label>
                    <div class="col-sm-10">
                        <?php echo $this->mcaricombo->combopelanggan('idPelanggan'); ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3m">
                    <label class="col-sm-2 col-form-label">Pilih Jenis Layanan</label>
                    <div class="col-sm-10">
                        <?php echo $this->mcaricombo->combojenislayanan('idJenisLayanan'); ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Masukkan Tanggal Masuk</label>
                    <div class="col-sm-10">
                        <input type="date" name="tanggalmasuk" id="tanggalmasuk" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Masukkan Tanggal Keluar</label>
                    <div class="col-sm-10">
                        <input type="date" name="tanggalkeluar" id="tanggalkeluar" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Total Harga</label>
                    <div class="col-sm-10">
                        <input type="number" name="harga" id="harga" class="form-control" readonly />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Bayar</label>
                    <div class="col-sm-10">
                        <input type="number" name="bayar" id="bayar" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Kembalian</label>
                    <div class="col-sm-10">
                        <input type="number" name="kembalian" id="kembalian" class="form-control" readonly />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan dan Cetak Nota</button>
                    <input type="reset" value="Batal" class="btn btn-warning btn-sm" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
        document.querySelector('form').addEventListener('submit', function (e) {
            const submitButton = e.target.querySelector('button[type="submit"]');
            submitButton.disabled = true;
        });
</script>

<script language="javascript">
	
	function cetak()
	{
		var kembalian=$('#kembalian').val();
		if(kembalian=="")
		{
			alert ('Data belum lengkap');
			return false;	
		}
		
		if(confirm("Apakah yakin selesaikan transaksi ini?"))
		{
			window.open("<?php echo base_url()?>Transaksi/selesaidancetak", "_self");
		}	
	}

  </script>