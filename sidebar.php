  <section id="sidebar">
  <?php if ( ! dynamic_sidebar( 'sidebar-area' ) ) : ?>

		<div class="sidebar-widget widget_search" id="sidebar-search">
			<?php get_search_form(); ?>
		</div>

		<div class="sidebar-widget" id="sidebar-archives">
			<h3 class="widget-title"><?php _e( 'Archives', 'pbsimpletheme' ); ?></h3>
			<ul>
				<?php wp_get_archives( 'type=monthly' ); ?>
			</ul>
		</div>

		<div class="sidebar-widget" id="sidebar-meta">
			<h3 class="widget-title"><?php _e( 'Meta', 'pbsimpletheme' ); ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</div>
		
	<?php endif; ?>
  </section>
