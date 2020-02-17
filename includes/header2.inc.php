            <?php
                if (!isset($db)){
                    $db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                }
                #-############################################
                # Get all the contact information
                #-############################################

                $query = "SELECT address, mobile1, land,facebook, twitter, linked FROM contact WHERE id='1'";
                $table = $db->fetch_first_row($query);
                $address = $table['address'];
                $mobile1 = $table['mobile1'];
                $facebook = $table['facebook'];
                $twitter = $table['twitter'];
                $linked = $table['linked'];

                $query = "SELECT id,link,name FROM expertise WHERE link <> 0 LIMIT 4";
                $rows = $db->fetch_all_row($query);
                $service = "";
                foreach ($rows as $row){
                    $service .= '<li><a href="expertise.php?page='.$row['link'].'">'.$row['name'].'</a></li>';
                }

            ?>
<?php if (!isset($title)) $title = "index";?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Highrachy investment and Technology Limited | <?php echo ucfirst($title) ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <!-- favicon.ico and apple-touch-icon.png -->
        <link rel="shortcut icon" href="favicon.png">
        <link rel="apple-touch-icon" href="apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-144x144-precomposed.png">

        <link rel="stylesheet" href="css/highrachy.css">
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
    <header>
        <div id="navigation" class="row">

          <div id="logo-region" class="col-md-3 text-center-sm">
            <a href="<?php echo BASE_URL ?>"><img src="img/highrachy_logo.png" alt="logo" class="img-responsive" /></a>
          </div> <!-- /logo-region -->

          <div class="col-md-9">
            <nav class="navbar highrachy-menu" role="navigation">
              <!-- Menu button for mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">MENU</button>
              </div>

              <!-- Navigation links -->
              <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul id="top-nav"  class="nav navbar-right navbar-nav">
                  <?php if (isset($dashboard) && ($dashboard)) { ?>
                            <li><a href="dashboard.php"<?php if ($title=='dashboard') echo 'class="stays-active" ' ?>>Dashboard</a></li>
                            <li><a href="about-content.php"<?php if (isset($sub_title) && ($sub_title=='about_content')) echo 'class="stays-active" ' ?>>About Us</a></li>
                            <li><a href="dashboard_expertise.php"<?php if  (isset($sub_title) && ($sub_title=='dashboard_expertise')) echo 'class="stays-active" ' ?>>Expertise</a></li>
                            <li><a href="dashboard_solutions.php"<?php if  (isset($sub_title) && ($sub_title=='dashboard_solutions')) echo 'class="stays-active" ' ?>>Solutions</a></li>
                            <li><a href="dashboard_product.php"<?php if ($title=='dashboard_product') echo 'class="stays-active" ' ?>>Products</a></li>
                            <li><a href="logout.php">Logout</a></li>
                            <?php } else { ?>
                            <li><a href="index.php"<?php if ($title=='index') echo 'class="stays-active" ' ?>>Home</a></li>
                            <li><a href="about.php"<?php if ($title=='about') echo 'class="stays-active" ' ?>>About Us</a></li>
                            <li><a href="expertise.php"<?php if ($title=='expertise') echo 'class="stays-active" ' ?>>Expertise</a></li>
                            <li><a href="solutions.php"<?php if ($title=='solutions') echo 'class="stays-active" ' ?>>Solutions</a></li>
                            <!-- <li><a href="products.php"<?php if ($title=='products') echo 'class="stays-active" ' ?>>Products</a></li> -->
                            <li><a href="projects.php"<?php if ($title=='projects') echo 'class="stays-active" ' ?>>Projects</a></li>
                            <li><a href="contact.php"<?php if ($title=='contact') echo 'class="stays-active" ' ?>>Contact Us</a></li>
                            <?php } ?>

                </ul>
              </div> <!-- /navbar-collapse -->
            </nav>
          </div> <!-- /menu-region -->

        </div> <!-- /row -->
    </header>
      <!-- End of Top Content -->
