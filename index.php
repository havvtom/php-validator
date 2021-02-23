<?php

use App\Validation\Rules\EmailRule;
use App\Validation\Rules\RequiredRule;
use App\Validation\Validator;

require "vendor/autoload.php";

$validator = new Validator([
	'name' => '',
	'email' => ''
]);

$validator->setRules([
	"name" => [
		new RequiredRule(),
	],
	"email" => [
		new RequiredRule(),
		new EmailRule()
	]
]);

// $validator->validate();

// dump($validator);
if(!$validator->validate()) {
	dump($validator->getErrors());
} else {
	dump('Passed');
}