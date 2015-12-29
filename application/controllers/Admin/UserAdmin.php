<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAdmin extends MY_AdminActions {

	public $path = 'user/';

	public function __construct()
	{
		parent::__construct();
	}
}
