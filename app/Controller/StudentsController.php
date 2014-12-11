<?php

class StudentsController extends AppController
{
	public $helpers = array('Html', 'Form');

	public function index()
	{
		$this->set('students', $this->Student->find('list', array('fields' => array('id_student', 'name'))));
		$this->set('urlAjaxRequestPhoneNumber', Router::url(['controller' => 'phones', 'action' => 'getPhoneByPersonId']));

	}


}