<?php
	class Mcaricombo extends CI_Model
	{
		function combopelanggan($namafield)
		{
			$sql="select * from tb_pelanggan";
			$query=$this->db->query($sql);

			$data[""]="Pilih";
			$no=1;
			foreach ($query->result() as $row )
			{
				$data[$row->idPelanggan]=$no.") ".$row->namaPelanggan;
				$no++;
			}
			echo form_dropdown($namafield,$data,"","class='form-control' id='".$namafield."'");

		}

        function combojenislayanan($namafield)
		{
			$sql="select * from tb_jenislayanan";
			$query=$this->db->query($sql);

			$data[""]="Pilih";
			$no=1;
			foreach ($query->result() as $row )
			{
				$data[$row->idJenisLayanan]=$no.") ".$row->namalayanan;
				$no++;
			}
			echo form_dropdown($namafield,$data,"","class='form-control' id='".$namafield."'");

		}
		
		function combologin($namafield)
		{
			$sql="select * from tb_login";
			$query=$this->db->query($sql);

			$data[""]="Pilih";
			$no=1;
			foreach ($query->result() as $row )
			{
				$data[$row->KodeLogin]=$no.") ".$row->NamaLengkap;
				$no++;
			}
			echo form_dropdown($namafield,$data,"","class='form-control' id='".$namafield."'");

		}
		
		function combotransaksi($namafield)
		{
			$sql="select * from tb_transaksi order by idPelanggan. idJenisLayanan";
			$query=$this->db->query($sql);

			$data[""]="Pilih";
			$no=1;
			foreach ($query->result() as $row )
			{
				$data[$row->idTransaksi]=$no.") ".$row->idPelanggan;
				$no++;
			}
			echo form_dropdown($namafield,$data,"","class='form-control' id='".$namafield."'");

		}
	}
?>