<?php
	class Halaman extends CI_Controller
	{
		function index()
		{
			$this->load->view('login_view');	
		}
		
		function proseslogin()
		{
			//ambil data dari form
			$Username=$this->input->post('Username');
			$Password=$this->input->post('Password');
			
			//sintak query untuk cek data username di tb = form
			$sql="select * from tb_login where Username= ? ";
			$query=$this->db->query($sql,array($Username));
			
			
			if ($query->num_rows()>0)
			{
				//jika username ada
				$data=$query->row(); //ambil semua field di tb
				if ($data->Password==$Password) //pwd tb = form
				{
					$array=array(
						'KodeLogin'=>$data->KodeLogin,
						'Username'=>$data->Username,
						'NamaLengkap'=>$data->NamaLengkap,
						'Level'=>$data->Level,
					);	
					$this->session->set_userdata($array);	
					redirect('dashboard/admin','refresh'); //halaman admin
				}
				else //jika pwd != form
				{
					$this->session->set_flashdata('pesan','Password Salah...');
					redirect('halaman','refresh'); //halaman login	
				}	
			}
			else
			{
				$this->session->set_flashdata('pesan','Username dan Password Salah...');
				redirect('halaman','refresh');	
			}
				
		}	
	}
?>