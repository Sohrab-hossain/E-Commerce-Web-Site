<?php

class country extends base
{
	public $Id;
	public $Name;
	
	public function Insert()
	{
		return $this->QueryBuild("insert into country(name) values('".$this->MS($this->Name)."')");
		
	}
	
	public function Update()
	{
		return $this->QueryBuild("update country set name = '".$this->MS($this->Name)."' where id = ".$this->MS($this->Id));
	}
	
	public function Delete()
	{
		return $this->QueryBuild("delete from country where id = ".$this->MS($this->Id));
	}
	
	public function SelectById()
	{
		$sql = "select id, name from country where id = ".$this->MS($this->Id);
		$table = mysqli_query($this->CN(), $sql);
		while($row = mysqli_fetch_assoc($table))
		{
			$this->Name = $row["name"];
			return true;
		}
		$this->Error = mysqli_error($this->CN());
		return false;
	}
	
	public function Select()
	{
		return $this->SelectBuild("select id, name from country");
		
	}
	
	
}


?>