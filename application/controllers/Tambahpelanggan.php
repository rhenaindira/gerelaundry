<?php
	class Tambahpelanggan extends CI_Controller
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
			$data['konten']=$this->load->view('tambahpelanggan_view','',TRUE);
			$data['table']=$this->load->view('tambahpelanggan_table',$datalist,TRUE);
			$this->load->view('admin_view',$data);	
		}	

		function simpandata()
		{
			$idPelanggan=$this->input->post('idPelanggan');
			$namaPelanggan=$this->input->post('namaPelanggan');
			$noHp=$this->input->post('noHp');
			$alamat=$this->input->post('alamat');

			$data=array(
				'namaPelanggan'=>$namaPelanggan,
				'noHp'=>$noHp,
				'alamat'=>$alamat,
			);

			if($idPelanggan=="")
			{
			$this->db->insert('tb_pelanggan',$data);
			$this->session->set_flashdata('pesan','Data sudah disimpan...');
			}
			else
			{
			$update=array(
				'idPelanggan'=>$idPelanggan
			);	
			$this->db->where($update);
			$this->db->update('tb_pelanggan',$data);
			$this->session->set_flashdata('pesan','Data sudah diedit...');
			}
			redirect('tambahpelanggan','refresh');
	
		}	

		function tampildata()
		{
			$sql="select * from tb_pelanggan";	
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

		function hapusdata($idPelanggan)
		{
			$sql="delete from tb_pelanggan where idPelanggan ='".$idPelanggan."'";
			$this->db->query($sql);
			
			redirect('tambahpelanggan','refresh');
				
		}

		function editdata($idPelanggan)
		{
			$sql="select * from tb_pelanggan where ";
			$sql.="idPelanggan='".$idPelanggan."'";	
			$query=$this->db->query($sql);
			if($query->num_rows()>0)
			{
				$data=$query->row();
				echo "<script>$('#idPelanggan').val('".$data->idPelanggan."')</script>";
				echo "<script>$('#namaPelanggan').val('".$data->namaPelanggan."')</script>";
				echo "<script>$('#noHp').val('".$data->noHp."')</script>";
				echo "<script>$('#alamat').val('".$data->alamat."')</script>";
			}
			
		}
		
	}
?>