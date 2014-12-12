<?php

class StudentsController extends AppController
{
	public $helpers = array('Html', 'Form');

	public function add()
	{
		$formData = $this->request->data;
		parse_str($formData['form_data'], $formData);

		$this->Student->create();
		if ($this->Student->save($formData['data']))
		{
			$this->loadModel('Phone');
			$this->Phone->create();
			$this->Phone->save(['Phone' => ['id_student' => $this->Student->id, 'pnumber' => $formData['data']['Student']['phone_number']]]);
			echo(json_encode(['result' => 1, 'data' => ['id_student' => $this->Student->id, 'name' => $formData['data']['Student']['name']]]));
			exit();
		}

		echo(json_encode(['result' => 0, 'data' => []]));
		exit();
	}

	public function index()
	{
		$this->set('students', $this->Student->find('list', array('fields' => array('id_student', 'name'))));
		$this->set('urlAjaxRequestPhoneNumber', Router::url(['controller' => 'phones', 'action' => 'getPhoneByPersonId']));
		$this->set('urlAjaxRequestNewStudent', Router::url(['controller' => 'students', 'action' => 'add']));

	}


}