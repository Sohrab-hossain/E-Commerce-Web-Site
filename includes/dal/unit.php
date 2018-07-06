<?php

class unit extends base
{
	public $Id;
	public $Name;
	public $Description;
	public $PrimaryQuantity;
	
	public function Insert()
	{
		return $this->QueryBuild("insert into unit(name, description, primaryQuantity) values(
		'".$this->MS($this->Name)."', 
		'".$this->MS($this->Description)."',
		".$this->MS($this->PrimaryQuantity).")");
	}
	
	public function Update()
	{
		return $this->QueryBuild("update unit set 
		name = '".$this->MS($this->Name)."'
		description = '".$this->MS($this->Description)."'
		primaryQuantity = ".$this->MS($this->PrimaryQuantity)."
		where 
		id = ".$this->MS($this->Id));
	}
	
	public function Delete()
	{
		return $this->QueryBuild("delete from unit where id = ".$this->MS($this->Id));
	}
	
	public function SelectById()
	{
		$sql = "select id, name, description, primaryQuantity from unit where id = ".$this->MS($this->Id);
		$table = mysqli_query($this->CN(), $sql);
		while($row = mysqli_fetch_assoc($table))
		{
			$this->Name = $row["name"];
			$this->Description = $row["description"];
			$this->PrimaryQuantity = $row["primaryQuantity"];
			return true;
		}
		$this->Error = mysqli_error($this->CN());
		return false;
	}
	
	public function Select()
	{
		return $this->SelectBuild("select id, name, description, primaryQuantity from unit");
		
	}
	
	
}


?>