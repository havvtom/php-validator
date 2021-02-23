<?php

namespace App\Validation;

use App\Validation\Errors\ErrorBag;
use App\Validation\Rules\Rule;

class Validator
{
	protected $rules;

	protected $data;

	protected $errors;

	public function __construct(array $data)
	{
		$this->data = $data;
		$this->errors = new ErrorBag();
	}

	public function setRules(array $rules)
	{
		$this->rules = $rules;
	}

	public function validate()
	{
		foreach($this->rules as $field=>$rules){
			foreach( $rules as $rule ){
				$this->validateRule($field, $rule);
			}
		}
	}

	protected function validateRule( $field, Rule $rule )
	{
		if(!$rule->passes($field, $this->getFieldValue($field, $this->data))){
			$this->errors->add($field, $rule->message($field));
		}
	}

	protected function getFieldValue( $field, $data )
	{
		return $data[$field] ?? null;
	}

	public function getErrors()
	{
		return $this->errors->getErrors();
	}
}