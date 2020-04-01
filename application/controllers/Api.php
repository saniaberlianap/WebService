<?php 
defined('BASEPATH') OR exit('NO Direct script access allowed');

/**
 * 
 */
class Api extends CI_Controller
{

	public function __construct()
		{
			parent::__construct();
			$this->load->model('api_model');
		}

		function index(){
			$data = $this->api_model->get_all();
			echo json_encode($data->result_array());
		}

		function get_by_id(){
			if ($this->input->post('id')) {
				$data = $this->api_model->get_by_id($this->input->post('id'));
				foreach ($data as $row) {
					$output['id_barang'] = $row["id_barang"];
					$output['nama'] = $row["nama"];
				}
				echo json_encode($output);
			}
		}	
}