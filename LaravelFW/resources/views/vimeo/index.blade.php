@extends('layouts.app')
@section('content')
{!! Form::open(array('route' => 'vimeo.api')) !!}
    {{Form::label('Search','Search:(Null Default)')}}
    {{Form::text('Search',null,array('class'=>'form-control'))}}
    {{Form::submit('Search',array('class' => 'btn btn-succes btn-lg btn-block'))}}
{!! Form::close() !!}
@if(!empty($eroare))
<?php
 	echo "<div class=\"alert alert-warning\">
  <strong>Nu a fost gasit nici un video!</strong> pentru cautarea dumneavoastra <strong>".$_POST['Search']."<strong>
	</div>";
?>;
@else
@if ( ! empty($videos))
<?php
 	echo "<div class=\"alert alert-success\">
  <strong>Succes!</strong> rezultatele cautarii dumneavoastra pentru cuvantul <strong>".$_POST['Search']."</strong> 
	</div>";
	 $count=1;?>
@foreach($videos as $video)
	<?php print $video ?>

	<br>
	<p>Video <?php echo $count; $count+=1;?></p>
@endforeach
@endif
@endif
@endsection