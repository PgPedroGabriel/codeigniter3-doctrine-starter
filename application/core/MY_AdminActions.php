<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_AdminActions extends MY_Admin {

	public $user = null;
	public $data = array();
	public $path = "";

	public $entityRepository = null;
	public $uploadDirectory = null;

	public $rep;

	public $limitEntries = 30;

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
}
