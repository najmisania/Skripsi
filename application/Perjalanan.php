<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perjalanan extends CI_Controller {
	public function index()
	{
		$query = $this->db->select('id, nama_wisata, jenis_wisata')
						  ->from('wisata_bogor') 
						  ->get()
						  ->result();
		// SELECT * FROM wisata_bogor WHERE jenis_wisata = 'alam' 
		// echo "<pre>";
		// print_r($query);
		// exit;		  	  
		$data['wisata_bogor'] = $query;
		// $alam = $this->db->get_where('wisata_bogor', ['jenis_wisata'='alam']);
		$this->load->view('perjalanan/index',$data);
	}
public function planing()
	{
		echo "<pre>";
		$menit = array();
		foreach ($_POST['menit'] as $key => $value) {
			if($value != "")
				$menit[] = $value;
		}
		// print_r();

		$date1=date_create($_POST['end_date']);
		$date2=date_create($_POST['start_date']);
		$diff=date_diff($date1,$date2);
		$lama_hari =  $diff->format("%a days");
		$start_time = new DateTime("2011-01-03 $_POST[start_time]".':00');
		$end_time   = new DateTime("2011-01-03 $_POST[end_time]".':00');
		$interval = $end_time->diff($start_time);
		$max_waktu = (int)$interval->format('%h');
		$location[] = $_POST['titik_awal'];
		foreach ($_POST['id_wisata'] as $key => $value) {
			$location[] = $value;
		}
		implode(",", $location);
		print_r($location);
	// $this->load->view('perjalanan/planing');
	}

	function simpan_perjalanan(){

		$post_data = array(
							'lokasi_awal' => $_POST['lokasi_awal'],
							'tanggal_awal' => $_POST['tanggal_awal'],
							'tanggal_akhir' => $_POST['tanggal_akhir'],
							'jam_awal' => $_POST['jam_awal'],
							'jam_akhir' => $_POST['jam_akhir'],
							'username' => $_POST['username']);
	   	$this->db->insert('plan_trip', $post_data);
   		$insert_id = $this->db->insert_id();

   		foreach ($_POST['day_id'] as $key => $value) {
   			$count_data = count($value['tujuan']);
   			for ($i=0; $i <= $count_data ; $i++) { 
   				if(isset($value['tujuan'][$i])) {
					$post_data = array(
								'plan_trip_id' => $insert_id,
								'day_id' => $key,
								'titik_awal' => $value['tujuan'][$i],
								'durasi_perjalanan' =>  $value['durasi_tujuan'][$i],
								'waktu_datang' =>  $value['waktu_tiba'][$i],
								'durasi_wisata' =>  $value['durasi_wisata'][$i],
								'waktu_selesai' =>$value['waktu_kedatangan'][$i]);
	   			$this->db->insert('rute_trip', $post_data);
	   			}
   			}
   		}
  //  				echo "<pre>";
		// print_r($_POST);
		// exit;
   		redirect('/perjalanan/yourplan','refresh');   		
	}


	function test_algo(){
	 	$menit = array();
		foreach ($_POST['menit'] as $key => $value) {
			if($value != "")
				$menit[] = $value;
		}
		$date1=date_create($_POST['end_date']);
		$date2=date_create($_POST['start_date']);
		$diff=date_diff($date1,$date2);
		$lama_hari =  (int)$diff->format("%a");
		$start_time = new DateTime("2011-01-03 $_POST[start_time]".':00');
		$end_time   = new DateTime("2011-01-03 $_POST[end_time]".':00');
		$waktu = $_POST['start_time'];
		$interval = $end_time->diff($start_time);
		$max_waktu = (int)$interval->format('%h') * 60;
		$lokasi_awal = $_POST['titik_awal'];
		$pilihan_rute[] = $_POST['titik_awal'];
		foreach ($_POST['id_wisata'] as $key => $value) {
			$pilihan_rute[] = $value;
		}
		$set_of_location =implode(",", $pilihan_rute);
		
	 	// print_r($set_of_location);
      $sql  = 'SELECT * FROM `router` where id_asal in ('.$set_of_location.') order by id_asal asc, waktu_tempuh desc';

      $queryMasterWisata  = 'SELECT id, nama_wisata, jam_open, jam_close FROM wisata_bogor';
      $titik_awal = '1';
      $master_data=array();
      $res_query = $this->db->query($sql)->result();
      $result_queryMasterWisata = $this->db->query($queryMasterWisata)->result();


      $masterWisata = array();
      foreach ($result_queryMasterWisata as $key => $value) {
        $masterWisata[$value->id] = $value;
      }
      // echo "<pre>";
      // print_r($masterWisata);
      // exit;
      foreach ($res_query as $key => $value) {
        if(in_array($value->id_asal, $pilihan_rute) && $value->waktu_tempuh != "0" && in_array($value->id_tujuan, $pilihan_rute) && $max_waktu>0) {
          $master_data[$value->id_asal]['nama_wisata'] = $masterWisata[$value->id_asal]->nama_wisata; 
          $master_data[$value->id_asal]['tujuan'][$value->id_tujuan]['waktu_tempuh'] = $value->waktu_tempuh; 
          $master_data[$value->id_asal]['tujuan'][$value->id_tujuan]['sisa_waktu'] = $max_waktu; 
          $master_data[$value->id_asal]['tujuan'][$value->id_tujuan]['nama_wisata'] = $masterWisata[$value->id_tujuan]->nama_wisata; 
          $master_data[$value->id_asal]['tujuan'][$value->id_tujuan]['jam_open'] = $masterWisata[$value->id_tujuan]->jam_open; 
          $master_data[$value->id_asal]['tujuan'][$value->id_tujuan]['jam_close'] = $masterWisata[$value->id_tujuan]->jam_close; 
          $master_data[$value->id_asal]['minimum'][] =  $value->id_tujuan;
        }
      }

      // echo "<pre>";
      // print_r($master_data);
      foreach ($master_data as $key => $value) {
      	foreach ($value['minimum'] as $key_node => $min_node) {
      		$waktu_mulai_dalam_detik = $this->hour_to_seconds($_POST['start_time']);
      		$jam_buka_dalam_detik = $this->hour_to_seconds(($master_data[$key]['tujuan'][$min_node]['jam_open']));
      		$waktu_tiba = $waktu_mulai_dalam_detik + ($master_data[$key]['tujuan'][$min_node]['waktu_tempuh']*60);
      		if($jam_buka_dalam_detik < $waktu_tiba){
      			// echo "detected $min_node";
      			$current_val = $min_node;
      			unset($master_data[$key]['minimum'][$key_node]);
      			$master_data[$key]['minimum'][] = $current_val;
      		}
      	}
      	# code...
      }
      // exit;


      $plan_trip = array();
      for ($i=0; $i <= $lama_hari ; $i++) { 
      	$plan_trip[$i]['sisa_waktu'] = $max_waktu;
      	$plan_trip[$i]['tujuan'] = array();
      }

      // echo "<pre>";
      // print_r($plan_trip);
      $duration_each_location = array();
      // print_r($_POST);
      $route_count = 0;
      foreach ($_POST['menit'] as $key => $value) {
      	if($value != "") {
      		$duration_each_location[$_POST['id_wisata'][$route_count]]['duration'] = $value;
      		$duration_each_location[$_POST['id_wisata'][$route_count]]['id_wisata'] = $_POST['id_wisata'][$route_count];
      		$route_count++;
      	}
      }
      // print_r($duration_each_location);
      $collections = array();
      $init_index_of_places = 0;
      $exceptions = array();
      $exceptions[] = $lokasi_awal;
      $secons_duration = $this->hour_to_seconds($waktu);
      $seconds_waktu_kedatangan=0;
      while ($lama_hari >= 0) {
      	if(count($master_data[$lokasi_awal]['minimum']) == 0 || !isset($plan_trip[$init_index_of_places]['sisa_waktu']))
      		break;

      	$minimum_index =  end($master_data[$lokasi_awal]['minimum']);
      	$exceptions[] = $minimum_index;
      	// echo "<br>min index = $minimum_index, et $init_index_of_places ";
      	$secons_duration += ($master_data[$lokasi_awal]['tujuan'][$minimum_index ]['waktu_tempuh'] * 60);
      	$seconds_waktu_kedatangan = $secons_duration;
      	
      	$secons_duration += ($duration_each_location[$minimum_index]['duration'] * 60);
      	$total_waktu_per_wisata = $master_data[$lokasi_awal]['tujuan'][$minimum_index ]['waktu_tempuh']+$duration_each_location[$minimum_index]['duration'];

      	// echo " Sisa wakti : $plan_trip[$init_index_of_places][sisa_waktu], lama : $master_data[$lokasi_awal]['tujuan'][$minimum_index ][waktu_tempuh]";
      	// echo $plan_trip[$init_index_of_places]['sisa_waktu']." vs ".$total_waktu_per_wisata;
      	if($plan_trip[$init_index_of_places]['sisa_waktu'] < $total_waktu_per_wisata){
      		$init_index_of_places++;
      		if( !isset($plan_trip[$init_index_of_places]['sisa_waktu']))
      			break;
      		$lama_hari--;
      		$secons_duration = $this->hour_to_seconds($waktu);
      		$seconds_waktu_kedatangan = $secons_duration + ($master_data[$lokasi_awal]['tujuan'][$minimum_index ]['waktu_tempuh'] * 60);
      		$secons_duration += ($master_data[$lokasi_awal]['tujuan'][$minimum_index ]['waktu_tempuh'] * 60);
      		$secons_duration += ($duration_each_location[$minimum_index]['duration'] * 60);
      		$waktu_berangkat = $seconds_waktu_kedatangan - ($master_data[$lokasi_awal]['tujuan'][$minimum_index ]['waktu_tempuh'] * 60);

      		$arrayName = array( 'awal' => $masterWisata[$_POST['titik_awal']]->nama_wisata,
      						'waktu_berangkat' => $this->convert_seconds($waktu_berangkat),
      						'waktu_tiba' => $this->convert_seconds($secons_duration),
      						'waktu_kedatangan' => $this->convert_seconds($seconds_waktu_kedatangan),
      						'durasi_wisata' => $duration_each_location[$minimum_index]['duration'],
      						'tujuan' =>  $master_data[$lokasi_awal]['tujuan'][$minimum_index]['nama_wisata'],
	  						'durasi_tujuan' => $master_data[$lokasi_awal]['tujuan'][$minimum_index ]['waktu_tempuh'],
	  						'jam_open' => $master_data[$lokasi_awal]['tujuan'][$minimum_index ]['jam_open'],
	  						'jam_close' => $master_data[$lokasi_awal]['tujuan'][$minimum_index ]['jam_close'],
	  						'id' => $minimum_index );	
      	}
      	else {

      		$waktu_berangkat = $seconds_waktu_kedatangan - ($master_data[$lokasi_awal]['tujuan'][$minimum_index ]['waktu_tempuh'] * 60);

      		$arrayName = array( 'awal' => $masterWisata[$lokasi_awal]->nama_wisata,
      						'waktu_berangkat' => $this->convert_seconds($waktu_berangkat),

      						'waktu_tiba' => $this->convert_seconds($secons_duration),
      						'waktu_kedatangan' => $this->convert_seconds($seconds_waktu_kedatangan),

      						'durasi_wisata' => $duration_each_location[$minimum_index]['duration'],
      						'tujuan' =>  $master_data[$lokasi_awal]['tujuan'][$minimum_index]['nama_wisata'],
	  						'durasi_tujuan' => $master_data[$lokasi_awal]['tujuan'][$minimum_index ]['waktu_tempuh'],
	  						'jam_open' => $master_data[$lokasi_awal]['tujuan'][$minimum_index ]['jam_open'],
	  						'jam_close' => $master_data[$lokasi_awal]['tujuan'][$minimum_index ]['jam_close'],
	  						'id' => $minimum_index );	

      	}

      	$plan_trip[$init_index_of_places]['tujuan'][]       	= $arrayName;
      	$plan_trip[$init_index_of_places]['sisa_waktu']   	-= $total_waktu_per_wisata;
      	$collections[] = $arrayName;
      	// $plan_trip[$init_index_of_places]['sisa_waktu']   	-= ($secons_duration / 60);
      	$lokasi_awal = $minimum_index ;
        foreach ($master_data[$lokasi_awal]['minimum'] as $key => $value) {
        	if(in_array($value, $exceptions))
        		unset($master_data[$lokasi_awal]['minimum'][$key]);
        }
      	// array_pop($master_data[$lokasi_awal]['minimum']);

      }
      	$data['plan'] = $plan_trip;
      	// echo "<pre>";

      	$new_plan_trip = array();
	    for ($i=0; $i <= $lama_hari ; $i++) { 
	      	$new_plan_trip[$i]['sisa_waktu'] = $max_waktu;
	      	$new_plan_trip[$i]['tujuan'] = array();
	    }

	    $exceptions = array();

	    // echo "<pre>";
	    // print_r($master_data);
	    // print_r($data);
	    // exit;
	    foreach ($data['plan'] as $key => $plan) {
	    	foreach ($plan['tujuan'] as $key2 => $place) {
	    		// print_r($place);
	    		$next_trip_bool = isset($data['plan'][$key]['tujuan'][$key2+1]);
	    		$data['plan'][$key]['tujuan'][$key2]['waktu_tiba'] = str_replace(" ", "", $data['plan'][$key]['tujuan'][$key2]['waktu_tiba']); 
	    		$data['plan'][$key]['tujuan'][$key2]['waktu_kedatangan'] = str_replace(" ", "", $data['plan'][$key]['tujuan'][$key2]['waktu_kedatangan']); 
	    		$current_trip = $data['plan'][$key]['tujuan'][$key2];

	    		if($next_trip_bool){
	    			$next_trip = $data['plan'][$key]['tujuan'][$key2+1];
	    			if($this->hour_to_seconds($current_trip['jam_open']) > $this->hour_to_seconds($current_trip['waktu_kedatangan'])) {
	    					// $next_trip_bool
	    					
	    					$exceptions['days'][$key]['place'][] = $place;

	    					$data['plan'][$key]['tujuan'][$key2+1]['waktu_berangkat'] = $data['plan'][$key]['tujuan'][$key2]['waktu_berangkat']; 
	    					$waktu_kedatangan = $this->hour_to_seconds($data['plan'][$key]['tujuan'][$key2]['waktu_berangkat']) + ($data['plan'][$key]['tujuan'][$key2]['durasi_tujuan'] * 60);
	    					$data['plan'][$key]['tujuan'][$key2+1]['waktu_kedatangan'] = $this->convert_seconds($waktu_kedatangan); 
	    					$waktu_selesai = $waktu_kedatangan + ($data['plan'][$key]['tujuan'][$key2]['durasi_wisata'] * 60);

	    					$data['plan'][$key]['tujuan'][$key2+1]['waktu_tiba'] = $this->convert_seconds($waktu_selesai); 

	    					$data['plan'][$key]['tujuan'][$key2]['waktu_berangkat'] = ''; 
	    					$data['plan'][$key]['tujuan'][$key2]['waktu_kedatangan'] = ''; 
	    					$data['plan'][$key]['tujuan'][$key2]['waktu_tiba'] = ''; 

					}
	    		}
	    		elseif($this->hour_to_seconds($current_trip['jam_open']) > $this->hour_to_seconds($current_trip['waktu_kedatangan'])) {
	    			$data['plan'][$key]['tujuan'][$key2]['waktu_berangkat'] = ''; 
	    					$data['plan'][$key]['tujuan'][$key2]['waktu_kedatangan'] = ''; 
	    					$data['plan'][$key]['tujuan'][$key2]['waktu_tiba'] = '';
	    		}

				$exceptions['days'][$key]['waktu_akhir'] =  $data['plan'][$key]['tujuan'][$key2]['waktu_tiba'];
				$exceptions['days'][$key]['batas_waktu'] =  $_POST['end_time'];
				$exceptions['days'][$key]['sisa_menit']  =  ($this->hour_to_seconds($_POST['end_time']) - $this->hour_to_seconds( $exceptions['days'][$key]['batas_waktu'] )) / 60;




	    	}
	    	# code...
	    }
	    // echo "<pre>";
	    // print_r($exceptions);
	    foreach ($data['plan'] as $key => $value) {
	    	$n_data = count($value['tujuan']);
	    	// $last_destination_data = $data['plan'][$key]['tujuan'][$n_data-1];
	    	// if($exceptions['days'][$key]['sisa_menit'] >= $last_destination_data['durasi_wisata'])
	    	// 	$data['plan'][$key]['tujuan'][$last_destination_data['id']] = $last_destination_data;
	    	foreach ($value['tujuan'] as $key2 => $tujuan) {
	    		// print_r($tujuan);
	    		// if($tujuan['waktu_berangkat'] == "" )
	    			
	    			// $data['plan'][$key]['tujuan'][$tujuan['id']] = $tujuan;
	    		# code...
	    	}
	    }
	    // print_r($data);
	    // print_r($data);
	    // print_r($master_data);
      	// exit;
		$this->load->view('perjalanan/planing', $data);
		// echo $this->convert_seconds(200000);

    }

        function hour_to_seconds($hours){
    	$time = explode(":", $hours);
    	return ( ( (int)$time[0] * 60) + (int)$time[1] ) * 60;
    }

    function convert_seconds($seconds) 
	 {
	  $dt1 = new DateTime("@0");
	  $dt2 = new DateTime("@$seconds");
	  return $dt1->diff($dt2)->format('%H:%I');
	  }


	  function yourplan()
	  {
	  	

        $sql = "SELECT p.*, w.nama_wisata FROM plan_trip p, wisata_bogor w where p.lokasi_awal = w.id AND p.username='$_SESSION[email]' ";
        $query = $this->db->query($sql)->result_array();
        // echo "<pre>";
        // print_r($query);
        // exit;
		$data['plan'] = $query;				  
   		$this->load->view('perjalanan/yourplan', $data);
	  }

	  function detail_rute($plan_trip_id){

	  	$query = $this->db->select('*')
						  ->from('rute_trip') 
						  ->where('plan_trip_id', $plan_trip_id) 
						  ->get()->result_array();


		$rute_step = array();
		foreach ($query as $key => $value) {
			$rute_step[$value['day_id']][]= $value;
		}
		$data['plan'] = $rute_step;
   		$this->load->view('perjalanan/detail_rute', $data);

	  }
	public function delete($plan_trip_id)
	{
		
        $this->db->where('plan_trip_id',$plan_trip_id)->delete('rute_trip');
        $this->db->where('id',$plan_trip_id)->delete('plan_trip');
        redirect('perjalanan/yourplan','refresh');
	}
}