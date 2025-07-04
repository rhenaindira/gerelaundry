<?php
class Detailorder extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('validasi');
        $this->validasi->validasiakun();
    }

    function index()
    {
        $datalist['hasil'] = $this->tampildata();
        $data['table'] = $this->load->view('transaksi_table', $datalist, TRUE);
        $this->load->view('admin_view', $data);  
          
    }

    function tampildata()
{
    $sql = "
        SELECT 
            tb_transaksi.idTransaksi,
            tb_transaksi.tanggalmasuk,
            tb_transaksi.tanggalkeluar,
            tb_transaksi.harga,
            tb_pelanggan.namaPelanggan,
            tb_jenislayanan.namalayanan,
            tb_login.NamaLengkap,
            tb_transaksi.status
        FROM 
            tb_transaksi
        INNER JOIN 
            tb_pelanggan ON tb_transaksi.idPelanggan = tb_pelanggan.idPelanggan
        INNER JOIN 
            tb_jenislayanan ON tb_transaksi.idJenisLayanan = tb_jenislayanan.idJenisLayanan
        INNER JOIN 
            tb_login ON tb_transaksi.KodeLogin = tb_login.KodeLogin
        WHERE 
            tb_transaksi.tanggalkeluar != ''  -- Pastikan tanggal keluar tidak kosong
        GROUP BY 
            tb_transaksi.tanggalkeluar  -- Kelompokkan berdasarkan tanggal keluar
        ORDER BY 
            tb_transaksi.tanggalmasuk ASC
    ";

    $query = $this->db->query($sql);

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $data) {
            $hasil[] = $data;
        }
    } else {
        $hasil = [];
    }

    return $hasil;
}

    

    public function prosesstatus($idTransaksi)
    {
        $status = 'Proses';
        $this->db->where('idTransaksi', $idTransaksi);
        $update = $this->db->update('tb_transaksi', array('status' => $status));
    
        if ($update) {
            echo "Status berhasil diperbarui menjadi Proses.";
        } else {
            echo "Gagal memperbarui status.";
        }
    }    

    public function siapambilstatus($idTransaksi)
    {
        $status = 'Siap Ambil';
        $this->db->where('idTransaksi', $idTransaksi);
        $update = $this->db->update('tb_transaksi', array('status' => $status));

        if ($update) {
            echo "Status berhasil diperbarui menjadi Siap Ambil.";
        } else {
            echo "Gagal memperbarui status.";
        }
    }

    public function selesaistatus($idTransaksi)
    {
        $status = 'Selesai';
        $this->db->where('idTransaksi', $idTransaksi);
        $update = $this->db->update('tb_transaksi', array('status' => $status));

        if ($update) {
            echo "Status berhasil diperbarui menjadi Selesai.";
        } else {
            echo "Gagal memperbarui status.";
        }
    }
}
?>
