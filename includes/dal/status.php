<?php

class status extends base
{
	public $Id;
	public $Name;
	public $Description;
	
	public function Insert()
	{
		$sql = "insert into status(name, description) values(
		'".$this->MS($this->Name)."', 
		'".$this->MS($this->Description)."'
		)";
		if(mysqli_query($this->CN(), $sql))
		{
			return true;
		}
		$this->Error = mysqli_error($this->CN());
		return false;
	}
	
	public function Update()
	{
		$sql = "update status set 
		name = '".$this->MS($this->Name)."'
		description = '".$this->MS($this->Description)."'
		where 
		id = ".$this->MS($this->Id);
		if(mysqli_query($this->CN(), $sql))
		{
			return true;
		}
		$this->Error = mysqli_error($this->CN());
		return false;
	}
	
	public function Delete()
	{
		$sql = "delete from status where id = ".$this->MS($this->Id);
		if(mysqli_query($this->CN(), $sql))
		{
			return true;
		}
		$this->Error = mysqli_error($this->CN());
		return false;
	}
	
	public function SelectById()
	{
		$sql = "select id, name, description from status where id = ".$this->MS($this->Id);
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
		return $this->SelectBuild("select id, name, description from status");
		
	}
	
	
}


?>