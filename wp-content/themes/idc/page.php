<?php get_header(); ?>
<?php the_post();?>
<div class='banner_page' style="background-image:url(<?php echo GET_IMG(2,'full');?>)">
	<div class='banner_content'>
		<h1 class='fs-50 fw-b'>
			<?php the_title( );?>
		</h1>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p_content">
			<?php the_content();?>
		</div>
	</div>
</div>
<?php get_footer(); ?>