<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class SlideShareController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }

	public function getAPI(){
		$api_time=time();//echo $api_time.'<br>';
		$api_hash=sha1('wd3xo7yL'.$api_time);//echo $api_hash."<br>";
		$mysqlCon=new MysqlConn();
	 	$con=$mysqlCon->getCon();
	 	
		$tag=str_replace(' ','%20',$_POST["tag_slideuri"]);
		$myslides = simplexml_load_file('https://www.slideshare.net/api/2/search_slideshows?q='.$tag.'&page=1&items_per_page=16&lang=**&sort=relevance&upload_date=week&fileformat=all&file_type=all&cc=1&cc_adapt=1&cc_commercial=1&api_key=bagA4w8e&hash='.$api_hash.'&ts='.$api_time);
		$ids_api=array();
		foreach($myslides as $slides)
			array_push($ids_api, $slides->ID);

		$ids_existente= array();
		$ids=substr(join(',',$ids_api),1);
		if(!$ids)
			return $ids_existente;
		$stmt="select id_slide from slide_share where id_slide IN($ids)";
		$result = mysqli_query($con, $stmt) or die(mysqli_error($con));
 		if (mysqli_num_rows($result) > 0) 
 			while($row = $result->fetch_assoc())
 				array_push($ids_existente, $row["id_slide"]);
 		
		$stack = array();
		foreach($myslides as $slides){
	 		//$stmt="";daca id nu exista in array se baga in db si in return
			if(!in_array($slides->ID,$ids_existente)){
		 		array_push($stack,$slides->Embed."( from api)");
		 		if($slides->ID)
			 		$stmt="insert into slide_share (id_search,id_user,id_slide,titlu,resursa,limba,format) values(2,2,".$slides->ID.",'".$slides->Title."','".$slides->Embed."','".$slides->Language."','".$slides->Format."')";
		 		if (!mysqli_query($con, $stmt)) 
				    echo "Error: " . $stmt." id slide: ".$slides->ID ;
		 	}
		}
		$stack=array_filter($stack);
		
		return $stack;
	}

