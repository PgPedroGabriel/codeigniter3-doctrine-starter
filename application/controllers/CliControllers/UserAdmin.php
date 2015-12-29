<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAdmin extends CI_Controller {

	public $entityRepository;

	public $user = null;
	public $uploadDirectory = 'uploads/user_admin/';

	public function __construct()
	{
		parent::__construct();
		if(!is_cli())
		{
			die('invalid request');
		}

		$this->entityRepository = "\Entities\\".get_class();
	}

	public function import()
	{
		echo "Creating user 1".PHP_EOL;

		$_POST["name"] = "Pedro Gabriel";
		$_POST["email"] = "devpedrogabriel@gmail.com";
		$_POST["password"] = "123";
		$_POST["password_confirm"] = "123";
		$_POST["status"] = Entities\BaseAdmin::ACTIVED;
		$_POST['bio'] = "PROGRAMADOR";

		try {

			$factory = new Factories\UserAdmin();
			$factory->save();
			
			echo "Created user 1".PHP_EOL;
		} 
		catch(Exception $e)
		{
			echo "Error at creating User 1. ". $e->getMessage().PHP_EOL;			
		}

		echo "Creating user 2".PHP_EOL;

		$_POST["name"] = "Pedro Gabriel";
		$_POST["email"] = "pedrogabriel.17@hotmail.com";
		$_POST["password"] = "123";
		$_POST["password_confirm"] = "123";
		$_POST["status"] = Entities\BaseAdmin::ACTIVED;
		$_POST['bio'] = "TESTER";

		try {

			$factory = new Factories\UserAdmin();
			$factory->save();
			
			echo "Created user 2".PHP_EOL;
		} 
		catch(Exception $e)
		{
			echo "Error at creating User 2. ".$e->getMessage().PHP_EOL;			
		}

	}

	public function edit($id, $name, $email, $password, $status, $bio)
	{

		echo "Editing user: ".$id.PHP_EOL;

		$_POST["name"] = $name;
		$_POST["email"] = $email;
		$_POST["password"] = $password;
		$_POST["password_confirm"] = $password;
		$_POST["status"] = $status;
		$_POST['bio'] = $bio;

		try {

			$factory = new Factories\UserAdmin($id);
			$factory->save();
			
			echo "Edited user {$id} ".PHP_EOL;
		} 
		catch(Exception $e)
		{
			echo "Error at edting User {$id}. ".$e->getMessage().PHP_EOL;			
		}
	}

	public function add($name, $email, $password, $status, $bio)
	{

		echo "Adding new user ".PHP_EOL;

		$_POST["name"] = $name;
		$_POST["email"] = $email;
		$_POST["password"] = $password;
		$_POST["password_confirm"] = $password;
		$_POST["status"] = $status;
		$_POST['bio'] = $bio;

		try {

			$factory = new Factories\UserAdmin();
			$factory->save();
			
			echo "New user added ".PHP_EOL;
		} 
		catch(Exception $e)
		{
			echo "Error at adding User. ".$e->getMessage().PHP_EOL;			
		}
	}
}
