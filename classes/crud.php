<?php
include_once "config.php";

class Crud extends Config
{

	function __construct()
	{
		parent::__construct();
	}


//Display All
	public function displayAll($table)
	{
		$query = "SELECT * FROM {$table}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return 0;
		}
	}



	public function displayAllWithOrder($table,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return 0;
		}
	}


	public function displayAllSpecific($table,$value,$item)
	{
		$query = "SELECT * FROM {$table} WHERE $value='$item' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return 0;
		}
	}


		public function displayAllSpecificWithOrder($table,$value,$item,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} WHERE $value='$item' ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return 0;
		}
	}



	
	public function displayWithLimit($table,$limit)
	{
		$query = "SELECT * FROM {table} limit {$limit}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return 0;
		}
	}




	//Display Specific
	public function displayName($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT name FROM login where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return "No found records";
		}
	}



	public function displayOne($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return 0;
		}
	}

		public function displayNameById($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return 0;
		}
	}


	

	public function state_one($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT id,name FROM state where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return "No found records";
		}
	}

	

//Counting All
	public function countAll($table)
	{
		$q=$this->con->query("SELECT id FROM {$table}");
		if ($q) {
			return $q->num_rows;
		} else {
			return 0;
		}
		
		
	}



		public function countAllWithTwo($table,$item,$value)
	{
		$q=$this->con->query("SELECT id FROM {$table} where $item='$value' ");
		if ($q) {
			return $q->num_rows;
		} else {
			return 0;
		}
		
		
	}


	
// Inserting


	
	public function addUser($value)
	{

		$name = $this->cleanse($_POST['name']);
		$email = $this->cleanse($_POST['email']);
		$phone = $this->cleanse($_POST['phone']);
		$address = $this->cleanse($_POST['address']);
		$password = $this->cleanse($_POST['password']);
		$gender = $this->cleanse($_POST['gender']);

		$query="INSERT INTO user(name,email,phone,address,password,gender) VALUES('$name','$email','$phone','$address','$password','$gender')";
		$query2="INSERT INTO login(name,email,password,role) VALUES('$name','$email','$password','3')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:login.php?msg=Account was created successfully, Please login &type=success");
			$this->con->query($query2);
		}else{
			header("Location:login.php?msg=Error adding data try again!&type=error");
		}
	}


		public function addDiagnosis($value)
	{

		$hd = $this->cleanse($_POST['hd']);
		$ht = $this->cleanse($_POST['ht']);
		$vm = $this->cleanse($_POST['vm']);
		$bs = $this->cleanse($_POST['bs']);
		$cd = $this->cleanse($_POST['cd']);
		$ap = $this->cleanse($_POST['ap']);
		$st = $this->cleanse($_POST['st']);
		$rs = $this->cleanse($_POST['rs']);
		$result = $this->cleanse($_POST['result']);
		$advice = $this->cleanse($_POST['advice']);

		$query="INSERT INTO diagnosis(hd,ht,vm,bs,cd,ap,st,rs,result,advice) VALUES ('$hd','$ht','$vm','$bs','$cd','$ap','$st','$rs','$result','$advice')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-diagnose.php?msg=Diagnosis was created successfully&type=success");
		}else{
			header("Location:view-diagnose.php?msg=Error adding data try again!&type=error");
		}
	}



			public function addReport($post,$user_id,$result,$advice)
	{

		$hd = $this->cleanse($_POST['hd']);
		$ht = $this->cleanse($_POST['ht']);
		$vm = $this->cleanse($_POST['vm']);
		$bs = $this->cleanse($_POST['bs']);
		$cd = $this->cleanse($_POST['cd']);
		$ap = $this->cleanse($_POST['ap']);
		$st = $this->cleanse($_POST['st']);
		$rs = $this->cleanse($_POST['rs']);
		$result = $this->cleanse($result);
		$advice = $this->cleanse($advice);
		$user_id = $this->cleanse($user_id);

		$query="INSERT INTO report(user_id,hd,ht,vm,bs,cd,ap,st,rs,result,advice) VALUES ('$user_id','$hd','$ht','$vm','$bs','$cd','$ap','$st','$rs','$result','$advice')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:add-diagnose.php?msg=Diagnosis was processed&type=success");
		}else{
			header("Location:add-diagnose.php?msg=Error processing diagnosis try again!&type=error");
		}
	}


		public function compareDiagnosis($post)
	{
		$hd = $this->cleanse($_POST['hd']);
		$ht = $this->cleanse($_POST['ht']);
		$vm = $this->cleanse($_POST['vm']);
		$bs = $this->cleanse($_POST['bs']);
		$cd = $this->cleanse($_POST['cd']);
		$ap = $this->cleanse($_POST['ap']);
		$st = $this->cleanse($_POST['st']);
		$rs = $this->cleanse($_POST['rs']);
		
		$query = "SELECT * from diagnosis where hd='$hd' and ht='$ht' and vm='$vm' and bs='$bs' and cd='$cd' and ap='$ap' and st='$st' and rs='$rs' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return 0;
		}
	}



	public function updateAdmin($post)
	{
		
		$email=$this->cleanse($_POST['email']);
		$password=$this->cleanse($_POST['password']);
		$query="UPDATE login SET email='$email',password='$password' WHERE email='$email' ";
		$sql=$this->con->query($query);
		if ($sql==true) {
			header("Location:profile.php?msg=Account was updated successfully&type=success");
		}else{
			header("Location:profile.php?msg=Error updating account try again!&type=error");
		}
	}




	public function displayProfile($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM login where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return "No found records";
		}
	}



//Empty Table
	public function emptyTable($table,$url) 
	{ 
		$id = $this->cleanse($id);
		$query = "TRUNCATE {$table}";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Data was successfully deleted&type=success");
		} else {
			header("Location:$url?msg=Error deleting data&type=error");
		}
	}



//Delete Items
	public function delete($id, $table,$url) 
	{ 
		$id = $this->cleanse($id);
		$query = "DELETE FROM {$table} WHERE id = $id";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Data was successfully deleted&type=success");
		} else {
			header("Location:$url?msg=Error deleting data&type=error");
		}
	}
	

	public function deleteTwoTable($matno,$table,$table2,$url) 
	{ 
		$matno = $this->cleanse($matno);
		$query = "DELETE FROM {$table} WHERE matno= $matno";
		$query2 = "DELETE FROM {$table2} WHERE matno= $matno";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Student was successfully deleted&type=success");
			$this->con->query($query2);
		} else {
			header("Location:$url?msg=Error deleting Student&type=error");
		}
	}


//Search
	public function displaySearch($value)
	{
	//Search box value assigning to $Name variable.
		$Name = $this->cleanse($value);
		$query = "SELECT * FROM product WHERE pid LIKE '%$Name%'";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return false;
		}
	}



	public function cleanse($str)
	{
   #$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
		$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
		$str = stripslashes($str); /** Add Strip Slashes Protection */
		if($str!=''){
			$str=trim($str);
			return mysqli_real_escape_string($this->con,$str);
		}
	}




	

	public function greeting()
	{
      //Here we define out main variables 
		$welcome_string="Welcome!"; 
		$numeric_date=date("G"); 

 //Start conditionals based on military time 
		if($numeric_date>=0&&$numeric_date<=11) 
			$welcome_string="Good Morning!,"; 
		else if($numeric_date>=12&&$numeric_date<=17) 
			$welcome_string="Good Afternoon!,"; 
		else if($numeric_date>=18&&$numeric_date<=23) 
			$welcome_string="Good Evening!,"; 

		return $welcome_string;

	}



}

?>

