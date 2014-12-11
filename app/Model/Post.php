<?php
class Post extends AppModel
{
	public $validate = [
		'title' => [
			'rule' => 'notEmpty'
		],
		'body' => [
			'rule' => 'notEmpty'
		]
	];
}