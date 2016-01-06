<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_AdminActions extends MY_Admin {

	public $user = null;
	public $data = array();
	public $path = "";

	public $entityRepository = null;
	public $uploadDirectory = null;

	public $rep;

	public $limitEntries = 1;

	public $object = null;

	public $successSave = null;
	public $errorMessage =  null;

	public function __construct() {
		parent::__construct();
		$this->getUser();
	
		$this->entityRepository = "\Entities\\".get_class($this);
		$this->uploadDirectory = 'uploads/'.from_camel_case(get_class($this));
	
		$this->rep = $this->doctrine->em->getRepository($this->entityRepository);
	}

	public function index($page = 1)
	{
		$this->data['count']   = $this->rep->getCount();
		$this->data['pages'] = ceil($this->data['count'] / $this->limitEntries);

		if($page == 0)
			$page = 1;

		$this->data['page'] = $page;

		$offset = ($page == 1) ? 0 : (($page - 1) * $this->limitEntries);

		$this->data['objects'] = $this->rep->getVisibleEntries($offset, $this->limitEntries);
		$this->render('index');
	}

	public function update_status()
	{
		if(!$this->input->is_ajax_request())
		{
			die("invalid request");
		}

		$id = $this->input->post('id');

		$this->setObject($id);

		if(!$this->object)
		{
			$this->errorJson("Registro não encontrado, tente com outro.", 102);
		}

		$this->object->switchStatus();
		$this->saveObject();

		if($this->successSave)
		{
			$this->successJson("Alteração concluída com sucesso.", ['html' => $this->object->getStatusHtml() ]);
		}
		else
		{
			$this->errorJson("Não conseguiu salvar o registro.", 103);
		}
	}

	public function search($page = 1)
	{
		$criteria = $this->input->get('q');

		if($page == 0)
			$page = 1;

		$this->data['page'] = $page;

		$offset = ($page == 1) ? 0 : (($page - 1) * $this->limitEntries);

		$result = $this->rep->searchInAllColumns($criteria, true, $offset, $this->limitEntries);
		
		$this->data['count']   = $result['count'];
		$this->data['objects'] = $result['objects']; 
		$this->data['pages'] = ceil($this->data['count'] / $this->limitEntries);
		$this->data['criteria'] = $criteria;
		
		$this->data['action'] = 'search';

		$this->render('index');
	}

	public function setObject($id)
	{
		$this->object = $this->doctrine->em->find($this->entityRepository, $id);
	}

	public function saveObject()
	{
		try 
		{
			$this->doctrine->em->persist($this->object);
			$this->doctrine->em->flush();

			$this->successSave = true;
		} 
		catch (Exception $e)
		{
			$this->successSave = false;
			$this->errorMessageSave = $e->getMessage();
		}
	}
}
