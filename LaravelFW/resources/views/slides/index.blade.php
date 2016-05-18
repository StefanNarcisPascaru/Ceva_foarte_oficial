@extends ('layouts.layout')

@section('title')
	Slides
@stop

@section('content')
<h1>Lista slideuri</h1>
<img src="images.jpg" alt="Mountain View" style="width:304px;height:228px;">


@foreach($tot as $slide)
	<?php print $slide ?>
	<p>next</p>
@endforeach

@endsection