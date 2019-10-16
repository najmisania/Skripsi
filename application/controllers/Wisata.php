<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {
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
		// $alam = $this->db->get_where('wisata_bogor', ['jenis_wisata'='alam']);
		$this->load->view('template/sidebar',$data);
	}
public function buatan()
	{
		$query = $this->db->select('*')
						  ->from('wisata_bogor') 
						  ->get()
						  ->result();		  	  
		$data['wisata_bogor'] = $query;
		
		$this->load->view('wisata/buatan',$data);
	}
public function budaya()
	{
		$query = $this->db->select('*')
						  ->from('wisata_bogor') 
						  ->get()
						  ->result();		  	  
		$data['wisata_bogor'] = $query;
		
		$this->load->view('wisata/budaya',$data);
	}
}