@extends ('layouts.app')

@section('title')
	Slides
@stop

@section('content')
<h1>Lista slideuri despre <strong><?php echo $_POST["tag_slideuri"]?></strong>:</h1>
<!--<img src="images.jpg" alt="Mountain View" style="width:304px;height:228px;">-->

<?php $count=1;?>
@if($tot==null)
	<h3><?php echo "Please, change search settings!"?></h3>
	<img src="no-result.png" alt="no-result">
@else
@foreach($tot as $slide)
	{!! $slide !!}
	
	<p>SlideShow <?php echo $count; $count+=1;?></p>
<br>
@endforeach
@endif
@endsection