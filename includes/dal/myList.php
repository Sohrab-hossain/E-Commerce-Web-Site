<?php

class myList extends base
{
	public $Id;
    public $CustomerId;
	public $ProductId;
	public $Date;
	public $Remarks;
	
	public function Insert()
	{
	    $sql = "insert into myList(customerId, productId, date, remarks) values(
		".$this->MS($this->CustomerId).",
		".$this->MS($this->ProductId).",
		'".$this->MS($this->Date)."',
		'".$this->MS($this->Remarks)."'
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
	    $sql = "update myList set
		customerId = ".$this->MS($this->CustomerId).",
		productId = ".$this->MS($this->ProductId).",
		date = '".$this->MS($this->Date)."',
		remarks = '".$this->MS($this->Remarks)."';
		where id = ".$this->MS($this->Id);
		
		if(mysqli_query($this->CN(), $sql))
		{
		    return true;
		}
		
		$this->Error = mysqli_error($this->CN());
		return false;
	
	}
	
	public function Delete()
	{
		$sql = "delete from myList where id = ".$this->MS($this->Id);
		if(mysqli_query($this->CN(), $sql))
		{
			return true;
		}
		$this->Error = mysqli_error($this->CN());
		return false;
	}
	
	public function SelectById()
	{
		$sql = "select customerId, productId, date, remarks from myList where id = ".$this->MS($this->Id);
		$table = mysqli_query($this->CN(), $sql);
		while($row = mysqli_fetch_assoc($table))
		{
		    $this->CustomerId = $row["customerId"];
			$this->ProductId =  $row["productId"];
			$this->Date = $row["date"];
			$this->Remarks = $row["remarks"];
			return true;
		}
		$this->Error = mysqli_error($this->CN());
		return false;
	}
	
	public function Select()
	{
		return $this->SelectBuild  ( "SELECT p.name as product, c.name as customer, ml.date, ml.remarks
				 from myList as ml
				 left join product as p on ml.productId = p.id
				 left join customer as c on ml.customerId = c.id
				 ");
		
	}



}

?>