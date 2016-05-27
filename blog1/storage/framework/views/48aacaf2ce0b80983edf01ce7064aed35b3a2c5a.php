<?php $__env->startSection('title'); ?>
	Slides
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1>Lista slideuri despre <strong><?php echo $_POST["tag_slideuri"]?></strong>:</h1>
<!--<img src="images.jpg" alt="Mountain View" style="width:304px;height:228px;">-->

<?php $count=1;?>
<?php if($tot==null): ?>
	<h3><?php echo "Please, change search settings!"?></h3>
	<img src="no-result.png" alt="no-result">
<?php else: ?>
<?php foreach($tot as $slide): ?>
	<?php echo $slide; ?>

	
	<p>SlideShow <?php echo $count; $count+=1;?></p>
<br>
<?php endforeach; ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>