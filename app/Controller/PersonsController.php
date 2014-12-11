<?php

class PersonsController extends AppController
{
	public $helpers = array('Html', 'Form');

	public function index() {
		$this->set('persons', $this->Person->find('all'));
	}
}