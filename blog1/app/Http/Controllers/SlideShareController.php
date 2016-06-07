<?php

namespace App\Http\Controllers;

use App\User;
<<<<<<< HEAD
=======
use DB;
>>>>>>> 944bbd5400bacdb48068de14cd4b21bbb6408253
use App\Http\Controllers\Controller;

class SlideShareController extends Controller
{
<<<<<<< HEAD
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
=======
	public function __construct(){
        $this->middleware('auth');
    }

	public function getAPI(){
		//obtin tokenii necesari pentru apelarea api-ului
	 	$api_time=time();//echo $api_time.'<br>';
		$api_hash=sha1('wd3xo7yL'.$api_time);//echo $api_hash."<br>";
	 	//intre cuvinte pun caracterul spatiu %20
		$tag=str_replace(' ','%20',$_POST["tag_slideuri"]);
		$myslides = simplexml_load_file('https://www.slideshare.net/api/2/search_slideshows?q='.$tag.'&page=1&items_per_page=16&lang=**&sort=relevance&upload_date=week&fileformat=all&file_type=all&cc=1&cc_adapt=1&cc_commercial=1&api_key=bagA4w8e&hash='.$api_hash.'&ts='.$api_time);
		//din xml-ul rezultat extrag id-urile slideurilor si le pun intr-un array
		$ids_api=array();
		foreach($myslides as $slides)
			if($slides->ID)
			array_push($ids_api, $slides->ID);
		//daca api-ul nu a gasit nimic returnez null
		$ids_existente= array();
		//$ids=substr(join(',',$ids_api),1);
		if(!$ids_api)
			return $ids_existente;
		//verific daca exista sliduri gasite de api care deja sunt in DB
		$res=DB::table('slide_share')->select('id_slide')->whereIn('id_slide', $ids_api);
		if(DB::table('slide_share')->whereIn('id_slide', $ids_api)->count() > 0)
		   	foreach($res as $slide){
       			array_push($ids_existente,$slide->id_slide);
			}
		//slideurile care nu existau in DB vor fi inserate
		$stack = array();
		foreach($myslides as $slides){
	 		//$stmt="";daca id nu exista in array se baga in db si in return
			if(!in_array($slides->ID,$ids_existente)){
		 		array_push($stack,$slides->Embed."( from api)");
		 		if($slides->ID)
		 			DB::table('slide_share')->insert(
		 				['id_search'=>2,
		 				'id_user'=>2,
		 				'id_slide'=>$slides->ID,
		 				'titlu'=>$slides->Title,
		 				'resursa'=>$slides->Embed,
		 				'limba'=>$slides->Language,
		 				'format'=>$slides->Format]);
		 	}
		}
		$stack=array_filter($stack);
		//returneaza lista de <ifram> gasite de api si care nu existau in DB
		return $stack;
	}

	public function inDB(){
		//functia cauta resurse in DB si returneaza un array de <iframe>
 		$slides=array();
 		$res=DB::table('slide_share')->select('resursa')->where ('titlu' ,'like','%'.$_POST["tag_slideuri"].'%')->get();
       	foreach($res as $slide){
       		array_push($slides,$slide->resursa." <div>from db</div>");
		}
  		return $slides;
	}

