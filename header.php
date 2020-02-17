<?php
/**
 * The Header for our theme.
 * 
 *
 * @package wp_businessbox
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php wp_title( '|', true, 'right' ); ?></title>        
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="Content-Type" content="text/html;charset=ansi">    
<meta name="description" content="<?php bloginfo('description'); ?>">    
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.gif"/>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="container"><!-- main container starts-->
    <div id="wrapp"><!-- main wrapp starts-->
        <header id="header"><!--header starts -->
        <div class="container">
            <div id="header-top">
                <a href="index.html" id="logo"><img src="<?php echo IMAGES ?>/logo.png" alt=""/></a><!--your logo-->
                <div id="header-links">
                    <ul class="social-icons header"><!-- header social links starts-->
                        <li><a href="https://twitter.com/@k9_insights"><i class="icon-social-twitter"></i></a></li>
                        <li><a href="https://www.facebook.com/majestick9group" target="_blank"><i class="icon-social-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-social-linkedin"></i></a></li>
                        <!-- <li><a href="#"><i class="icon-social-gplus"></i></a></li> -->
                    </ul><!--header social links ends -->
                    <h4>Call Us: <span>+234 706 049 4086</span></h4><!--contact phone number-->
                </div>
            </div>
        </div>
        <div id="main-navigation"><!--main navigation wrapper starts -->
            <div class="container">
                <div class="container">
                <?php
                    $defaults = array(
                        'theme_location'  => 'primary',
                        'menu'            => '',
                        'container'       => 'div',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'menu',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0                    
                    );
                wp_nav_menu( $defaults ); 
                if (is_active_sidebar("top-sidebar"))
                  {
                  ?>
                  <div class="top-widget">
                  <?php
                     dynamic_sidebar("top-sidebar");
                  ?>
                  </div>
                  <?php
                  }
                  ?>
                <nav class="top-search"><!-- search starts-->
                <?php get_search_form(); ?>
                </nav><!--search ends -->
            </div>
        </div><!--main navigation wrapper ends -->
        </header><!-- header ends-->
<div id="content">
<?php
 if (!is_home() && !is_front_page() && (basename(get_page_template())!='homepage.php'))
        {        
            ?>
            <div id="breadcrumb" class=""><!-- breadcrumb starts-->
                    <div class="container">
                        <div class="one-half">
                            <h4><?php                         
                            if (is_category())
                            {
                                echo single_cat_title();
                            } else
                            if (is_single()) {            
                                get_the_title($pid); 
                            }
                         elseif (is_page()) {                             
                            echo get_the_title($pid); 
                        }else if (is_search())
                        {
                            echo __("Search results","majestick9group");
                        } else if (is_404())
                        {
                            echo __("Page not found","majestick9group");
                        }
                        ?> </h4>
                        </div>
                        <div class="one-half last">
                            <nav id="breadcrumbs"><!--breadcrumb nav starts-->
                            <ul>
                                <li><?php echo __("You are here:","businessbox"); ?></li>
                                <li><?php bb_breadcrumbs(); ?></li>                            
                            </ul>                                                      
                            </nav><!--breadcrumb nav ends -->
                        </div>
                    </div>
                </div>        
            <?php
        }
