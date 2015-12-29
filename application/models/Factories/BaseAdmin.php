<?php

use \Doctrine\ORM\EntityManager;

namespace Factories;

class AdminException extends \Exception
{
	public function __construct($message = "Uma execeção foi lançada", $code = 100)
	{
		$this->message = $message;
		$this->code    = $code;
	}
}

abstract class BaseAdmin
{

	protected $object;
	protected $em;	
	protected $changes;
	protected $repository;
	protected $oldObject;
	protected $params;
	protected $CI;

	public function getObject(){
		return $this->object;
	}

	public function throwAException($message = "", $code = 100){

		throw new AdminException($message, $code);
	}

	public function getChanges()
	{
		return $this->changes;
	}

	public function setChanges()
	{

		$this->changes = array();

		$uow = $this->em->getUnitOfWork();
		$uow->computeChangeSets();
		$this->changes = $uow->getEntityChangeSet($this->object);
		
		return;
	}

	public function __construct($id = null)
	{

		$this->CI = & get_instance();
		$this->em = $this->CI->doctrine->em;
		
		$this->repository = $this->CI->entityRepository;

		if(!empty($id)){

			$obj = $this->em->find($this->repository, $id) or $this->throwAException("invalid Id", 100);

			if($this->isDuplicate()){
				
				$this->object = new $this->repository();
				$this->oldObject = $obj;

			} else {
				$this->object = $obj;
			}

		} else {

			$this->object = new $this->repository();
			
			if($this->CI->user)
				$this->object->setOwner($this->CI->user);
		}

		return;
	}

	public function isDuplicate()
	{
		return $this->CI->input->post('duplicate') == 'on';
	}

	public function uploadImage($field, $getMethod)
	{

		$imageName = $this->_uploadImage($field);
		$imageName = ($imageName === false) ? $this->object->{$getMethod}() : $imageName;

		if(empty($imageName)){

			if($this->isDuplicate())
			{
				$imageName = $this->oldObject->{$getMethod}();
			}
        }

        return $imageName;
	}

	private function _uploadImage($field)
	{

		$this->CI->load->library('upload');
		$this->CI->load->library('image_lib');

		if(!is_writable($this->CI->uploadDirectory) || !is_writable($this->CI->uploadDirectory.'small/'))
			die('Você precisa conceder permissões de escrita na pasta de uploads.');
		
		$config_upload['upload_path']   = $this->CI->uploadDirectory;
		$config_upload['allowed_types'] = 'png|gif|jpg|jpeg';
		$config_upload['encrypt_name']  = true;

		$this->CI->upload->initialize($config_upload);
		
		if ($this->CI->upload->do_upload($field)) {

			$data = $this->CI->upload->data();

			$sourceName = $this->CI->upload->file_name;
			$fullSourceName = $config_upload['upload_path'].$sourceName;

			if(!empty($title)) {

				$newName = urlTitle($title);

				while (file_exists($config_upload['upload_path'].$newName.$data['file_ext']))
					$newName = increment_string($newName);

				$newName       .= $data['file_ext'];
				$fullNewName    = $config_upload['upload_path'].$newName;

				rename($fullSourceName, $fullNewName);

			} else {

				$newName     = $this->CI->upload->file_name;
				$fullNewName = $config_upload['upload_path'].$newName;
			
			}
			
			// Configurações
			$config_image['source_image']   = $fullNewName;
			$config_image['maintain_ratio'] = false;
			
			// Original
			$config_image['width']  = $this->CI->imageWidth;
			$config_image['height'] = $this->CI->imageHeight;
			
			$this->CI->image_lib->initialize($config_image);
			$this->CI->image_lib->resize();

			// Thumb
			$config_image['width']     = $this->CI->imageThumbWidth;
			$config_image['height']    = $this->CI->imageThumbHeight;
			$config_image['new_image'] = $this->CI->uploadDirectory.'small/'.$newName;

			$this->CI->image_lib->initialize($config_image);
			$this->CI->image_lib->resize();

			$this->CI->image_lib->clear();
			 
			return $newName;

		} else {

			return false;
		
		}
	}

	public function save($flush = true)
	{

		$this->em->persist($this->object);
		
		if($flush)
			$this->em->flush();

		return;
	}
}
