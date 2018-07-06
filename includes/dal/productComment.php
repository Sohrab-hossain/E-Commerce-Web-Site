<?php

class productComment extends base
{
	public $ProductId;
    public $UserId;
	public $DateTime;
	
	public function Insert()
	{
		return $this->QueryBuild("insert into productLike(productId, userId, dateTime) values(".$this->MS($this->ProductId).",
				".$this->MS($this->UserId).",
               '".$this->MS($this->DateTime)."')");
	}
        
    public function Update()
	{
		return $this->QueryBuild("update productLike set 
		productId = ".$this->MS($this->ProductId).",
		userId = ".$this->MS($this->UserId).",
		dateTime = '".$this->MS($this->DateTime)."'
		where productId = ".$this->MS($this->ProductId)." and userId = ".$this->MS($this->UserId));
	}
	
	public function Delete()
	{
		return $this->QueryBuild("delete from productLike where productId = ".$this->MS($this->ProductId)." and userId = ".$this->MS($this->UserId));
	}
	
	public function SelectById()
	{
		$sql = "select id, productId, userId, dateTime from productLike where productId = ".$this->MS($this->ProductId)." and userId = ".$this->MS($this->UserId);
		$table = mysqli_query($this->CN(), $sql);
		while($row = mysqli_fetch_assoc($table))
		{
			
			$this->ProductId =  $row["productId"];
			$this->UserId = $row["userId"];
            $this->DateTime = $row["dateTime"];
			return true;
		}
		$this->Error = mysqli_error($this->Connection);
		return false;
	}
	
	public function Select()
	{
		return $this->SelectBuild("select pl.productId, pl.userId, p.name as product, u.name as user, pl.dateTime from productLike as pl
        left join product as p on pl.productId = p.id
		left join users as u on pl.userId = u.id");
	
	}
	
	
}


?>