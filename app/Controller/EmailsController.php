<?php

class EmailsController extends AppController
{
	public $helpers = array('Html', 'Form');

	public function getEmailByPersonIdold($id = null)
	{
		$foundEmail = $this->Email->find('first', [
			'conditions' => [
				'id_student' => $id
			]
		]);
//		$this->set('number', $foundPhone);
		echo(json_encode($foundEmail));
		exit();
	}

	public function getEmailByPersonId($id = null)
	{
		$params = [
			'fields' => array('id_student', 'email'),
			//'fields' => array('Post.title', ),
			'conditions' => array('id_student' => $id),
			//'conditions' => array('hoge' => array('$gt' => '10', '$lt' => '34')),
			//'order' => array('title' => 1, 'body' => 1),
			'order' => array('_id' => -1),
			'limit' => 35,
			'page' => 1,
		];
		$foundEmail = $this->Email->find('all', $params);
		echo(json_encode($foundEmail[0]));
		exit();
	}
}