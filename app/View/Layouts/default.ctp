<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');

?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->script('jquery'); ?>
    <?php //echo $this->Html->script('students.main'); ?>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">

		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>

	</div>

</body>
</html>
