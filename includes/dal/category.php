<?php

class category extends base
{
	public $Id;
	public $Name;
	public $CategoryId;
	public $Description;
	
	public function Insert()
	{
		return $this->QueryBuild("insert into category(name, categoryId, description) values('".$this->MS($this->Name)."', ".$this->MS($this->CategoryId).", '".$this->MS($this->Description)."')");
	}
	
	public function Update()
	{
		return $this->QueryBuild("update category set 
		name = '".$this->MS($this->Name)."',
		categoryId = ".$this->MS($this->CategoryId).",
		description = '".$this->MS($this->Description)."'
		where id = ".$this->MS($this->Id));
	}
	
	public function Delete()
	{
		return $this->QueryBuild("delete from category where id = ".$this->MS($this->Id));
	}
	
	public function SelectById()
	{
		$sql = "select id, name, categoryId, description from category where id = ".$this->MS($this->Id);
		$table = mysqli_query($this->CN(), $sql);
		while($row = mysqli_fetch_assoc($table))
		{
			$this->Name = $row["name"];
			$this->CategoryId = $row["categoryId"];
			$this->Description = $row["description"];
			return true;
		}
		$this->Error = mysqli_error($this->CN());
		return false;
	}
	
	public function Select($sqlExtra = "")
	{
		return $this->SelectBuild("select c1.id, c1.name, c2.name as category, c1.description from category as c1 left join category as c2 on c1.categoryId = c2.id " .$sqlExtra);
	}
	
	
}


?>