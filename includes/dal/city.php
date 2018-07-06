<?php

class city extends base
{
	public $Id;
	public $Name;
	public $CountryId;
	
	
	public function Insert()
	{
		return $this->QueryBuild("insert into city(name, countryId) values('".$this->MS($this->Name)."', ".$this->MS($this->CountryId).")");
	}
	
	public function Update()
	{
		return $this->QueryBuild("update city set 
		name = '".$this->MS($this->Name)."',
		countryId = ".$this->MS($this->CountryId)."
		where id = ".$this->MS($this->Id));
	}
	
	public function Delete()
	{
		return $this->QueryBuild("delete from city where id = ".$this->MS($this->Id));
	}
	
	public function SelectById()
	{
		$sql = "select id, name, countryId from city where id = ".$this->MS($this->Id);
		$table = mysqli_query($this->CN(), $sql);
		while($row = mysqli_fetch_assoc($table))
		{
			$this->Name = $row["name"];
			$this->CountryId =  $row["countryId"];
			return true;
		}
		$this->Error = mysqli_error($this->CN());
		return false;
	}
	
	public function Select()
	{
		return $this->SelectBuild("select ct.id, ct.name, cn.name as country from city as ct left join country as cn on ct.countryId = cn.id");
	}
	
	
}


?>