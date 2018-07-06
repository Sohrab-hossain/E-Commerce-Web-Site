<?php

class brand extends base
{
	public $Id;
	public $Name;
	public $Description;
	
	public function Insert()
	{
		return $this->QueryBuild("insert into brand(name, description) values(
		'".$this->MS($this->Name)."', 
		'".$this->MS($this->Description)."')");
	}
	
	public function Update()
	{
		return $this->QueryBuild("update brand set 
		name = '".$this->MS($this->Name)."'
		description = '".$this->MS($this->Description)."'
		where 
		id = ".$this->MS($this->Id));
	}
	
	public function Delete()
	{
		return $this->QueryBuild("delete from brand where id = ".$this->MS($this->Id));
	}
	
	public function SelectById()
	{
		$sql = "select id, name, description from brand where id = ".$this->MS($this->Id);
		$table = mysqli_query($this->CN(), $sql);
		while($row = mysqli_fetch_assoc($table))
		{
			$this->Name = $row["name"];
			$this->Description = $row["description"];
			return true;
		}
		$this->Error = mysqli_error($this->CN());
		return false;
	}
	
	public function Select()
	{
		return $this->SelectBuild("select id, name, description from brand");
	}
	
	}
?>