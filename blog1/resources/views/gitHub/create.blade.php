@extends("layouts.layout")
@extends('layouts.app')


@section('title')
	GitHubApi
@stop

@section('body')
	{!!Form::open(['route' => 'history.store'])!!}

	{!!Form::label('search_username','User Name')!!}
	{!!Form::text('search_username',null,['placeholder' => 'Owner UserName'])!!}

	{!!Form::label('search_text','Repo name')!!}
	{!!Form::text('search_text',null,['placeholder' => 'Repo that you search'])!!}

	{!!Form::submit('Cauta')!!}

	{!!Form::close()!!}
@stop