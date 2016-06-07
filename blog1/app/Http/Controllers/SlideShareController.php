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

	public function inBD(){
		$con=mysqli_connect("localhost","root","","laravel");
		if ($con->connect_error) 
		    die("Connection failed: " . $con->connect_error);
 		$stmt="select count(*) count from users ";
 		$result = mysqli_query($con, $stmt) or die(mysqli_error($con));

 		if (mysqli_num_rows($result) > 0) 
 		   	{$row = $result->fetch_assoc(); 
        		echo "id: " . $row["count"]. "<br>";}
		else 
    		echo "0 results";
		

 		mysqli_close($con);

 		return view('welcome');
	}


	public function cautaSlide(){


	}
}