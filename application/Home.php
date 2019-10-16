<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$query = $this->db->select('*')
						  ->from('wisata_bogor') 
						  ->get()
						  ->result();
		// SELECT * FROM wisata_bogor WHERE jenis_wisata = 'alam' 
		// echo "<pre>";
		// print_r($query);
		// exit;		  	  
		$data['wisata_bogor'] = $query;
		$this->load->view('template/sidebar',$data);
	}

	function test_algoritma() {
		
	}
	
}