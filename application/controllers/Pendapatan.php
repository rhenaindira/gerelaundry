<?php
class Pendapatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('validasi');
        $this->validasi->validasiakun();
    }
    
    function index()
    {
        $filter = $this->input->get('filter'); 
        $datalist = $this->tampildata($filter); 
        $data['totalPendapatan'] = $datalist['totalPendapatan'];
        $data['konten'] = $this->load->view('pendapatan_view', $data, TRUE);
        $data['table'] = $this->load->view('pendapatan_table', $datalist, TRUE);
        $this->load->view('admin_view', $data);
    }

    function tampildata($filter = 'semua')
{
    $where = '';
    $tanggal_sekarang = date('Y-m-d');

    switch ($filter) {
        case 'hari':
            $where = "WHERE DATE(tb_transaksi.tanggalmasuk) = '$tanggal_sekarang'";
            break;
        case 'minggu':
            $where = "WHERE YEARWEEK(tb_transaksi.tanggalmasuk, 1) = YEARWEEK('$tanggal_sekarang', 1)";
            break;
        case 'bulan':
            $where = "WHERE MONTH(tb_transaksi.tanggalmasuk) = MONTH('$tanggal_sekarang') AND YEAR(tb_transaksi.tanggalmasuk) = YEAR('$tanggal_sekarang')";
            break;
        case 'tahun':
            $where = "WHERE YEAR(tb_transaksi.tanggalmasuk) = YEAR('$tanggal_sekarang')";
            break;
        default:
            $where = '';
    }

    // Menambahkan kondisi untuk memastikan tanggal keluar berbeda
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
        $where
        GROUP BY 
            tb_transaksi.tanggalkeluar  -- Mengelompokkan berdasarkan tanggal keluar yang berbeda
        ORDER BY 
            tb_transaksi.tanggalmasuk ASC
    ";

    $query = $this->db->query($sql);

    $hasil = $query->result();
    $totalPendapatan = array_sum(array_column($query->result_array(), 'harga'));

    return ['hasil' => $hasil, 'totalPendapatan' => $totalPendapatan];
}
    
}
?>