<?php $__env->startSection('title'); ?>
	Slides
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1>Lista slideuri despre <strong><?php echo $_POST["tag_slideuri"]?></strong>:</h1>
<!--<img src="images.jpg" alt="Mountain View" style="width:304px;height:228px;">-->

<?php $count=1;?>
<?php foreach($tot as $slide): ?>
	<?php print $slide ?>

	<br>
	<p>SlideShow <?php echo $count; $count+=1;?></p>

<?php endforeach; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>