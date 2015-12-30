<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Admin extends CI_Controller {

	public $user = null;
	public $data = array();
	public $path = "";
	public $modules = array();
	public $module = null;

	public function __construct() {
		parent::__construct();
		$this->getUser();
		if(!$this->user && !$this instanceof Main)
		{
			redirect('admin-cms');
		}

		$this->modules = $this->doctrine->em->getRepository('Entities\Module')->getActiveEntries();
		$this->module = $this->doctrine->em->getRepository('Entities\Module')->findOneBy(['controller' => get_class($this)]);
/*
		if(!$this->module)
		{
			redirect('admin-cms');
		}
	*/
	}

	public function getUser(){

		if($this->session->userdata('admin_user_id')){

			$this->user = $this->doctrine->em->find('Entities\UserAdmin', $this->session->userdata('admin_user_id'));
			return;
		}

		return null;
	}

	protected function logout(){
		
		$this->session->unset_userdata('admin_user_id');
		$this->user = null;
		//$this->setMessage("Logout efetuado com sucesso.");
		return;
	}

	protected function login($email = null, $pass = null){

		$this->user = $this->doctrine->em->getRepository('Entities\UserAdmin')->findOneBy(['email' => $email]);

		if(empty($this->user))
		{
			$this->setMessage("Email incorreto. Porfavor verifique seu email e tente novamente.", "danger", false);
			return;
		}

		if(!$this->user->verifyPassword($pass))
		{
			$this->setMessage("Senha incorreta, porfavor verifique sua senha e tente novamente.", "danger", false);
			return;
		}

		if(!$this->user->isActive())
		{
			$this->setMessage("Usuário inativo, entre em contato com a administração do site.", "danger", false);
			return;
		}

		$this->session->set_userdata('admin_user_id', $this->user->getId());

		$this->setMessage("Login efetuado com sucesso.");
	}

	protected function render($view = false){

		$this->data['view'] = 'admin/'.$this->path.$view;
		$this->data['user'] = $this->user;

		$message = $this->session->flashdata('message');
		$class = $this->session->flashdata('class');
		$status = $this->session->flashdata('status');
		$subject = $this->session->flashdata('subject');

		$this->data['requestMessage'] = ['message' => $message,  'class' => $class, 'status' => $status, 'subject' => $subject];
		$this->data['adminBaseUrl'] = $this->adminBaseUrl();
		$this->data['baseUrl'] = base_url();

		$this->load->view('admin/index', $this->data);

	}

	protected function setMessage($message = "Successo!", $class = "success", $status = true)
	{
		if($class == "success")
		{
			$this->session->set_flashdata('subject', "Sucesso");
		}
		else if($class == "error")
		{
			$this->session->set_flashdata('subject', "Erro!");
		}
		else if($class == "info")
		{
			$this->session->set_flashdata('subject', "Informação");
		}

		$this->session->set_flashdata('message', $message);
		$this->session->set_flashdata('class', $class);
		$this->session->set_flashdata('status', $status);
		return;
	}
	protected function isPostRequest()
	{
		return $this->input->server('REQUEST_METHOD') == "POST";
	}

	protected function redirect($url = '')
	{
		redirect('admin-cms/'.$url);
	}

	protected function adminBaseUrl()
	{
		return base_url().'admin-cms/';
	}
}
