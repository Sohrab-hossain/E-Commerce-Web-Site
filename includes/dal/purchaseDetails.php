<?php

class purchaseDetails extends base
{
	public $Id;
	public $PurchaseId;
	public $ProductId;
	public $Rate;
	public $Qty;
	
	
	public function Insert()
	{
		return $this->QueryBuild("insert into purchasedetails(purchaseId, productId, rate, qty) values(
		".$this->MS($this->PurchaseId).",
		".$this->MS($this->ProductId).",
		".$this->MS($this->Rate).",
		".$this->MS($this->Qty)."
		)");
		
	}
	
	public function Update()
	{
		return $this->QueryBuild("update purchasedetails set
		productId= ".$this->MS($this->ProductId).",
		purchaseId= ".$this->MS($this->PurchaseId).",
		rate=".$this->MS($this->Rate).",
		qty=".$this->MS($this->Qty)."
		where id = ".$this->MS($this->Id));
		
	}
	
	public function Delete()
	{
		return $this->QueryBuild("delete from purchasedetails where id = ".$this->MS($this->Id));
		
	}

    public function SelectById()
    {
      $sql = "select purchaseId, productId, rate, qty  from productdetails where id = ".$this->MS($this->Id);
      $table = mysqli_query($this->CN(), $sql);
      while($row = mysqli_fetch_assoc($table))
      {

        $this->Id = $row["Id"];
        $this->PurchaseId =  $row["purchaseId"];
        $this->ProductId =  $row["productId"];
        $this->Rate = $row["rate"];
        $this->Qty = $row["qty"];
        return true;
      }
      $this->Error = mysqli_error($this->Connection);
      return false;
    }

    public function Select($sqlExtra = "")
    {
      return $this->SelectBuild("select pd.id, pc.number, p.name as product, pd.rate, pd.qty, (pd.rate * pd.qty) as subTotal
              from purchasedetails as pd
              left join purchase as pc on pd.PurchaseId = pc.Id
              left join product as p on pd.ProductId = p.Id ".$sqlExtra);
    }
	
	
}


?>
