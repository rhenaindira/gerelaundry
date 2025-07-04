<?php
	class Pegawai extends CI_Controller
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
			$data['konten']=$this->load->view('pegawai_view','',TRUE);
			$data['table']=$this->load->view('pegawai_table',$datalist,TRUE);
			$this->load->view('admin_view',$data);	
		}	

		function simpandata()
		{
			$KodeLogin=$this->input->post('KodeLogin');
			$Username=$this->input->post('Username');
			$noHp=$this->input->post('noHp');
			$Password=$this->input->post('Password');
			$NamaLengkap=$this->input->post('NamaLengkap');
			$Level=$this->input->post('Level');

			$data=array(
				'Username'=>$Username,
				'noHp'=>$noHp,
				'Password'=>$Password,
				'NamaLengkap'=>$NamaLengkap,
				'Level'=>$Level,

			);

			if($KodeLogin=="")
			{
			$this->db->insert('tb_login',$data);
			$this->session->set_flashdata('pesan','Data sudah disimpan...');
			}
			else{
				$update=array(
					'KodeLogin'=>$KodeLogin
				);	
				$this->db->where($update);
				$this->db->update('tb_login',$data);
				$this->session->set_flashdata('pesan','Data sudah diedit...');
			}
			redirect('Pegawai','refresh');
				
		}	

		function tampildata()
		{
			$sql="select * from tb_login";	
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

		function hapusdata($KodeLogin)
		{
			$sql="delete from tb_login where KodeLogin ='".$KodeLogin."'";
			$this->db->query($sql);
			
			redirect('Pegawai','refresh');
				
		}

		function editdata($KodeLogin)
		{
		    $sql = "SELECT * FROM tb_login WHERE KodeLogin = '".$KodeLogin."'"; 
		    $query = $this->db->query($sql);

	    	if ($query->num_rows() > 0)
		 	{
	        $data = $query->row();

	        echo "
	        <script>
            $('#KodeLogin').val('".$data->KodeLogin."');
            $('#Username').val('".$data->Username."');
            $('#noHp').val('".$data->noHp."');
            $('#Password').val('".$data->Password."');
            $('#NamaLengkap').val('".$data->NamaLengkap."');
			$('#Level').val('".$data->Level."');
	        </script>";
  		 	}
			else 
			{
       		 echo "<script>alert('Data tidak ditemukan!');</script>";
    		}
		}
	}
?>