<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class SlideShareController extends Controller
{
	public function getAPI(){
		$api_time=time();//echo $api_time.'<br>';
		$api_hash=sha1('wd3xo7yL'.$api_time);//echo $api_hash."<br>";

		$myslides = simplexml_load_file('https://www.slideshare.net/api/2/search_slideshows?q='.$_POST["tag_slideuri"].'&page=1&items_per_page=16&lang=**&sort=relevance&upload_date=week&fileformat=all&file_type=all&cc=1&cc_adapt=1&cc_commercial=1&api_key=bagA4w8e&hash='.$api_hash.'&ts='.$api_time);
		//$tot='<br>';
		$stack = array();
		foreach($myslides as $slides)
			array_push($stack,$slides->Embed);
		
		return view('slides.index')->with("tot",$stack);
	}

	public function inDB(){
 		$mysqlCon=new MysqlConn();
 		$con=$mysqlCon->getCon();

 		$stmt="select count(*) count from  slide_share where titlu like '%".$_POST["tag_slideuri"]."%'";
 		//$stmt="select count(*) count from users";
 		$result = mysqli_query($con, $stmt) or die(mysqli_error($con));
 		//if (mysqli_num_rows($result) > 0) 
 		$row = $result->fetch_assoc(); 
 		//echo $row["count"];
 		$slides=array();
        if($row["count"]<5){
        	$stmt="select resursa from slide_share where titlu like '%".$_POST["tag_slideuri"]."%'";
        	$result = mysqli_query($con, $stmt) or die(mysqli_error($con));
        	
        	while($row=$result->fetch_assoc()){
        		array_push($slides,$row["resursa"]);
        	}

		}//if

 		mysqli_close($con);
 		return view('slides.index')->with("tot",$slides);
	}

	public function cautaSlide(){


	}
}


class MysqlConn{
	protected $conn;

	public function __construct()
        {if (!$this->conn)
        	$this->conn=mysqli_connect("localhost","root","","laravel");
        if ($this->conn->connect_error) 
		    die("Connection failed: " . $con->connect_error);
        }
	
	public function getCon(){
		return $this->conn;
	}
}