<?php if ( isset( $message ) && isset( $status ) ): ?>
	<div class="alert <?php echo ( $status ) ? 'alert-success' : 'alert-danger'; ?>"><?php echo $message; ?></div>
<?php endif; ?>