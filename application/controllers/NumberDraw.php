<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NumberDraw extends CI_Controller {

	// NumberDraw Controller

	public function index() {
		$this->load->helper('url');
		$this->load->view('header');

		$this->load->library('form_validation');
		
		$data = $this->input->post(array('numbers', 'minimun', 'maximun'));
		$data = $this->security->xss_clean($data);

		$this->form_validation->set_rules('minimun', 'Minimo', 
		"callback_check_minimun_value[".$data['maximun']."]");
		
		if($this->form_validation->run() == TRUE){
			$data['result'] = $this->draw_numbers($data['numbers'], $data['minimun'], $data['maximun']);
		} elseif($data['minimun']){
			$data['minimun'] = $data['maximun'] - 1;
			if($data['maximun'] == 1){
				$data['maximun'] = 2;
			}
		}
		
		$data['draw_number'] = $this->load->view('number_draw/draw_number', $data, TRUE);


		$this->load->view('number_draw/result_page', $data);
		$this->load->view('footer');
	}


	// Function to draw the numbers
	private function draw_numbers($quantity, $minimun, $maximum){
		$result = "";
		for($i = 0; $i < $quantity; $i++){
			$draw[$i] = random_int($minimun, $maximum);

			if($i == 0){
				$result = "$draw[$i]";
			} else {
				$result = $result." - $draw[$i]";
			}
		}
		
		return $result;
	}

	// Validation Functions
	public function check_minimun_value($min, $max){
		if($max > $min){
			return TRUE;
		} else{
			$this->form_validation->set_message('check_minimun_value', 
				'Valor minimo tem de ser menor que o valor maximo.');
			return FALSE;
		}
	}
}
