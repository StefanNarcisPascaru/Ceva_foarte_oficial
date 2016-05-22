<?php 

class MysqlConn{
	protected $conn;

	public function __construct()
        {if (!$this->conn)
        	$this->conn=mysqli_connect("localhost","root","","laravel");
        if ($conn->connect_error) 
		    die("Connection failed: " . $con->connect_error);
        }
	
	public function getCon(){
		return $this->conn;
	}
}

?>