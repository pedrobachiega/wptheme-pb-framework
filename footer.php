
  <footer>
		<div class="footer-widget widget_search" id="footer-info">
			<p>Proudly powered by <a href="http://wordpress.org/" target="_blank">Wordpres</a></p>
      <span class="rss-link"><a href="<?php bloginfo('rss2_url'); ?>" target="_blank" rel="alternate" title="RSS 2.0">RSS</a></span>
	  	<!-- <?php echo get_num_queries(); ?> queries in <?php timer_stop(1); ?> seconds. -->
		</div>

  	<?php if ( ! dynamic_sidebar( 'footer-area' ) ) : ?>
		<?php endif; ?>
  </footer>

</div>
<script type="text/javascript">
(function($){
  $(document).ready(function(){
    
  });
})(jQuery);
</script>
<?php wp_footer(); ?>
</body>
</html>