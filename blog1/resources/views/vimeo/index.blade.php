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
@endsection