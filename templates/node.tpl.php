<h2><?php echo $this->title?></h2>
<div class="nodeBorderBackground">
	<div class="nodeContent">
		<?php foreach ( $this->contents as $content ): ?>
			<?php echo $content; ?>
		<?php endforeach; ?> 
	</div>
</div>