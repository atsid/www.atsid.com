<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage ATS
 */
?>
	
	
	<footer role="contentinfo">
		<div class="content-container" id="footerTop">
			<a class="sdvosbLogo" href="https://www.vip.vetbiz.gov/Public/Search/ViewSearchResults.aspx?SCID=1304415" target="_blank"><img src="<?php echo bloginfo('template_url'); ?>/images/sdvosb-logo.png" alt="SDVOSB" /></a>
			<div class="contactLinks">
				<a class="emailAddress" href="mailto:inquire@atsid.com">inquire@atsid.com</a>
				<a class="phoneNumber" href="tel:8558432832">(855) 843-2832</a>
			</div>
			<div class="social-links">
				<a class="facebook" href="https://www.facebook.com/AppliedTechnicalSystems" target="_blank"></a>
				<a class="twitter" href="http://twitter.com/ats_inc" target="_blank"></a>
				<a class="linkedin" href="http://www.linkedin.com/company/applied-technical-systems" target="_blank"></a>
				<a class="github" href="https://github.com/atsid" target="_blank"></a>
			</div>
		</div>
		
		<div id="footerLegal"><div class="content-container">
			<?php wp_nav_menu(array('container' => '', 'menu_class' => 'footer-legal-menu', 'theme_location' => 'footer_menu_1')); ?>
			<p class="copyright">&copy; 2014 Applied Technical Systems. All Rights Reserved</p>
		</div></div>
	</footer>		
</div>

<?php wp_footer(); ?>
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-xxxxxxxx-x']);
	_gaq.push(['_setDomainName', '']);
	_gaq.push(['_trackPageview']);
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
    
</body>
</html>
