<footer>
	<div class="container">
		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<a href='http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=41384' target="_blank"><img src='<?php echo home_url();?>/wp-content/uploads/logo.png'></a>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center">
				<?php the_field("footer","option");?>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>