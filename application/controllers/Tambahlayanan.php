<?php
	class Tambahlayanan extends CI_Controller
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
			$data['konten']=$this->load->view('tambahlayanan_view','',TRUE);
			$data['table']=$this->load->view('tambahlayanan_table',$datalist,TRUE);
			$this->load->view('admin_view',$data);	
		}	

		function simpandata()
		{
			$idJenisLayanan=$this->input->post('idJenisLayanan');
			$namalayanan=$this->input->post('namalayanan');
			$KategoriLayanan=$this->input->post('KategoriLayanan');
			$Banyak=$this->input->post('Banyak');
			$JenisLayanan=$this->input->post('JenisLayanan');
			$harga=$this->input->post('harga');

			$data=array(
				'namalayanan'=>$namalayanan,
				'KategoriLayanan'=>$KategoriLayanan,
				'Banyak'=>$Banyak,
				'JenisLayanan'=>$JenisLayanan,
				'harga'=>$harga,

			);

			if($idJenisLayanan=="")
			{
			$this->db->insert('tb_jenislayanan',$data);
			$this->session->set_flashdata('pesan','Data sudah disimpan...');
			}
			else{
				$update=array(
					'idJenisLayanan'=>$idJenisLayanan
				);	
				$this->db->where($update);
				$this->db->update('tb_jenislayanan',$data);
				$this->session->set_flashdata('pesan','Data sudah diedit...');
			}
			redirect('tambahlayanan','refresh');
				
		}	

		function tampildata()
		{
			$sql="select * from tb_jenislayanan";	
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

		function hapusdata($idJenisLayanan)
		{
			$sql="delete from tb_jenislayanan where idJenisLayanan ='".$idJenisLayanan."'";
			$this->db->query($sql);
			
			redirect('tambahlayanan','refresh');
				
		}

		function editdata($idJenisLayanan)
		{
		    $sql = "SELECT * FROM tb_jenislayanan WHERE idJenisLayanan = '".$idJenisLayanan."'"; 
		    $query = $this->db->query($sql);

	    	if ($query->num_rows() > 0)
		 	{
	        $data = $query->row();

	        echo "
	        <script>
            $('#idJenisLayanan').val('".$data->idJenisLayanan."');
		 	$('#namalayanan').val('".$data->namalayanan."');
            $('#KategoriLayanan').val('".$data->KategoriLayanan."');
            $('#Banyak').val('".$data->Banyak."');
            $('#JenisLayanan').val('".$data->JenisLayanan."');
            $('#harga').val('".$data->harga."');
	        </script>";
  		 	}
			else 
			{
       		 echo "<script>alert('Data tidak ditemukan!');</script>";
    		}
		}

	}
?>