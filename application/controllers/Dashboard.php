<?php
	class Dashboard extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('validasi');
			$this->validasi->validasiakun();
		}
		
		
		function admin()
		{
			$this->load->view('admin_view');	
		}
		
		function logout()
		{
			$this->session->sess_destroy();
			redirect('halaman','refresh');	
		}	
	}
?>