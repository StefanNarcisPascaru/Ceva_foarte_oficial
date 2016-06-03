<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class SlideShareController extends Controller
{
	public function getTest(){
		$api_time=time();//echo $api_time.'<br>';
		$api_hash=sha1('wd3xo7yL'.$api_time);//echo $api_hash."<br>";

		$myslides = simplexml_load_file('https://www.slideshare.net/api/2/search_slideshows?q=pigs&page=1&items_per_page=16&lang=**&sort=relevance&upload_date=week&fileformat=all&file_type=all&cc=1&cc_adapt=1&cc_commercial=1&api_key=bagA4w8e&hash='
				.$api_hash
				.'&ts='
				.$api_time);
		//$tot='<br>';
		$stack = array();
		foreach($myslides as $slides)
			array_push($stack,$slides->Embed);
		
		return view('slides.index')->with("tot",$stack);
	}

	public function test2(){
		return view('welcome');
	}
}