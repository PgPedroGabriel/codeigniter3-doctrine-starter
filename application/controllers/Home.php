<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {


	public function __construct() {
		parent::__construct();
		$this->path = "home/";
	}

	public function index()
	{

		// $user = new Entities\User();

		// $user->setName("Pedro Gabriel");
		// $user->setEmail("devpedrogabriel@gmail.com");
		// $user->setPassword(md5("123"));
		// $this->doctrine->em->persist($user);
		// $this->doctrine->em->flush();

		if(!$this->user)
		{
			$this->render('login');
		}
		else
		{
			$this->render('index');
		}
	}


	public function login()
	{

		$this->verifyPost();

		$email = $this->input->post('inputEmail');
		$password = $this->input->post('inputPassword');

		if($this->_login($email, $password))
		{
			$this->setMessage("Usuário antenticado com sucesso", "success");
		}
		else
		{
			$this->setMessage("Senha ou email incorretos, tente novamente", "danger text-center");
		}

		redirect();
	}
}
