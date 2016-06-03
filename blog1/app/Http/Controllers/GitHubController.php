<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use GrahamCampbell\GitHub\Facades\GitHub;
use App\gitHistory;
class GitHubController extends Controller
{
	public function getGitHubApi(){
		GitHub::me()->organizations();
		$sami = "stefa08";
		$ceva = GitHub::repo()->show($sami, 'Ceva_foarte_oficial');
		$merge = $ceva['html_url'];

		$user = true;
		
		$apis = gitHistory::all();
		
		return view('gitHub.api')
			->with("html_url",$ceva['html_url'])
			->with("user",$user)
			->with("date",$apis);
		



		// $res = file_get_contents('https://api.github.com/search/repositories?q=tetris+language:assembly&sort=stars&order=desc');
		// $res = json_decode($res);
		// print_r($res);
		// echo $res;

		// $json = file_get_contents('https://api.github.com/search/code?q=addClass+in:file+language:js+repo:jquery/jquery');
		// $obj = json_decode($json);
		// echo $obj->access_token;

		// $username='TimofteSamuel';
		// $password='timofte12';
		// $url = 'https://api.github.com/search/code?q=addClass+in:file+language:js+repo:jquery/jquery';
		// $ch = curl_init();
		// curl_setopt($ch, CURLOPT_URL, $url);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
		// curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		// $output = curl_exec($ch);
		// $info = curl_getinfo($ch);
		// curl_close($ch);
		// $relative = $info;
		// $strin = json_encode($info);
		// //$item = $relative['items'];
		// echo '<br>';
		// echo $strin;
		// foreach ( $info as $key => $value) {
		//  	echo '<br>';
		//  	echo $key;
		//  	echo '   ';
		//  	echo $value;
		//  } 
		// echo '<br>';
		// echo  "<a href=$url>merge</a>";
	}
}