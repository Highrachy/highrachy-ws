<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <?php if (isset($dashboard) && ($dashboard)) { ?>
        <link rel="stylesheet" href="css/fonts_icons.css">
        <link rel="stylesheet" href="css/dashboard.css">
        <?php } else { ?>
        <link rel="stylesheet" href="css/sprites_icons.css">
		<?php } ?>
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

     <!--Top Container-->
        <div class="container">
    	<!--Top Content-->
    	<header id="top" class="row">
        	<!--Logo-->
        	<div class="span3"><div id="logo" class="ir"><h1>Highrachy</h1></div></div>
            
            <!--Navigation-->
            <div class="span9">
            	<nav>
                   <ul id="top-nav" class="unstyled alignright">
                      <li><a href="index2.php"<?php if ($title=='index') echo 'class="stays-active" ' ?>>Home</a></li>
                      <li><a href="about.php"<?php if ($title=='about') echo 'class="stays-active" ' ?>>About Us</a></li>
                      <li><a href="expertise.php"<?php if ($title=='expertise') echo 'class="stays-active" ' ?>>Expertise</a></li>
                      <li><a href="solutions.php"<?php if ($title=='solutions') echo 'class="stays-active" ' ?>>Solutions</a></li>
                      <li><a href="products.php"<?php if ($title=='products') echo 'class="stays-active" ' ?>>Products</a></li>
                      <li><a href="contact.php"<?php if ($title=='contact') echo 'class="stays-active" ' ?>>Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            <!--End of Navigation-->
        </header>
        <!-- End of Top Content -->