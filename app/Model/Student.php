<?php
/**
 * Created by PhpStorm.
 * User: rrubio
 * Date: 12/11/14
 * Time: 11:12 AM
 */

class Student extends AppModel
{
	public $validate =  [
		'name'          => ['rule' => 'notEmpty'],
		'phone_number'  => [ 'rule' => 'notEmpty' ],
		'email'         => ['rule' => 'email']
	];
} 