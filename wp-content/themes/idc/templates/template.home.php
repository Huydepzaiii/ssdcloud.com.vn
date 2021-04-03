<?php
/*
  Template name: Home
 */
?>
<?php get_header(); ?>
<?php the_post();?>
<div class='banner_page' style="background-image:url(<?php echo GET_IMG(get_the_id(),'full');?>)">
	<div class='banner_content'>
		<div class='fs-50 fw-b'>
			<?php the_field("title_banner");?>
		</div>
		<div class='fs-17 mg-t-15'>
			<?php the_field("text_banner");?>
		</div>
	</div>
</div>
<div class='container mg-tb-50'>
	<div class='task_list_slide have_nav_slide'>
		<?php
			if(have_rows("task_list")){
				while (have_rows("task_list")) {
					the_row();
					?>
					<div class='item text-center'>
						<div class=''><img src='<?php the_sub_field("image");?>'></div>
						<div class='text-up fs-20 mg-tb-15'><?php the_sub_field("title");?></div>
						<div class=''><?php the_sub_field("content");?></div>
					</div>
					<?php
				}
			}
		?>
	</div>
</div>
<div class='block_product' style="background-image:url(<?php the_field('background_product');?>)">
	<div class="container pd-tb-30">
		<div class="text-center text-white mg-t-15">
			<div class='fs-50 fw-b'><?php the_field("title_product");?></div>
			<div class='fs-17 mg-t-15'>
				<?php the_field("text_product");?><br><br>
				* Bảng giá dưới đây chưa bao gồm VAT
			</div>
		</div>
		<div class="row row_30">
			<?php
				$list_products = get_field("list_products");
				if($list_products != ""){
					foreach ($list_products as $id) {
						?>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 pd-tb-30 pd-lr-30">
							<div class='item_product'>
								<div class='title'><?php echo get_the_title($id);?></div>
								<div class='p_content fs-20'>
									<?php echo apply_filters('the_content', get_post_field('post_content', $id));?>
								</div>
								<div class='price'>
									<div class='top'><?php echo GET_INT(get_field("price",$id));?></div>
									<div class='bottom'>VNĐ/THÁNG</div>
								</div>
								<div class=''><a class='read_more'>ĐĂNG KÝ NGAY</a></div>
							</div>
						</div>
						<?php
					}
				}else{
					$args = array(
				        'posts_per_page' => 500,
				        'post_type'      => 'product'
				    );
				    $new_query = new WP_Query( $args );
				    if($new_query->have_posts()) {
				    	while ($new_query->have_posts()){
				    		$new_query->the_post();
				    		?>
				    		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 pd-tb-30 pd-lr-30">
								<div class='item_product'>
									<div class='title'><?php the_title();?></div>
									<div class='p_content fs-20'>
										<?php the_content();?>
									</div>
									<div class='price'>
										<div class='top'><?php echo GET_INT(get_field("price"));?></div>
										<div class='bottom'>VNĐ/THÁNG</div>
									</div>
									<div class=''><a class='read_more'>ĐĂNG KÝ NGAY</a></div>
								</div>
							</div>
				    		<?php
				    	}
				    }
				    wp_reset_query();
				}
				
			?>
		</div>
		<div class=''>
			<div class="">
				<div class='item_product'>
					<div class='title'>DỊCH VỤ CỘNG THÊM</div>
					<div class='p_content fs-15 pd-15'>
						<table class='table_se'>
							<tr><td width="85%" class='text-center'>Tên dịch vụ</td><td width="15%" class='text-left'>Giá(VNĐ/Tháng)</td></tr>
							<?php
								if(have_rows("table_sevicer")){
									while (have_rows("table_sevicer")) {
										the_row();
										?>
										<tr><td class='text-left'><?php the_sub_field("title");?></td><td class='text-left'><?php echo GET_INT(get_sub_field("price"));?></td></tr>
										<?php
									}
								}
							?>
						</table>
					</div>
					<div class=''><a class='read_more'>ĐĂNG KÝ NGAY</a></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bgcustomer text-center">
	<div class='fs-50 fw-b'>
		<?php the_field("title_customer");?>
	</div>
	<div class='fs-17 mg-t-15'>
		<?php the_field("text_customer");?>
	</div>
</div>
<div class="container pd-tb-30">
	<div class="row block_imgae_gen">
		<?php
			$image_customer = get_field("image_customer");
			foreach ($image_customer as $item) {
				?>
				<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
					<img src='<?php echo $item["url"];?>'>
				</div>
				<?php
			}
		?>
	</div>
</div>
<div class='bg_gray'>
	<div class="container pd-tb-50">
		<div class="row text-center">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class='fs-50 fw-b'>
					<?php the_field("title_why_list");?>
				</div>
				<div class='fs-17 mg-t-15'>
					<?php the_field("text_why_list");?>
				</div>
			</div>
		</div>
		<div class="row pd-t-30">
			<?php
				$page_list = get_field("page_list");
				foreach ($page_list as $id) {
					?>
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-center pd-tb-15">
						<div class=''><img class="mh_80" src='<?php echo GET_IMG($id,"full");?>'></div>
						<div class='text-up fs-20 mg-tb-15'><a href='<?php echo get_permalink($id);?>'><?php echo get_the_title($id);?></a></div>
						<div class='m_pin'><?php echo wp_trim_words(apply_filters('the_content', get_post_field('post_content', $id)), 25, '...' );?></div>
						<div class='mg-t-15'><a class='read_more' href='<?php echo get_permalink($id);?>'>ĐỌC THÊM</a></div>
					</div>
					<?php
				}
			?>
		</div>
	</div>
</div>
<?php get_footer();?>