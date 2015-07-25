<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $user = null;
	public $data = array();
	public $path = "";

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

	protected function _login($email = null, $pass = null){

		if(!empty($mat) || empty($pass))
		{
			return false;
		}

		$this->user = $this->doctrine->em->getRepository('Entities\User')->findOneBy(array('email' => $email, 'password' => md5($pass)));

		if(empty($this->user))
		{
			return false;
		}
		else
		{
			$this->session->set_userdata('user_id', $this->user->getId());

			return true;
		}
	}

	protected function render($view = false){

		$this->data['view'] = $this->path.$view;
		$this->data['user'] = $this->user;

		$message = $this->session->flashdata('message');
		$class = $this->session->flashdata('class');

		$this->data['message'] = ['message' => $message,  'class' => $class];

		$this->load->view('index', $this->data);

	}

	protected function setMessage($message = "Successo!", $class = "success")
	{
		$this->session->set_flashdata('message', $message);
		$this->session->set_flashdata('class', $class);

		return;
	}
	protected function verifyPost()
	{
		if($this->input->server('REQUEST_METHOD') != "POST")
			redirect();
	}
}
