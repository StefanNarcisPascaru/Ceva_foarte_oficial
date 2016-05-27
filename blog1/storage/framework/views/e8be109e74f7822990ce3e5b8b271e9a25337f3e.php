<?php $__env->startSection('content'); ?>
<?php echo Form::open(array('route' => 'vimeo.api')); ?>

    <?php echo e(Form::label('Search','Search:(Null Default)')); ?>

    <?php echo e(Form::text('Search',null,array('class'=>'form-control'))); ?>

    <?php echo e(Form::submit('Search',array('class' => 'btn btn-succes btn-lg btn-block'))); ?>

<?php echo Form::close(); ?>

<?php if( ! empty($videos)): ?>
<?php $count=1;?>
<?php foreach($videos as $video): ?>
	<?php print $video ?>

	<br>
	<p>Video <?php echo $count; $count+=1;?></p>
<?php endforeach; ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>