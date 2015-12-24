<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Admin {

	public $path = 'main/';

	public function index()
	{
		if(!$this->user)
		{
			$this->render('login');
		}
		else
		{
			$this->render('dashboard');
		}
	}

	public function do_login()
	{
		if($this->user)
			$this->redirect();

		if(!$this->isPostRequest())
			$this->redirect();

		$email = $this->input->post('email');
		$pass = $this->input->post('pass');

		if(empty($email) || empty($pass))
		{
			$this->setMessage("Informe email e senha.", "danger", false);
			$this->redirect();
		}

		$this->login($email, $pass);
		$this->redirect();
	}

	public function do_logout()
	{
		$this->logout();

		$this->redirect();
	}

}
