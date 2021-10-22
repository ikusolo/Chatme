<?php

include "dbconstant.php";

class Customers{
	//member variable;

	public $firstname;
	public $lastname;
	public $password;
	public $address;
	public $email;
	public $phonenumber;
	public $conn;


	function __construct(){
		$this->conn=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASENAME);
		if($this->conn->error) {
            die("Connection Failed:".$this->conn->error);
        }
	}
	function signUp($firstname,$lastname,$password,$address,$email,$phonenumber){
		$pwd=md5($password);
		$query="INSERT INTO customers(custfname,custlname,custpwd,custaddress,custemail,custtel)VALUES('$firstname','$lastname','$pwd','$address','$email','$phonenumber')";
		//var_dump($query);
		$result=$this->conn->query($query);
		if($result){
			return $this->conn->insert_id;
            
        }else{
        	return $this->conn->error;
        }

	}
	function loginCustomer($email,$password){
		$pwd=md5($password);
		$query="SELECT * FROM customers WHERE custemail='$email' AND custpwd='$pwd'";
		$result=$this->conn->query($query);
		//var_dump($query);
			if($result->num_rows>0){
			return  $result->fetch_all(MYSQLI_ASSOC);
		}else{
			$msg['error']= "Invalid email/password";

			
		}

		return $msg;



	}
	function getMyCustomer($custid){
		//write the sql query
		$sql="SELECT *  FROM customers WHERE custid='$custid'";
		//execute run the query
		$result=$this->conn->query($sql);
		//var_dump($sql);
		$rows=array();
		if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}else{
			return error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
		}
		return $rows;
	}

    function getCustomers(){
		//write the sql query
		$sql="SELECT *  FROM customers ORDER BY custfname";
		//execute run the query
		$result=$this->conn->query($sql);
		$rows=array();
		if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}
		return $rows;
	}
	function insertMessage($message,$sender){
		$sql="INSERT INTO message(msg_cont,sendercustid)VALUES('$message','$sender')";

		$result=$this->conn->query($sql);
		var_dump($sql);
		if($result){
			return $this->conn->insert_id;
		}else{
			return $this->conn->error;
		}
	}
	function getMessage(){
		$sql="SELECT * FROM message JOIN customers ON message.sendercustid=customers.custid";  #WHERE sendercustid='$sender' AND receivercustid='$receiver';

		$result=$this->conn->query($sql);
		//var_dump($sql);
		$rows=array();
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$rows[]=$row;
			}
		}
		return $rows;
	}
	function receiveMessage($sender,$receiver){
		$sql="SELECT * FROM message  WHERE sendercustid='$sender' AND receivercustid='$receiver'";

		$result=$this->conn->query($sql);
		//var_dump($sql);
		$rows=array();
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$rows[]=$row;
			}
		}
		return $rows;
	}
}


 ?>