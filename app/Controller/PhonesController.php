<?php

class PhonesController extends AppController
{
	public $helpers = array('Html', 'Form');

	public function index()
	{
		$this->set('phones', $this->Phone->find('all'));
	}

	public function getPhoneByPersonId($id = null)
	{
		$foundPhone = $this->Phone->find('first', [
			'conditions' => [
				'id_student' => $id
			]
		]);
		$this->set('number', $foundPhone);
		echo(json_encode($foundPhone));
		exit();
	}
}