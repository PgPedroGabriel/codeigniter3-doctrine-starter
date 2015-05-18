<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{

		$this->render('home');
	}


	public function login()
	{
		die("AE");

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('mat', 'Mat', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == false){
			
			$this->data['error'] = "Envio de formulário inválido";

			$this->render('home');
		
		} else {

			$mat = $this->input->post('mat');
			$password = $this->input->post('password');

			parent::login($mat, $password);

			if(empty($this->user))
				$this->data['error'] = "Usuário não encontrado";

			$this->render('home');
		}
	}
}
