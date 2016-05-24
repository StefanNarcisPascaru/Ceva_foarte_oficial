<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use GrahamCampbell\GitHub\Facades\GitHub;

class GitHubController extends Controller
{
	public function faCeva(){
		// $api_time=time();//echo $api_time.'<br>';
		// $api_hash=sha1('wd3xo7yL'.$api_time);//echo $api_hash."<br>";

		// $myslides = simplexml_load_file('https://www.slideshare.net/api/2/search_slideshows?q=pigs&page=1&items_per_page=16&lang=**&sort=relevance&upload_date=week&fileformat=all&file_type=all&cc=1&cc_adapt=1&cc_commercial=1&api_key=bagA4w8e&hash='
		// 		.$api_hash
		// 		.'&ts='
		// 		.$api_time);
		// //$tot='<br>';
		// $stack = array();
		// foreach($myslides as $slides)
		//{!! Form::open(['url' => 'foo/bar']) !!}
		// 	array_push($stack,$slides->Embed);

		//return view('gitHub.index');

		GitHub::me()->organizations();
		// we're done here - how easy was that, it just works!
		echo "string";
		//$ceva = GitHub::repo()->show('stefa08', 'Ceva_foarte_oficial');
		//$ceva = GitHub::repo()->show('https://api.github.com/search/code?q=addClass+in:file+language:js+repo:jquery/jquery');
		$commit = $client->api('repo')->commits()->show('KnpLabs', 'php-github-api', '839e5185da9434753db47959bee16642bb4f2ce4');
		echo $ceva['html_url'];
		$merge = $ceva['html_url'];
		echo "<br>";
		echo "<a href=$merge>merge</a>";
		echo "$commit";
		// this example is simple, and there are far more methods available
		//return view('slides.index')->with("tot",$stack);

		return view('gitHub.index');
	}

	public function test2(){
		return view('welcome');

	}
}