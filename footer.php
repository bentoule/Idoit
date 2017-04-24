<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer class="text-center bd-footer">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<p>Copyright ©
					<?php echo date('Y'); ?>
					<a href="<?php $this->options->siteUrl(); ?>">
						<?php $this->options->title(); ?>
					</a>.
					<?php _e('由 <a href="http://www.typecho.org">Typecho</a> 强力驱动'); ?>.
					<?php _e('Theme is <a href="https://github.com/bentoule/Idoit">Idoit</a> '); ?>.</p>
			</div>
		</div>
	</div>
</footer> 
</div> 
</body> 
</html>

