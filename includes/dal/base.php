<?php

class base
{
	public $Error;
	public $Connection;
	
	public function CN()
	{
		$this->Connection = mysqli_connect("localhost", "root", "", "dbecommerceusi"); 
		return $this->Connection;
	}
	
	function __construct()
	{
		$this->CN = mysqli_connect("localhost", "root", "", "dbecommerceusi");
	}
	
	public function MS($value)
	{
		return mysqli_real_escape_string($this->CN(), $value);
	}
	
	protected function QueryBuild($sql)
	{
		if(mysqli_query($this->CN(), $sql))
		{
			return true;
		}
		$this->Error = mysqli_error($this->Connection);
		return false;
	}
	
	protected function QueryBuildReturnId($sql)
	{
		if(mysqli_query($this->CN(), $sql))
		{
			$this->Id = mysqli_insert_id($this->Connection);
			return true;
		}
		$this->Error = mysqli_error($this->Connection);
		return false;
	}
	
	protected function SelectBuild($sql)
	{
		$a = array();
		$table = mysqli_query($this->CN(), $sql);
		while($row = mysqli_fetch_array($table))
		{
			$a[] = $row;
		}
		return $a;
	}
	
}

?>