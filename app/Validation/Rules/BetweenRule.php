<?php

namespace App\Validation\Rules;

use App\Validation\Rules\Rule;

class BetweenRule extends Rule
{
	protected $lower ;

	protected $upper ;

	public function __construct($lower, $upper)
	{
		$this->lower = $lower;

		$this->upper = $upper;

	}

	public function passes($field, $value)
	{
		if(strlen($value) < $this->lower){
			return false;
		}

		if(strlen($value) > $this->upper){
			return false;
		}

		return true;
	}

	public function message($field)
	{
		return "{$field} must be between {$this->lower} and {$this->upper} characters.";
	}
}