<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NamesDraw extends CI_Controller {

	// NamesDraw Controller

	public function index() {
		$this->load->helper('url');
		$this->load->view('header');

		$this->load->library('form_validation');

		$this->form_validation->set_rules('names', 'Nomes', 'callback_validate_list');

		$data = $this->input->post(array('numbers', 'names'));
		$data = $this->security->xss_clean($data);

		if($this->form_validation->run() == TRUE){
			$data['result'] = $this->draw_names($data['numbers'], $data['names']);
		}

		$data['draw_names'] = $this->load->view('names_draw/draw_names', $data, TRUE);
		
		$this->load->view('names_draw/result_page', $data);
		$this->load->view('footer');
	}

	// Function to draw the names
	public function draw_names($quantity, $names){
		$names = array_filter(explode(';', $names), function($name){
			return !is_null(trim($name)) && trim($name) !== '';
		});
		$lastNames = $names;

		$result = "";
		for($i = 0; $i < $quantity; $i++){
			if(count($lastNames) > 0){
				$pos = random_int(0, count($lastNames) - 1);
				$draw[$i] = $lastNames[$pos];

				array_splice($lastNames, $pos, 1);
			} else {
				$pos = random_int(0, count($names) - 1);
				$draw[$i] = $names[$pos];
			}

			if($i == 0){
				$result = "$draw[$i]";
			} else {
				$result = $result." - $draw[$i]";
			}
		}
		
		return $result;
	}

	// Validation Functions
	public function validate_list($names){
		if(strpos($names, ';')){
			return TRUE;
		} else {
			$this->form_validation->set_message('validate_list', 
			'A lista de nomes tem de conter mais de um nome. Separe-os por ";".');
			return FALSE;
		}
	}
}
