<?php

namespace App\Validation\Rules;

use App\Validation\Rules\Rule;

class MaxRule extends Rule
{
	protected $max;

	public function __construct($max)
	{
		$this->max = $max;
	}

	public function passes($field, $value)
	{
		return strlen($value) < $this->max;
	}

	public function message($field)
	{
		return "{$field} must be a maximum of {$this->max} characters.";
	}
}