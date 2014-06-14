<?php include dirname(__FILE__) . '/../alert.php'; ?>

<?php if ( isset( $title ) ):?>
	<h1 class="page-header"><?php echo $title; ?></h1>
<?php endif; ?>

<p class="lead"><?php echo ( isset( $content ) ) ? $content : ''; ?></p>