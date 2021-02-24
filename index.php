<?php

use App\Validation\Validator;

require "vendor/autoload.php";

$validator = new Validator([
	'name' => 'Tom'	
]);

$validator->setRules([
	"name" => [
		'required',
		'between:5,10'
	]
]);


if(!$validator->validate()) {
	dump($validator->getErrors());
} else {
	dump('Passed');
}