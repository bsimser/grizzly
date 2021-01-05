<footer class="rtf">
	<?php get_footer('pre'); ?>
	
	<div id="footer-content" class="clearfix container">
		<div id="footer-menu">
			<?php wp_nav_menu( array( 'container' => '', 'theme_location' => 'footer', 'fallback_cb' => 'footer_nav_fb', 'depth' => 1 ) ); ?>
		</div>
		
		<div id="copyright"><?php echo stripslashes( theme_options('footer', 'footer_copyright_text') ); ?></div>	
	</div><!-- #footer-content -->
	
</footer>

<?php if( theme_options('advance', 'show_customize') == 'on' ) get_template_part('section', 'customize'); ?>

<?php if( theme_options('advance', 'analytic_ua') != '' ): ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo theme_options('advance', 'analytic_ua'); ?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php endif; ?>

<?php wp_footer(); ?>



</body>
</html>