<<<<<<< HEAD
	public function inDB(){
 		$mysqlCon=new MysqlConn();
 		$con=$mysqlCon->getCon();

 		$slides=array();
       	$stmt="select resursa from slide_share where titlu like '%".$_POST["tag_slideuri"]."%'";
       	$result = mysqli_query($con, $stmt) or die(mysqli_error($con));
       	while($row=$result->fetch_assoc()){
       		array_push($slides,$row["resursa"]." <div>from db</div>");
		}//if
 		mysqli_close($con);
 		return $slides;
	}

	public function cautaSimpluSlide(){
		$mysqlCon=new MysqlConn();
 		$con=$mysqlCon->getCon();

 		$all_slides=array();
 		$stmt="select count(*) count from  slide_share where titlu like '%".$_POST["tag_slideuri"]."%'";
 		$result = mysqli_query($con, $stmt) or die(mysqli_error($con));
 		$row = $result->fetch_assoc(); 
 		if($row["count"]<5)
			$all_slides=array_merge(SlideShareController::inDB(),SlideShareController::getAPI());
 		else
 			$all_slides=SlideShareController::inDB();
 		
 		$stack=array_filter($all_slides);
 		
 		return view('slides.index')->with("tot",$stack);
	}
	
	public function avansat(){
		return view('slides.avansat');
	}

	public function searchAv(){
		if($_POST["tag_slideuri"])
		echo $_POST["tag_slideuri"].'<br>';
		else
			echo "tag nesetat";
		echo $_POST["lang"].'<br>';
		echo $_POST["format"].'<br>';
		echo str_replace(' ', '%20', 'a s d f');
//
	}
	public function cautaAvansatSlide(){
		$mysqlCon=new MysqlConn();
 		$con=$mysqlCon->getCon();
 		if($_POST["lang"])
	 		$lang=$_POST["lang"];
	 	else
	 		$lang='en';
	 	if($_POST["format"])
	 		$format=$_POST["format"];
	 	else
	 		$format='pdf';

 		$all_slides=array();
 		$stmt="select count(*) count from  slide_share where titlu like '%".$_POST["tag_slideuri"]."%' and format='".$format."' and limba='".$lang."'";
 		$result = mysqli_query($con, $stmt) or die(mysqli_error($con));
 		$row = $result->fetch_assoc(); 
 		if($row["count"]<5)
			$all_slides=array_merge(SlideShareController::inDB_av(),SlideShareController::getAPI_av());
 		else
 			$all_slides=SlideShareController::inDB();
 		
 		$stack=array_filter($all_slides);
 		
 		return view('slides.index')->with("tot",$stack);		


	}

	public function inDB_av(){
 		$mysqlCon=new MysqlConn();
 		$con=$mysqlCon->getCon();

 		$slides=array();
    	if($_POST["lang"])
	 		$lang=$_POST["lang"];
	 	else
	 		$lang='en';
	 	if($_POST["format"])
	 		$format=$_POST["format"];
	 	else
	 		$format='pdf';
        
        	$stmt="select resursa from slide_share where titlu like '%".$_POST["tag_slideuri"]."%' and format='".$format."' and limba='".$lang."'";
        	$result = mysqli_query($con, $stmt) or die(mysqli_error($con));
        	
        	while($row=$result->fetch_assoc()){
        		array_push($slides,$row["resursa"]." <div>from db</div>");
        	

		}//if
 		mysqli_close($con);
 		return $slides;
	}
	public function getAPI_av(){
		$api_time=time();//echo $api_time.'<br>';
		$api_hash=sha1('wd3xo7yL'.$api_time);//echo $api_hash."<br>";
		$mysqlCon=new MysqlConn();
	 	$con=$mysqlCon->getCon();
	 	if($_POST["lang"])
	 		$lang=$_POST["lang"];
	 	else
	 		$lang='**';
	 	if($_POST["format"])
	 		$format=$_POST["format"];
	 	else
	 		$format='all';
	 	if($_POST["upload_time"])
	 		$upload_time=$_POST["upload_time"];
	 	else
	 		$upload_time='any';

		$tag=str_replace(' ','%20',$_POST["tag_slideuri"]);
		$myslides = simplexml_load_file('https://www.slideshare.net/api/2/search_slideshows?q='.$tag.'&page=1&items_per_page=16&lang='.$lang.'&sort=relevance&upload_date='.$upload_time.'&fileformat='.$format.'&file_type=all&cc=1&cc_adapt=1&cc_commercial=1&api_key=bagA4w8e&hash='.$api_hash.'&ts='.$api_time);
		$ids_api=array();
		foreach($myslides as $slides)
			array_push($ids_api, $slides->ID);

		$ids_existente= array();
		$ids=substr(join(',',$ids_api),1);
		if(!$ids)
			return $ids_existente;
		$stmt="select id_slide from slide_share where id_slide IN($ids)";
		$result = mysqli_query($con, $stmt) or die(mysqli_error($con));
 		if (mysqli_num_rows($result) > 0) 
 			while($row = $result->fetch_assoc())
 				array_push($ids_existente, $row["id_slide"]);
 		
		$stack = array();
		foreach($myslides as $slides){
	 		//$stmt="";daca id nu exista in array se baga in db si in return
			if(!in_array($slides->ID,$ids_existente)){
		 		array_push($stack,$slides->Embed."( from api)");
		 		if($slides->ID)
			 		$stmt="insert into slide_share (id_search,id_user,id_slide,titlu,resursa,limba,format) values(2,2,".$slides->ID.",'".$slides->Title."','".$slides->Embed."','".$slides->Language."','".$slides->Format."')";
		 		if (!mysqli_query($con, $stmt)) 
				    echo "Error: " . $stmt." id slide: ".$slides->ID ;
		 	}
		}
		$stack=array_filter($stack);
		
		return $stack;
	}



}
=======
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
>>>>>>> 3c2cf0f037330df58a7b0d0659fb1e1bdd3792b3


	public function cautaSlide(){


	}
}