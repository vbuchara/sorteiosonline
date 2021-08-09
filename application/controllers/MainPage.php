<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainPage extends CI_Controller {

	// MainPage Controller

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('header');

		$this->load->library('form_validation');

		$data['draw_number'] = $this->load->view('number_draw/draw_number', NULL, TRUE);

		$this->load->view('main_page', $data);
		$this->load->view('footer');
	}
}

