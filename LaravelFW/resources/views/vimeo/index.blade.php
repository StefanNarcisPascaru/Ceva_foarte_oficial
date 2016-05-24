<<<<<<< HEAD
@extends('layouts.app')
@section('content')
{!! Form::open(array('route' => 'vimeo.api')) !!}
    {{Form::label('Search','Search:(Null Default)')}}
    {{Form::text('Search',null,array('class'=>'form-control'))}}
    {{Form::submit('Search',array('class' => 'btn btn-succes btn-lg btn-block'))}}
{!! Form::close() !!}
@if ( ! empty($videos))
<?php $count=1;?>
@foreach($videos as $video)
	<?php print $video ?>

	<br>
	<p>Video <?php echo $count; $count+=1;?></p>
@endforeach
@endif
=======

@extends('layouts.app')
@section('content')
<div class="container" >
  <div class="jumbotron">
    <p class=".text-muted">
    	<h1>Cautare pe Vimeo</h1>      
    	<p style="color:black;"><strong><a style="color:white;">Vimeo</a> is a video-sharing website in which users can upload, share and view videos.</strong></p>

  	</p>
  </div>
{!! Form::open(array('route' => 'vimeo.api')) !!}
    {{Form::label('Search','Cautarea:')}}
    {{Form::text('Search',null,array('class'=>'form-control','placeholder'=>"Introduceti cuvantul/propozitia dupa care doriti sa realizati cautarea"))}}
    {{Form::label('Order','Sortare dupa:')}}
    {{Form::select('Order', array(''=>'',
    							'relevant' => 'relevant',
    							'date' => 'date',
    							'alphabetical'=>'alphabetical',
    							'plays'=>'plays',
    							'likes'=>'likes',
    							'comments'=>'comments',
    							'duration'=>'duration'), '',array('class'=>'btn btn-default dropdown-toggle'))}}
    {{Form::label('ColorPlayer','Selectati culoare player:')}}
    {{Form::color('ColorPlayer')}}
<!--     {{Form::select('ColorPlayer', array(''=>'',
    							'00adef' => 'blue',
    							'ff9933' => 'orange',
    							'c9ff23'=>'lime',
    							'ff0179'=>'Fuschia',
    							'ffffff'=>'white'), '',array('class'=>'btn btn-default dropdown-toggle'))}} -->

    {{Form::submit('Search',array('class' => 'btn btn-succes btn-lg btn-block'))}}

{!! Form::close() !!}
@if(!empty($eroare))
<div class="alert alert-warning" >
  <strong>Nu a fost gasit nici un video!</strong> pentru cautarea dumneavoastra <strong>{{$_POST['Search']}}<strong>
</div>

@else
@if ( ! empty($videos))
<div class="alert alert-success">
  <strong>Succes!</strong> rezultatele cautarii dumneavoastra pentru cuvantul <strong>{{$_POST['Search']}}</strong> 
</div>
    <div  class="container">  
@foreach($videos as $video)
	 <diV center='auto'> {!!$video!!}
	 </diV>
@endforeach
@endif
@endif
</div>>
</div>
>>>>>>> 3c2cf0f037330df58a7b0d0659fb1e1bdd3792b3
@endsection