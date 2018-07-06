<?php

class purchase extends base
{
	public $Id;
                  public $Number;
                  public $DateTime;
	public $UserId;
                  public $Total;
                  public $DeliveryCharge;
                  public $Vat;
                  public $Discount;
                  public $PaymentMethodId;
	public $Address;
                  
                  
	
	public function Insert()
	{
		return $this->QueryBuildReturnId("insert into purchase(number, dateTime, userId, total, deliveryCharge, vat, discount, paymentMethodId, address) values(
                                    '".$this->MS($this->Number)."',
                                    '".$this->MS($this->DateTime)."',
                                    ".$this->MS($this->UserId).",
		".$this->MS($this->Total).",
                                    ".$this->MS($this->DeliveryCharge).",
                                    ".$this->MS($this->Vat).",
                                    ".$this->MS($this->Discount).",
		".$this->MS($this->PaymentMethodId).",
		'".$this->MS($this->Address)."'
		)");
		
	}
        
    public function Update()
	{
		return $this->QueryBuild("update purchase set 
                                    number = ".$this->MS($this->Number).",
                                    dateTime = '".$this->MS($this->DateTime)."',
		userId = ".$this->MS($this->UserId).",
                                    total = ".$this->MS($this->Total).",
                                    deliveryCharge = ".$this->MS($this->DeliveryCharge).",
                                    vat = ".$this->MS($this->Vat).",
                                    discount = ".$this->MS($this->Discount).",
                                    paymentMethodId = ".$this->MS($this->PaymentMethodId)."
		
		where id = ".$this->MS($this->Id));
		
	}
	
	public function Delete()
	{
		return $this->QueryBuild("delete from purchase where id = ".$this->MS($this->Id));
		
	}
	
	public function SelectById()
	{
		$sql = "select id,  number, dateTime, usertId, total, deliveryCharge, vat, discount, paymentMethodId, address from purchase
                                                where id = ".$this->MS($this->Id);
                
		$table = mysqli_query($this->CN(), $sql);
		while($row = mysqli_fetch_assoc($table))
		{
			
			$this->Number = $row["number"];
                                                      $this->DateTime = $row["dateTime"];
                                                      $this->UserId =  $row["userId"];
                                                      $this->Total =  $row["total"];
                                                      $this->DeliveryCharge = $row["deliveryCharge"];
                                                      $this->Vat = $row["vat"];
                                                      $this->Discount = $row["discount"];
                                                      $this->PaymentMethodIdId =  $row["paymentMethodId"];
			$this->Address = $row["address"];
			return true;
		}
		$this->Error = mysqli_error($this->CN());
		return false;
	}
	
	public function Select()
	{
		return $this->SelectBuild("select pch.id, pch.number, pch.dateTime, u.name as users, pch.total, pch.deliveryCharge, pch.vat, pch.discount,  pm.id as paymentmethod, pch.address
                                                from purchase as pch
                                                 left join users as u on pch.userId = u.id
                                                 left join paymentMethod as pm on pch.paymentMethodId = pm.id");
	}
	
	
}


?>