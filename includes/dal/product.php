<?php

class product extends base
{
	public $Id;
	public $Name;
	public $Code;
	public $Tags;
	public $CategoryId;
	public $BrandId;
	public $UnitId;
	public $Price;
	public $Discount;
	public $Description;
	
	
	public function Insert()
	{
		return $this->QueryBuild("insert into product(name, code, tags, categoryId, brandId, unitId, price, discount, description) values(
			'".$this->MS($this->Name)."',
			'".$this->MS($this->Code)."',  
			'".$this->MS($this->Tags)."', 
			 ".$this->MS($this->CategoryId).", 
			 ".$this->MS($this->BrandId).", 
			 ".$this->MS($this->UnitId).",
			 ".$this->MS($this->Price).",
			 ".$this->MS($this->Discount).", 
			'".$this->MS($this->Description)."'
			)");
	}
	
	public function Update()
	{
		return $this->QueryBuild("update product set 
		name = '".$this->MS($this->Name)."',
		code = ".$this->MS($this->Code).",
		tags = '".$this->MS($this->Tags)."',
		categoryId =  ".$this->MS($this->CategoryId).",
		brandId = ".$this->MS($this->BrandId).",
		unitId = ".$this->MS($this->UnitId).",
		price = ".$this->MS($this->Price).",
		discount =  ".$this->MS($this->Discount).",
		description = '".$this->MS($this->Description)."' 
		 where id = ".$this->MS($this->Id));		
		}
	
	public function Delete()
	{
		return $this->QueryBuild("delete from product where id = ".$this->MS($this->Id));
	}
	
	public function SelectById()
	{
		$sql = "select name, code, tags, categoryId, brandId, unitId, price, discount, description from product where  id = ".$this->MS($this->Id);
		$table = mysqli_query($this->CN(), $sql);
		while($row = mysqli_fetch_assoc($table))
		{
			$this->Name = $row["name"];
			$this->Code = $row["code"];
			$this->Tags = $row["tags"];
			$this->CategoryId = $row["categoryId"];
			$this->BrandId = $row["brandId"];
			$this->UnitId = $row["unitId"];
			$this->Price = $row["price"];
			$this->Discount = $row["discount"];
			$this->Description = $row["description"];
			return true;
		}
		$this->Error = mysqli_error($this->CN());
		return false;
	}
	
	public function Select($sqlExtra = "")
	{
		return $this->SelectBuild("select p.id, p.name, p.code, p.tags, c.name as category, b.name as brand, u.name as unit, p.price, p.discount, p.description
		from product as p 
		left join category as c on p.categoryId = c.id
		left join brand as b on p.brandId = b.id
		left join unit as u on p.unitId = u.id ".$sqlExtra);
		
	}
	
	
}


?>