<div class="container mt-4">
    <h3>Data Transaksi</h3>
    <div class="mb-3">
        <input type="text" id="cari" class="form-control" placeholder="Pencarian...">
   </div>  
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
    <tr data-idTransaksi="<?php echo $data->idTransaksi; ?>">
        <td><?php echo $no; ?></td>
        <td><?php echo $data->tanggalmasuk; ?></td>
        <td><?php echo $data->tanggalkeluar; ?></td>
        <td><?php echo $data->harga; ?></td>
        <td><?php echo $data->namaPelanggan; ?></td>
        <td><?php echo $data->namalayanan; ?></td>
        <td><?php echo $data->NamaLengkap; ?></td>
        <td class="status"><?php echo $data->status; ?></td>
        <td width="175"> 
            <select class="form-control" onchange="handleAction(this.value, '<?php echo $data->idTransaksi; ?>')">
                <option value="" disabled selected> Pilih Aksi </option>
                <option value="proses">Proses</option>
                <option value="siapambil">Siap Ambil</option>
                <option value="selesai">Selesai</option>
            </select>   
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    function handleAction(action, idTransaksi) {
        if (!action || !idTransaksi) return; 

        let url = "";
        if (action === 'proses') {
            url = "Detailorder/prosesstatus/" + idTransaksi;
        } else if (action === 'siapambil') {
            url = "Detailorder/siapambilstatus/" + idTransaksi;
        } else if (action === 'selesai') {
            url = "Detailorder/selesaistatus/" + idTransaksi;
        }

        $.ajax({
            url: url,
            method: "POST",
            success: function(response) {
                alert(response); 

                $("tr[data-idTransaksi='" + idTransaksi + "']").each(function() {
                    var row = $(this);
                    row.find(".status").text(action.charAt(0).toUpperCase() + action.slice(1)); 
                });
            },
            error: function() {
                alert("Terjadi kesalahan dalam memperbarui status.");
            }
        });
    }
    </script>
</div>
