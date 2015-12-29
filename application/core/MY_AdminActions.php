<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_AdminActions extends MY_Admin {

	public $user = null;
	public $data = array();
	public $path = "";

	public $entityRepository = null;
	public $uploadDirectory = null;

	public $rep;

	CONST LIMIT_ENTRIES = 30;

	public function __construct() {
		parent::__construct();
		$this->getUser();
	
		$this->entityRepository = "\Entities\\".get_class($this);
		$this->uploadDirectory = 'uploads/'.from_camel_case(get_class($this));
	
		$this->rep = $this->doctrine->em->getRepository($this->entityRepository);
	}

	public function index($page = 0)
	{
		$this->data['objects'] = $this->rep->getVisibleEntries($page, self::LIMIT_ENTRIES);
		$this->data['count']   = $this->rep->getCount();

		$this->render('index');
	}
}
