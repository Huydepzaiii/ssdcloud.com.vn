<?php
/*
  Template name: Contact
 */
?>
<?php get_header(); ?>
<?php the_post();?>
<div class='banner_page' style="background-image:url(<?php echo GET_IMG(get_the_id(),'full');?>)">
	<div class='banner_content'>
		<h1 class='fs-50 fw-b'>
			<?php the_title( );?>
		</h1>
	</div>
</div>
<div class="container mg-tb-50">
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<div class='text_yellow fs-20 text-up mg-b-15'>Địa chỉ</div>
			<?php
				if(have_rows("address")){
					while (have_rows("address")) {
						the_row();
						?>
						<div class='mg-b-30'>
							<div class='text_yellow text-up fs-15'><?php the_sub_field("title");?></div>
							<div class='mg-t-7'><?php the_sub_field("content");?></div>
						</div>
						<?php
					}
				}
			?>
		</div>
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 contact_form">
			<div class='text_yellow fs-20 text-up mg-b-15'>Liên hệ</div>
			<div class="row">
				<?php echo do_shortcode('[contact-form-7 id="68" title="Contact form 1"]');?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>