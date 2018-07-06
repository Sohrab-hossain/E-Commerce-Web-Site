<?php

class paymentMethod extends base
{
	public $Id;
	public $Name;
	public $Charge;
	public $Description ;

	
	public function Insert()
	{
		 return $this->QueryBuild("insert into paymentMethod(name,charge,description) values(
			'".$this->MS($this->Name)."',
			 ".$this->MS($this->Charge).",
			'".$this->MS($this->Description)."'
		)");
			}
	
	public function Update()
	{
		return $this->QueryBuild("update paymentMethod set 
		name = '".$this->MS($this->Name)."' 
		charge = '".$this->MS($this->Charge)."' 
		description = '".$this->MS($this->Description)."' 

		where id = ".$this->MS($this->Id));
			}
	
	public function Delete()
	{
		return $this->QueryBuild("delete from paymentMethod where id = ".$this->MS($this->Id));
	}
	
	public function SelectById()
	{
		$sql = "select id, name, charge, description from paymentMethod where id = ".$this->MS($this->Id);
		$table = mysqli_query($this->CN(), $sql);
		while($row = mysqli_fetch_assoc($table))
		{
			$this->Name = $row["name"];
			$this->Charge = $row["charge"];
			$this->Description = $row["description"];
			return true;
		}
		$this->Error = mysqli_error($this->CN());
		return false;
	}
	
	public function Select()
	{
		return $this->SelectBuild("select id, name, charge, description from paymentMethod");
		
	}
	
	
}


?>