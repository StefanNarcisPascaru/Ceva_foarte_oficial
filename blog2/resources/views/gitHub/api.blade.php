@extends("layouts.layout")
@extends('layouts.app')

@section('title')
	GitHubApi
@stop
@section('body')
	
	<a href={{$html_url}}>the repo that search for</a>
	<br>
	<p>{{$html_url}}</p>
	<iframe src="https://github.com/stefa08/Ceva_foarte_oficial">ceva</iframe>
	<iframe width="560" height="315" src="http://gist.github.com/" frameborder="0" allowfullscreen></iframe>
@stop