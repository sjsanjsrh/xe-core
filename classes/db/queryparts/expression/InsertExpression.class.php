<?php
/* Copyright (C) XEHub <https://www.xehub.io> */

/**
 * InsertExpression
 *
 * @author Arnia Software
 * @package /classes/db/queryparts/expression
 * @version 0.1
 */
class InsertExpression extends Expression
{

	/**
	 * argument
	 * @var object
	 */
	var $argument;

	/**
	 * constructor
	 * @param string $column_name
	 * @param object $argument
	 * @return void
	 */
	function __construct($column_name, $argument)
	{
		parent::__construct($column_name);
		$this->argument = $argument;
	}

	function getValue($with_values = true)
	{
		if($with_values)
		{
			return $this->argument->getValue();
		}
		return '?';
	}

	function show()
	{
		if(!$this->argument)
		{
			return false;
		}
		$value = $this->argument->getValue();
		if(!isset($value))
		{
			return false;
		}
		return true;
	}

	function getArgument()
	{
		return $this->argument;
	}

	function getArguments()
	{
		if($this->argument)
		{
			return array($this->argument);
		}
		else
		{
			return array();
		}
	}

}
/* End of file InsertExpression.class.php */
/* Location: ./classes/db/queryparts/expression/InsertExpression.class.php */
