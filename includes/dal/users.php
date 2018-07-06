<?php

class users extends base
{
	public $Id;
    public $Name;
	public $Contact;
	public $Email;
	public $Password;
	public $Gender;
	public $DateOfBirth;
	public $Address;
	public $CityId;
	public $Type;
	
	public function Insert()
	{
	    return $this->QueryBuild("insert into users(name, contact, email, password, gender, dateOfBirth, address, cityId) values(
		'".$this->MS($this->Name)."',
		'".$this->MS($this->Contact)."',
		'".$this->MS($this->Email)."',
		password('".$this->MS($this->Password)."'),
		'".$this->MS($this->Gender)."',
		'".$this->MS($this->DateOfBirth)."',
		'".$this->MS($this->Address)."',
		".$this->MS($this->CityId)."
		)");
	}
	
	public function Update()
	{
	    return $this->QueryBuild("update usere set
		name = '".$this->MS($this->Name)."',
		contact = '".$this->MS($this->Contact)."',
		email = '".$this->MS($this->Email)."',
		password = password('".$this->MS($this->Password)."'),
		gender = '".$this->MS($this->Gender)."',
		dateOfBirth ='".$this->MS($this->DateOfBirth)."',
		address = '".$this->MS($this->Address)."',
		cityId = ".$this->MS($this->CityId)."
		where id = ".$this->MS($this->Id));
	}
	
	public function Delete()
	{
		return $this->QueryBuild("delete from users where id = ".$this->MS($this->Id));
}
	
	public function SelectById()
	{
		$sql = "select name, contact, email, password, gender, dateOfBirth, address, cityId, type from users where id = ".$this->MS($this->Id);
		$table = mysqli_query($this->CN(), $sql);
		while($row = mysqli_fetch_assoc($table))
		{
		    $this->Name = $row["name"];
			$this->Contact =  $row["contact"];
			$this->Email = $row["email"];
			$this->Password = $row["password"];
			$this->Gender = $row["gender"];
			$this->DateOfBirth = $row["dateOfBirth"];
			$this->Address = $row["address"];
			$this->CityId = $row["cityId"];
			$this->Type = $row['type'];
			return true;
		}
		$this->Error = mysqli_error($this->CN());
		return false;
	}
	
	public function Login()
	{
		$sql = "select id, name, contact, email, gender,dateOfBirth, address, cityId, type from users where email = '".$this->MS($this->Email)."' and password = password('".$this->Password."')";
		$table = mysqli_query($this->CN(), $sql);
		while($row = mysqli_fetch_assoc($table))
		{
			$this->Id = $row['id'];
		    $this->Name = $row["name"];
			$this->Contact =  $row["contact"];
			$this->Email = $row["email"];
			$this->Gender = $row["gender"];
			$this->DateOfBirth = $row["dateOfBirth"];
			$this->Address = $row["address"];
			$this->CityId = $row["cityId"];
			$this->Type = $row['type'];
			return true;
		}
		$this->Error = mysqli_error($this->Connection);
		return false;
	}
	
	public function Select()
	{
		return $this->SelectBuild("SELECT ur.id, ur.name, ur.contact, ur.email, ur.gender, ur.dateOfBirth, ur.address, ct.name as city, cn.name as country
				 from users as ur
				 left join city as ct on ur.cityId = ct.id
				 left join country as cn on ct.countryId = cn.id
				 ");
		
	}
}

?>