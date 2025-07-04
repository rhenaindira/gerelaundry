<?php
class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mcaricombo');
        $this->load->model('validasi');
        $this->validasi->validasiakun();
    }

    public function index()
    {
        // $datalist['hasil'] = $this->tampildata();
        $data['konten'] = $this->load->view('transaksi_view', '', TRUE);
        $this->load->view('admin_view', $data);
    }

    public function simpandata()
    {
        $notransaksi = $this->buatnotransaksi();
        $tanggalmasuk = $this->input->post('tanggalmasuk');
        $tanggalkeluar = $this->input->post('tanggalkeluar');
        $harga = $this->input->post('harga');
        $idPelanggan = $this->input->post('idPelanggan');
        $idJenisLayanan = $this->input->post('idJenisLayanan');
        $KodeLogin = $this->input->post('KodeLogin');
        $kembalian = $this->input->post('kembalian');
        $bayar = $this->input->post('bayar');

        $data = [
            'notransaksi' => $notransaksi, 
            'tanggalmasuk' => $tanggalmasuk,
            'tanggalkeluar' => $tanggalkeluar,
            'harga' => $harga,
            'idPelanggan' => $idPelanggan,
            'idJenisLayanan' => $idJenisLayanan,
            'KodeLogin' => $KodeLogin,
            'kembalian' => $kembalian,
            'bayar' => $bayar,
            'status' => 'Proses', 
        ];

        $this->db->insert('tb_transaksi', $data);

        $this->cetaknota($notransaksi);

        $this->session->set_flashdata('pesan', 'Data sudah disimpan dan nota sudah dicetak...');
        redirect('Transaksi', 'refresh');
    }

    public function caridatalayanan($idJenisLayanan)
    {
        $query = $this->db->get_where('tb_jenislayanan', ['idJenisLayanan' => $idJenisLayanan]);

        if ($query->num_rows() > 0) {
            $data = $query->row();
            echo json_encode([
                'status' => 'success',
                'harga' => $data->harga
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'harga' => 0
            ]);
        }
    }

    function buatnotransaksi()
    {
        $kata = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
        $Tahun = date('Y');
        $Bulan = date('m');
        $nomoracak = substr(str_shuffle($kata), 0, 4);  
        return "GERE-" . $Tahun . $Bulan . "-" . $nomoracak;
    }

    function cetaknota($notransaksi)
    {
        $this->db->select('tb_transaksi.*, tb_login.NamaLengkap, tb_pelanggan.namaPelanggan');
        $this->db->join('tb_login', 'tb_transaksi.KodeLogin = tb_login.KodeLogin');
        $this->db->join('tb_pelanggan', 'tb_transaksi.idPelanggan = tb_pelanggan.idPelanggan');
        $this->db->where('tb_transaksi.notransaksi', $notransaksi);
        $transaksi = $this->db->get('tb_transaksi')->row_array();

        $this->db->select('tb_jenislayanan.namalayanan, tb_jenislayanan.harga');
        $this->db->join('tb_transaksi', 'tb_transaksi.idJenisLayanan = tb_jenislayanan.idJenisLayanan');
        $this->db->where('tb_transaksi.notransaksi', $notransaksi);
        $layanan = $this->db->get('tb_jenislayanan')->result_array();

        if (!$transaksi) {
            $this->session->set_flashdata('pesan', 'Data transaksi tidak ditemukan.');
            redirect('Transaksi', 'refresh');
            return;
        }

        $data = [
            'transaksi' => $transaksi,
            'idJenisLayanan' => $layanan,
        ];

        require_once(APPPATH . 'libraries/dompdf/autoload.inc.php');
        $pdf = new Dompdf\Dompdf();
        $pdf->setPaper('A4', 'portrait');
        $pdf->loadHtml($this->load->view('cetaknota_pdf', $data, true));
        $pdf->render();
        $pdf->stream('Nota Laundry', ['Attachment' => false]);
    }
}
?>
