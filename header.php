<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mateo Tišljar">

	<title><?php echo get_bloginfo( 'name' ); ?></title>
	<link href="wp-content/themes/wp_tema/css/blog.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="wp-content/themes/wp_tema/js/javascript.js"></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
	<?php wp_head();?>
        <?php register_default_headers( $headers ); ?>

</head>

<body>
    <div class="blog-masthead">
        <div class="blog-logo">
            <div class="blog-logo-div">
                <?php
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                if ( has_custom_logo() ) {
                    echo '<img src="'. esc_url( $logo[0] ) .'" height="';
                    echo get_custom_logo()->height ;
                    echo '" width="'. get_custom_logo()->width .'">';
                } else {
                    echo '<h1>'. esc_attr( get_bloginfo( 'name' ) ) .'</h1>';
                }
                ?>
                <div>
                    <h3 class="blog-title"><a href="<?php bloginfo( 'wpurl' );?>"><?php echo get_bloginfo( 'name' ); ?></a></h3>
                </div>
                
            </div>
            
        </div>
	
    </div>
    <div class="nav">
            <nav class="blog-nav">
                <li class="page_item page-item-1"><a class="blog-nav-item active" href="index.php">News</a></li>
                    <?php wp_list_pages( '&title_li=' ); ?>
            </nav>
    </div>
	<div class="container">
            <header>
                <img class="banner-img" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
            </header>
            
            