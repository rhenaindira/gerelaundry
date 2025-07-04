<?php
	class Pengeluaran extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->model('validasi');
			$this->validasi->validasiakun();
		}

		function index()
		{
			$datalist['hasil']=$this->tampildata();
			$data['konten']=$this->load->view('pengeluaran_view','',TRUE);
			$data['table']=$this->load->view('pengeluaran_table',$datalist,TRUE);
			$this->load->view('admin_view',$data);	
		}	

		function simpandata()
		{
			$idPengeluaran=$this->input->post('idPengeluaran');
			$tanggal=$this->input->post('tanggal');
			$kategori=$this->input->post('kategori');
			$total=$this->input->post('total');
            $keterangan=$this->input->post('keterangan');

			$data=array(
				'tanggal'=>$tanggal,
				'kategori'=>$kategori,
				'total'=>$total,
				'keterangan'=>$keterangan,
			);

			if($idPengeluaran=="")
			{
			$this->db->insert('tb_pengeluaran',$data);
			$this->session->set_flashdata('pesan','Data sudah disimpan...');
			}
			else
			{
			$update=array(
				'idPengeluaran'=>$idPengeluaran
			);	
			$this->db->where($update);
			$this->db->update('tb_pengeluaran',$data);
			$this->session->set_flashdata('pesan','Data sudah diedit...');
			}
			redirect('pengeluaran','refresh');
	
		}	

		function tampildata()
		{
			$sql="select * from tb_pengeluaran";	
			$query=$this->db->query($sql);
			if($query->num_rows()>0)
			{
				foreach($query->result() as $data)
				{
					$hasil[]=$data;	
				}
			}
			else
			{
				$hasil="";	
			}
			return $hasil;
		}

		function hapusdata($idPengeluaran)
		{
			$sql="delete from tb_pengeluaran where idPengeluaran ='".$idPengeluaran."'";
			$this->db->query($sql);
			
			redirect('pengeluaran','refresh');
				
		}

		function editdata($idPengeluaran)
		{
			$sql="select * from tb_pengeluaran where ";
			$sql.="idPengeluaran='".$idPengeluaran."'";	
			$query=$this->db->query($sql);
			if($query->num_rows()>0)
			{
				$data=$query->row();
				echo "<script>$('#idPengeluaran').val('".$data->idPengeluaran."')</script>";
				echo "<script>$('#tanggal').val('".$data->tanggal."')</script>";
				echo "<script>$('#kategori').val('".$data->kategori."')</script>";
				echo "<script>$('#total').val('".$data->total."')</script>";
                echo "<script>$('#keterangan').val('".$data->keterangan."')</script>";           
			}
			
		}
		
	}
?>