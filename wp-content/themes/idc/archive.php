<?php get_header(); ?>
<?php $obj = get_queried_object();?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pd-0">
			<?php
				if(have_posts()) {
					$i=1;$st = $sk = "";
			    	while (have_posts()){
			    		the_post();
			    		if($i==1){
			    			?>
			    			<div class='blog_item'>
			    				<div class='content_blog'>
			    					<a href='<?php the_permalink();?>'>
			    						<img src='<?php echo GET_IMG(get_the_id());?>'>
			    					</a>
			    					<h3 class="bg_item_blog">
				    					<a href='<?php the_permalink();?>' class='title_block fs-25'>
						    				<?php the_title();?>
						    			</a>
						    		</h3>
			    				</div>
			    			</div>
			    			<?php
			    		}elseif($i < 6){
			    			ob_start();
			    			?>
			    			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pd-0">
			    				<div class='blog_item blog_item_2'>
				    				<div class='content_blog'>
				    					<a href='<?php the_permalink();?>'>
				    						<img src='<?php echo GET_IMG(get_the_id());?>'>
				    					</a>
				    					<h3 class="bg_item_blog">
					    					<a href='<?php the_permalink();?>' class='title_block fs-17'>
							    				<?php the_title();?>
							    			</a>
							    		</h3>
				    				</div>
				    			</div>
			    			</div>
			    			<?php
			    			$dt = ob_get_clean();
			    			$st.=$dt;
			    		}else{
			    			ob_start();
			    			?>
			    			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mg-tb-15">
			    				<div class='item_blog_ac'>
			    					<a href='<?php the_permalink();?>'>
			    						<img src='<?php echo GET_IMG(get_the_id());?>'>
			    					</a>
			    					<h3 class='pd-15'>
				    					<a href='<?php the_permalink();?>' class='fs-15'>
						    				<?php the_title();?>
						    			</a>
						    		</h3>
			    				</div>
			    			</div>
			    			<?php
			    			$dt = ob_get_clean();
			    			$sk.=$dt;
			    		}
			    		$i++;
			    	}
			    }
			?>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="row">
				<?php echo $st;?>
			</div>
		</div>
	</div>
</div>
<div class="container mg-t-30">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			<div class="row">
				<?php echo $sk;?>
			</div>
			<div class='text-center mg-tb-50'>
				<?php wp_pagenavi();?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<div class='ititle'>Tin tức nổi bật</div>
			<?php
				$args = array(
			        'posts_per_page' => 10,
			        'post_type'      => 'post'
			    );
			    $new_query = new WP_Query( $args );
			    if($new_query->have_posts()) {
			    	while ($new_query->have_posts()){
			    		$new_query->the_post();
			    		?>
			    		<div class="row mg-tb-30">
			    			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 pd-r-7">
			    				<a href='<?php the_permalink();?>'>
		    						<img class='h_img_top' src='<?php echo GET_IMG(get_the_id());?>'>
		    					</a>
			    			</div>
			    			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 pd-l-0">
			    				<h3>
			    					<a href='<?php the_permalink();?>' class='fs-13'>
					    				<?php the_title();?>
					    			</a>
					    		</h3>
			    			</div>
			    		</div>
			    		<?php
			    	}
			    }
			    wp_reset_query();
			?>
		</div>
	</div>
</div>
<?php get_footer();?>