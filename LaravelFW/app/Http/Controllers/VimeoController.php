<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
USE Vimeo;
use Illuminate\Http\Request;
class VimeoController extends Controller
{

	public function getAPI(){
    $querry=$_POST['Search'];
    $response_json=[];
    $response_json=Vimeo::request('/videos',['query'=>$querry], 'GET');
    //$response= json_decode($response_json['body'],true);
    $k=0;
    try{
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
               } 
            }
   			}
        if(!empty($video))
          return view('vimeo.index')->with("videos",$video);
        else
          return view('vimeo.index')->with("eroare","nu sa gasit niciun video");
       }
       catch(Exception $e){

        return view('vimeo.index')->with("eroare",$e->getMessage());

       }
       echo "Ceva";
   	}
	}		
