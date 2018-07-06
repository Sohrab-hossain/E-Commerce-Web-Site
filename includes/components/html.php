<?php

class html
{
	function __construct()
	{
		
	}
	
	public function FormBegin($attributes = "")
	{
		print "<form method=\"post\" action=\"\" $attributes>\n";
	}
	
	public function FormEnd()
	{
		print "</form>\n";
	}
	
	public function SuccessMessage($message)
	{
		print "<span class=\"successMessage\">$message</span>";
	}
	
	public function ErrorMessage($message)
	{
		print "<span class=\"errorMessage\">$message</span>";
	}
	
	public function TextField($name, $value = "", $error = "")
	{
		print "<div class=\"form-group\">\n
		<label>".ucwords($name)."</label>\n
		<input type=\"text\" name=\"$name\" id=\"$name\" class=\"form-control\" value=\"$value\"/>\n
		<span class=\"error\" id=\"e$name\">$error</span>\n
		</div>\n";
	}
	
	public function TextFieldReadOnly($name, $value = "", $error = "")
	{
		print "<div class=\"form-group\">\n
		<label>".ucwords($name)."</label>\n
		<input type=\"text\" name=\"$name\" id=\"$name\" class=\"form-control\" value=\"$value\" readonly/>\n
		<span class=\"error\" id=\"e$name\">$error</span>\n
		</div>\n";
	}
	
	public function DateField($name, $value, $error = "")
	{
		print "<div class=\"form-group\">\n
		<label>".ucwords($name)."</label>\n
		<input type=\"date\" name=\"$name\" id=\"$name\" class=\"form-control\" value=\"$value\"/>\n
		<span class=\"error\" id=\"e$name\">$error</span>\n
		</div>\n";
	}
	
	public function ImageField($name, $error = "")
	{
		print "<div class=\"form-group\">\n
		<label>".ucwords($name)."</label>\n
		<input type=\"file\" name=\"$name\" id=\"$name\" class=\"form-control\"/>\n
		<span class=\"error\" id=\"e$name\">$error</span>\n
		</div>\n";
	}
	
	public function RadioField($name, $array, $value, $error = "")
	{
		print "<div class=\"form-group\">\n
		<label>".ucwords($name)."</label>\n";
		
		foreach($array as $v)
		{
			if($value == $v)
			{
			print "<input type=\"radio\" name=\"$name\" id=\"$name\" value=\"$v\" Checked />$v\n";
			}
			else{
				print "<input type=\"radio\" name=\"$name\" id=\"$name\" value=\"$v\"/>$v\n";
			}
		}
		
		print "<span class=\"error\" id=\"e$name\">$error</span>\n
		</div>\n";
	}
	
	public function PasswordField($name, $value, $error = "")
	{
		print "<div class=\"form-group\">\n
		<label>".ucwords($name)."</label>\n
		<input type=\"password\" name=\"$name\" id=\"$name\" class=\"form-control\" value=\"$value\"/>\n
		<span class=\"error\" id=\"e$name\">$error</span>\n
		</div>\n";
	}
	
	public function TextArea($name, $value = "", $error = "")
	{
		print "<div class=\"form-group\">\n
		<label>".ucwords($name)."</label>\n
		<textarea name=\"$name\" id=\"$name\" class=\"form-control\">".$value."</textarea>\n
		<span class=\"error\" id=\"e$name\">$error</span>\n
		</div>\n";
	}
	
	public function Submit($name="submit", $value="Submit")
	{
		print "<input type=\"submit\" name=\"$name\" value=\"$value\"/>\n";
	}
	
	function SelectField($name, $table,$value = "0", $error = "")
	{
		print "<div class=\"form-group\">\n";
		print "<label>".ucwords($name)."</label>\n";
		print "<select name=\"$name\" id=\"$name\" class=\"form-control\">\n";
		print "<option value=\"0\">Select</option>\n";
		foreach($table as $row)
		{
			if($value == $row[0])
			{
				print "<option value=\"".$row[0]."\" selected>".$row[1]."</option>\n";
			}
			else{
				print "<option value=\"".$row[0]."\">".$row[1]."</option>\n";
			}
		}
		print "</select>\n";
		print "<span class=\"error\" id=\"e$name\">$error</span>\n</div>\n";
}
	
	public function Table($table)
	{
		print '<table class="table-responsive">'."\n";
		print '<thead><tr>';
		foreach($table as $row)
		{
			foreach($row as $k=>$v)
			{
				if(strtolower($k) == "id" || $k == "0" || $k > 0)
					continue;
				
				print "<th>".ucwords($k)."</th>";
			}
			break;
		}
		print '<th>#</th></tr></thead>';
		foreach($table as $row)
		{
			print '<tr>';
			foreach($row as $k=>$v)
			{
				if(strtolower($k) == "id" || $k == "0" || $k > 0)
					continue;
				
				print '<td>'.htmlentities($v).'</td>';
			}
			print '<td>'.EditDeleteLink($row["id"]).'</td>';
			print '</tr>';
		}
		print '</table>';
	}
	
}


?>

