<?php

class purchaseStatus extends base
{
	public $Id;
	public $UserId;
                  public $StatusId;
                  public $PurchaseId;
                  public $DateTime;
                  
	
	public function Insert()
	{
		return $this->QueryBuild("insert into purchaseStatus(userId, statusId, purchaseId) values(
                                    ".$this->MS($this->UserId).",
		".$this->MS($this->StatusId).",
                                    ".$this->MS($this->PurchaseId)."
		)");
			}
        
    public function Update()
	{
		return $this->QueryBuild("update purchaseStatus set 
		userId = ".$this->MS($this->UserId).",
                                    statusId = ".$this->MS($this->StatusId).",
                                    purchaseId = ".$this->MS($this->PurchaseId).",
		dateTime = '".$this->MS($this->DateTime)."'
		where id = ".$this->MS($this->Id));
		}
	
	public function Delete()
	{
		return $this->QueryBuild("delete from purchaseStatus where id = ".$this->MS($this->Id));
			}
	
	public function SelectById()
	{
		$sql = "select id, usertId, statusId, purchaseId, dateTime from purchaseStatus where id = ".$this->MS($this->Id);
		$table = mysqli_query($this->CN(), $sql);
		while($row = mysqli_fetch_assoc($table))
		{
			
			$this->UserId =  $row["userId"];
                                                      $this->StatusId =  $row["statusId"];
                                                      $this->PurchaseId =  $row["purchaseId"];
                                                      $this->DateTime = $row["dateTime"];
			return true;
		}
		$this->Error = mysqli_error($this->CN());
		return false;
	}
	
	public function Select($sqlExtra = "")
	{
		return $this->SelectBuild("select ps.id, p.number, u.name as user, u.contact, u.email, s.name as status, p.number as purchase, ps.dateTime from purchaseStatus as ps
                                                 left join users as u on ps.userId = u.id
                                                 left join status as s on ps.statusId = s.id
                                                 left join purchase as p on ps.purchaseId = p.id ".$sqlExtra);
		
	}
	
	
}


?>