	public function cautaSimpluSlide(){// realizeaza cautari simple
 		$all_slides=array();
 		$count=DB::table('slide_share')->where('titlu' ,'like','%'.$_POST["tag_slideuri"].'%')->count();
 		if($count<5)//daca in Db nu exista macar 5 resurse, se va apela si api-ul
			$all_slides=array_merge(SlideShareController::inDB(),SlideShareController::getAPI());
 		else
 			$all_slides=SlideShareController::inDB();
 		
 		$stack=array_filter($all_slides);
 		//se vor afisa resursele gasite
 		return view('slides.index')->with("tot",$stack);
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
	public function cautaAvansatSlide(){//realizeaza cautari dupa mai multe campuri
 		if($_POST["lang"])
	 		$lang=$_POST["lang"];
	 	else
	 		$lang='en';
	 	if($_POST["format"])
	 		$format=$_POST["format"];
	 	else
	 		$format='pdf';

 		$all_slides=array();
 		$count=DB::table('slide_share')
 				->where('titlu' ,'like','%'.$_POST["tag_slideuri"].'%')
 				->where('format','=', $format)
 				->where('limba','=',$lang)
 				->count();
 		if($count<5)//daca in Db nu exista macar 5 resurse, se va apela si api-ul
			$all_slides=array_merge(SlideShareController::inDB_av(),SlideShareController::getAPI_av());
 		else
 			$all_slides=SlideShareController::inDB();
 		
 		$stack=array_filter($all_slides);
 		//se vor afisa resursele gasite
 		return view('slides.index')->with("tot",$stack);		
	}

	public function inDB_av(){
 		$slides=array();
    	if($_POST["lang"])
	 		$lang=$_POST["lang"];
	 	else
	 		$lang='en';
	 	if($_POST["format"])
	 		$format=$_POST["format"];
	 	else
	 		$format='pdf';
	 	$res=DB::table('slide_share')
	 			->select('resursa')
	 			->where ('titlu' ,'like','%'.$_POST["tag_slideuri"].'%')
	 			->where('format','=',$format)
	 			->where('limba','=',$lang)
	 			->get();
       	foreach($res as $slide)
       		array_push($slides, $slide->resursa." <div>from db</div>");
 		return $slides;
	}
	public function getAPI_av(){
		//obtin tokenii necesari pentru apelarea api-ului
		$api_time=time();//echo $api_time.'<br>';
		$api_hash=sha1('wd3xo7yL'.$api_time);//echo $api_hash."<br>";

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
	 	//intre cuvinte pun caracterul spatiu %20
		$tag=str_replace(' ','%20',$_POST["tag_slideuri"]);
		//se realizeaza cautarea in api dupa mai multe criterii
		$myslides = simplexml_load_file('https://www.slideshare.net/api/2/search_slideshows?q='.$tag.'&page=1&items_per_page=16&lang='.$lang.'&sort=relevance&upload_date='.$upload_time.'&fileformat='.$format.'&file_type=all&cc=1&cc_adapt=1&cc_commercial=1&api_key=bagA4w8e&hash='.$api_hash.'&ts='.$api_time);
		$ids_api=array();
		//din xml-ul rezultat extrag id-urile slideurilor si le pun intr-un array
		foreach($myslides as $slides)
			if($slides->ID)
			array_push($ids_api, $slides->ID);
		//daca api-ul nu a gasit nimic, returnez un array null
		$ids_existente= array();
		//$ids='['.substr(join(',',$ids_api),1).']';
		if(empty($ids_api))
			return $ids_existente;
		//verific daca exista sliduri gasite de api care deja sunt in DB
		$res=DB::table('slide_share')->select('id_slide')->whereIn('id_slide', $ids_api)->get();
		if(DB::table('slide_share')->whereIn('id_slide', $ids_api)->count() > 0)
		   	foreach($res as $slide){
       			array_push($ids_existente,$slide->id_slide);
			}
		$stack = array();

		foreach($myslides as $slides){
	 		//daca id nu exista in array se baga in db si in return
			if(!in_array($slides->ID,$ids_existente)){
		 		array_push($stack,$slides->Embed." <div>from api</div>");
		 		if($slides->ID)
		 			DB::table('slide_share')->insert(
		 				['id_search'=>2,
		 				'id_user'=>2,
		 				'id_slide'=>$slides->ID,
		 				'titlu'=>$slides->Title,
		 				'resursa'=>$slides->Embed,
		 				'limba'=>$slides->Language,
		 				'format'=>$slides->Format]);
		 	}
		}
		$stack=array_filter($stack);
		
		return $stack;
	}

}
>>>>>>> 944bbd5400bacdb48068de14cd4b21bbb6408253
