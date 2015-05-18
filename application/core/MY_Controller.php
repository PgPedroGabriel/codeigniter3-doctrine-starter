<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $user = null;
	public $data = array();

	public function __construct() {
		parent::__construct();
		$this->_getUser();
	}

	private function _getUser(){

		if($this->session->userdata('user_id')){

			$this->user = $this->doctrine->em->find('Entities\User', $this->session->userdata('user_id'));

			return;
		}

		return null;
	}

	protected function _logout(){
		$this->session->unset_userdata('user_id');
		$this->user = null;
		return;		
	}

	protected function _login($mat, $pass){

		$this->user = $this->doctrine->em->getRepository('Entities\User')->findOneBy(array('mat' => $mat, 'password' => $password));

		if(empty($user))
			return false;
		else {

			$this->session->set_userdata('user_id', $this->user->getId());

			return true;
		}
	}

	protected function render($view = false){

		$this->data['view'] = $view;
		$this->data['user'] = $this->user;

		$this->load->view('index', $this->data);

	}
}
