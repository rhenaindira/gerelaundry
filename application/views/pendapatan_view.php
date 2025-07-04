<div class="container mt-4">
    <h3>Data Pendapatan Laundry</h3>
    <form method="get" action="<?php echo site_url('pendapatan/index'); ?>">
        <div class="mb-3">
            <label for="filter" class="form-label">Pilih Filter</label>
            <select name="filter" id="filter" class="form-control">
                <option value="semua" <?php echo ($this->input->get('filter') == 'semua' ? 'selected' : ''); ?>>Semua</option>
                <option value="minggu" <?php echo ($this->input->get('filter') == 'minggu' ? 'selected' : ''); ?>>Minggu Ini</option>
                <option value="bulan" <?php echo ($this->input->get('filter') == 'bulan' ? 'selected' : ''); ?>>Bulan Ini</option>
                <option value="hari" <?php echo ($this->input->get('filter') == 'hari' ? 'selected' : ''); ?>>Hari Ini</option>
                <option value="tahun" <?php echo ($this->input->get('filter') == 'tahun' ? 'selected' : ''); ?>>Tahun Ini</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tampilkan</button>
    </form>
    <br>
    <h6>Total Pendapatan: Rp. <?php echo isset($totalPendapatan) ? number_format($totalPendapatan, 0, ',', '.') : '0'; ?></h6>
</div>
