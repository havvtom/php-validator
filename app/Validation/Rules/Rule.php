<?php

namespace App\Validation\Rules;

abstract class Rule
{
	abstract public function passes($field, $value);

	abstract public function message($field);
} 