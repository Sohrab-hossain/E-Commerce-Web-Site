<?php

class productImage extends base
{
	public $Id;
	public $ProductId;
    public $DateTime;
    public $Image;
    public $Title;
	
	public function Insert()
	{
		return $this->QueryBuildReturnId("insert into productImage(productId, dateTime, image, title) values(".$this->MS($this->ProductId).",
               '".$this->MS($this->DateTime)."', 
			   '".$this->MS($this->Image['name'])."', 
			   '".$this->MS($this->Title)."')");
	}
        
    public function Update()
	{
		return $this->QueryBuild("update productImage set 
		productId = ".$this->MS($this->ProductId).",
		dateTime = '".$this->MS($this->DateTime)."',
        image = '".$this->MS($this->Image)."',
		title = '".$this->MS($this->Title)."'
		where id = ".$this->MS($this->Id));
	}
	
	public function Delete()
	{
		return $this->QueryBuild("delete from productImage where id = ".$this->MS($this->Id));
	}
	
	public function SelectById()
	{
		$sql = "select id, productId, dateTime, image, title from productImage where id = ".$this->MS($this->Id);
		$table = mysqli_query($this->CN(), $sql);
		while($row = mysqli_fetch_assoc($table))
		{
			
			$this->ProductId =  $row["productId"];
            $this->DateTime = $row["dateTime"];
            $this->Image = $row["image"];
            $this->Title = $row["title"];
			return true;
		}
		$this->Error = mysqli_error($this->CN());
		return false;
	}
	
	public function Select($sqlExtra = "")
	{
		return $this->SelectBuild("select pi.id, p.name as product, pi.image, pi.dateTime, pi.title from productImage as pi
        left join product as p on pi.productId = p.id ".$sqlExtra);
		
	}
	
	
}


?>