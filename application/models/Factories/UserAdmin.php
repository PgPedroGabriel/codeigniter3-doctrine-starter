<?php

namespace Factories;

use Doctrine\Common\Collections\ArrayCollection;

class UserAdmin extends BaseAdmin
{

	public function __construct($id = null)
	{
		parent::__construct($id);

		$name 	            = $this->CI->input->post('name')             or $this->throwAException('Nome Inválido', 101);
		$email 	            = $this->CI->input->post('email')            or $this->throwAException('Email Inválido', 102);
		$password 	        = $this->CI->input->post('password')         or $this->throwAException('Senha Inválido', 104);
		$password_confirm 	= $this->CI->input->post('password_confirm') or $this->throwAException('Confirmação de senha Inválida', 105);
		$bio                = $this->CI->input->post('bio');
		$status 	        = $this->CI->input->post('status');

		$checkUser = $this->em->getRepository($this->repository)->findOneBy(array('email' => $email));

		if(!empty($checkUser))
		{
			if($id == null || $checkUser->getId() != $id)
			{
				if($checkUser->isDeleted())
				{
					$this->em->remove($checkUser);
					$this->em->flush();
				}
				else
				{
					$this->throwAException("Email já cadastrado: ".$email, 108);
				}
			}
		}

		$this->object->setName($name)
					 ->setPicture($this->uploadImage("picture", "getPicture"))
					 ->setEmail($email)
					 ->setBio($bio)
					 ->setStatus(($status !== null) ? \Entities\BaseAdmin::ACTIVED : \Entities\BaseAdmin::INACTIVED);

		if($password == $password_confirm) {
			$this->object->setPassword($password);
		}
	}
}