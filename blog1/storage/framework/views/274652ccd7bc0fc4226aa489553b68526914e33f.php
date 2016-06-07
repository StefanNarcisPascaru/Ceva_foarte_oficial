<?php $__env->startSection('content'); ?>
<div class="container" >
  <div class="jumbotron">
    <p class=".text-muted">
    	<h1>Cautare pe Vimeo</h1>      
    	<p style="color:black;"><strong><a style="color:white;">Vimeo</a> is a video-sharing website in which users can upload, share and view videos.</strong></p>

  	</p>
  </div>
<?php echo Form::open(array('route' => 'vimeo.api')); ?>

    <?php echo e(Form::label('Search','Cautarea:')); ?>

    <?php echo e(Form::text('Search',null,array('class'=>'form-control','placeholder'=>"Introduceti cuvantul/propozitia dupa care doriti sa realizati cautarea "))); ?>

    <?php echo e(Form::label('Order','Sortare dupa:')); ?>

    <?php echo e(Form::select('Order', array(''=>'',
    							'relevant' => 'relevant',
    							'date' => 'date',
    							'alphabetical'=>'alphabetical',
    							'plays'=>'plays',
    							'likes'=>'likes',
    							'comments'=>'comments',
    							'duration'=>'duration'), '',array('class'=>'btn btn-default dropdown-toggle'))); ?>

    <?php echo e(Form::label('ColorPlayer','Selectati culoare player:')); ?>

    <?php echo e(Form::color('ColorPlayer')); ?>


    <?php echo e(Form::submit('Search',array('class' => 'btn btn-succes btn-lg btn-block'))); ?>


<?php echo Form::close(); ?>

<?php if(!empty($eroare)): ?>
<div class="alert alert-warning" >
  <strong>Nu a fost gasit nici un video!</strong> pentru cautarea dumneavoastra <strong><?php echo e($_POST['Search']); ?><strong>
</div>

<?php else: ?>
<?php if( ! empty($videos)): ?>
<div class="alert alert-success">
  <strong>Succes!</strong> rezultatele cautarii dumneavoastra pentru cuvantul <strong><?php echo e($_POST['Search']); ?></strong> 
</div>
    <div  class="container">  
    <?php for($i = 0; $i <count($videos); $i++): ?>
    <div id="main-wrap"> <div id="video" ><?php echo $videos[$i]; ?></div><div id="title"><?php echo $titles[$i]; ?></div>
    <button type="button" class="btn btn-success" id="getRequest">getRequest</button>
    </div>
<?php endfor; ?>
<?php endif; ?>
<?php endif; ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>