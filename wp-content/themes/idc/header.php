<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php wp_head();?>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
	<link type="image/x-icon" href="<?php echo THEME_URL;?>/images/favicon.ico" rel="shortcut icon">
</head>
<body>
	<header>
		<div class='header_top'>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ul class='main_menu'>
							<li><a href='<?php echo home_url();?>'><img src='<?php the_field("logo","option");?>'></a></li>
							<li><a href='<?php echo home_url();?>/colocation'>Dịch vụ Colocation</a></li>
							<li><a href='<?php echo home_url();?>/tin-tuc'>TIN TỨC</a></li>
							<li><a href='<?php echo home_url();?>/lien-he'>LIÊN HỆ</a></li>
							<li><a class='tell_phone' href='tel:<?php the_field("hotline","option");?>'><?php the_field("hotline","option");?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121891756-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
 
  gtag('config', 'UA-121891756-1');
</script>
	</header>
