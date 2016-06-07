<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use DB;
use Auth;
use Cookie;
=======
>>>>>>> 944bbd5400bacdb48068de14cd4b21bbb6408253
use App\User;
use App\Http\Controllers\Controller;
USE Vimeo;
use Illuminate\Http\Request;
class VimeoController extends Controller
{
<<<<<<< HEAD
 
	public function getAPI(){
    $querry=$_POST['Search'];
    $response_json=[];
    $video_name=[];
    if(empty($_POST['Order']))
    $_POST['Order']='relevant';

    if (empty($_POST['ColorPlayer']))
      $_POST['ColorPlayer']='00adef'; 
    $_POST['ColorPlayer']=explode('#', $_POST['ColorPlayer'])[1];
    $response_json=Vimeo::request('/videos',['query'=>$querry,'sort'=>$_POST['Order']], 'GET');
    $k=0;
    try{
   	foreach ($response_json as $key => $value) {
   		if($key=='body')
   			foreach ($value as $key1 => $value1) {
   				if($key1=='data')
              foreach ($value1 as $key2 => $value2) {
                 foreach ($value2 as $key3 => $value3) {
                     if($key3=='name'){
                       $video_name[$k]=$value3;
                        $k+=1; 
                        } 
                      //extragere id video                 
                     if($key3=='uri'){
                      $id_video=explode('/', $value3);
                      $video[$k]=  "<iframe src=\"https://player.vimeo.com/video/".$id_video[2]."?color=".$_POST['ColorPlayer']."\" width=\"500\" height=\"281\" frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><br>";
                      //adaugare in baza de date
                      $url_baza_date[$k]="<iframe src=\"https://player.vimeo.com/video/".$id_video[2]."?color=\"000000\" width=\"500\" height=\"281\" frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><br>";
                      
                   }
                }
             }
         }
    }
        if(!empty($video)){
          for ($i=0;$i<count($video);$i++){
            if(DB::table('vimeoapi')->where('url','=',$url_baza_date[$i])->count() ==0)//verific daca url nu exista in baza de date
              DB::table('vimeoapi')->insert(['Name' => $video_name[$i], 'Search_querry' => $_POST['Search'],'url' =>$url_baza_date[$i]]);//adaugare in baza de date
          }
          return view('vimeo.index')->with("videos",$video)
                                    ->with("titles",$video_name);
        }
        else
          return view('vimeo.index')->with("eroare","nu sa gasit niciun video");
       }
       catch(Exception $e){
        return view('vimeo.index')->with("eroare",$e->getMessage());

  }
	}
  public function adaugare_favorite(){
    header("Location: http://google.com");
    die();
  } 		
}
=======
  public function __construct(){
        $this->middleware('auth');
    }

  
	public function getAPI(){
    $querry=$_POST['Search'];
    $response_json=[];
    $response_json=Vimeo::request('/videos',['query'=>$querry], 'GET');
    //$response= json_decode($response_json['body'],true);
    $k=0;
   	foreach ($response_json as $key => $value) {
   		# code...
   		if($key=='body')
   			foreach ($value as $key1 => $value1) {
   				# code...
   				if($key1=='data')
              foreach ($value1 as $key2 => $value2) {
                 foreach ($value2 as $key3 => $value3) {

                     if($key3=='uri'){
                      $id_video=explode('/', $value3);
                      $video[$k]=  "<iframe src=\"https://player.vimeo.com/video/".$id_video[2]."\" width=\"500\" height=\"281\" frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><br>";
                      $k+=1;
                     }
                  }
                   # code...
                 
               } 
            }
   			}
        return view('vimeo.index')->with("videos",$video);
   	}
	}		
>>>>>>> 944bbd5400bacdb48068de14cd4b21bbb6408253
