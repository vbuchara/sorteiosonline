<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SecretSantaDraw extends CI_Controller {

	public function index(){
		$this->load->helper('url');
		$this->load->view('header');

		$this->load->library('form_validation');
		$this->load->library('email'); 

		$this->form_validation->set_rules('name[]', 'Nome', 'callback_check_participantes');

		$data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');

		if($this->form_validation->run() == TRUE){
			$data['result'] = $this->draw_secret_santa($data['name'], $data['email']);
		} 

		$data['draw_secret_santa'] = $this->load->view('secret_santa_draw/draw_secret_santa', $data, TRUE);

		$this->load->view('secret_santa_draw/result_page', $data);
		$this->load->view('footer');
	}

	public function draw_secret_santa($participants, $emails) {
		$participants = array_values(array_filter($participants, function($participant){
			return !is_null(trim($participant)) && trim($participant) !== '';
		}));
		$emails = array_values(array_filter($emails, function($email){
			return !is_null(trim($email)) && trim($email) !== '';
		}));

		do{
			$reshuffle = FALSE;
			$lastparticipants = $participants;
			$lastemails = $emails;
			$result = array();

			foreach ($participants as $key => $participant) {
				if(count($lastparticipants) > 1){
					$pos = random_int(0, count($lastparticipants) - 1);
				} else {
					$pos = 0;
				}
				
				if($participant == $lastparticipants[$pos]){
					$reshuffle = TRUE;
					break;
				}

				$result[] = array($participant, $lastparticipants[$pos], $lastemails[$key]);
				array_splice($lastparticipants, $pos, 1);
				$reshuffle = FALSE;
			}
		}while($reshuffle);

		// Foreach to send the emails (Currently not implemented)
		foreach($result as $r){
			// $this->email->from('email@exemplo.com', 'SorteiosOnline');
			// $this->email->to("$r[2]");

			// $this->email->subject('SorteioOnline: Amigo Secreto');
			// $this->email->message("$r[0]. Seu amigo secreto é: $r[1]");
			// $this->email->send();
		}

		return TRUE;
	}

	public function check_participantes(){
		$names = $this->input->post('name');
		$emails = $this->input->post('email');
		$total = 0;

		foreach($names as $key => $n){
			if(!empty($n)){
				$total++;
				if(!filter_var($emails[$key], FILTER_VALIDATE_EMAIL)){
					$this->form_validation->set_message('check_participantes', 'Email Error');
					return FALSE;
				}
			}
		}

		if($total >= 2){
			return TRUE;
		} else{
			return FALSE;
		}
	}
}
