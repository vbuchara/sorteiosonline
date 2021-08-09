<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
	'protocol' => 'smtp', 
	'smtp_host' => 'smtp.example.com', 
	'smtp_port' => 465,
	'smtp_user' => 'no-reply@example.com',
	'smtp_pass' => 'pass',
	'smtp_crypto' => 'ssl', 
	'mailtype' => 'text', 
	'smtp_timeout' => '4', 
	'charset' => 'iso-8859-1',
	'wordwrap' => TRUE
);
