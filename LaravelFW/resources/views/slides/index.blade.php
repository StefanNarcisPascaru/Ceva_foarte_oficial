@extends ('layouts.app')

@section('title')
	Slides
@stop

@section('content')
<h1>Lista slideuri despre <strong><?php echo $_POST["tag_slideuri"]?></strong>:</h1>
<!--<img src="images.jpg" alt="Mountain View" style="width:304px;height:228px;">-->

<?php $count=1;?>
@foreach($tot as $slide)
	<?php print $slide ?>

	<br>
	<p>SlideShow <?php echo $count; $count+=1;?></p>

@endforeach

@endsection