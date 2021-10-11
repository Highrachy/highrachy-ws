<?php

function alert(){
  global $errors, $success,$warning;

   if (isset($errors)){
    $allerror = "";
    foreach($errors as $value){
      $allerror .= "$value <br>";
    }

    echo '<br><div class="alert alert-error alert-block"><h4>Error!</h4>'.$allerror.'</div>';

  }

  else if (isset($success)){
    echo '<div class="alert alert-success"><strong>Success! </strong>'.$success.'</div>';
    }

  else if (isset($warning)){
    echo '<div class="alert"><strong>Warning! </strong>'.$warning.'</div>';
  }
}

function show_errors($name,$help_text="",$error_class="error",$help_class="help-block"){
  global $errors;
  if (isset($errors[$name])){
    echo '<div class="'.$error_class.'">'.$errors[$name].'</div>';
  } else {
    if (!empty($help_text))
    echo '<div class="'.$help_class.'">'.$help_text.'</div>';
  }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  // Check for the Users Name
  if (preg_match ('/^[A-Z0-9 \'.-]{2,60}$/i', $_POST['name'])) {
    $name = $_POST['name'];
  } else {
    $errors[] = 'Please enter a valid Name!';
  }


  // Check for the phone number
  if (!(empty($_POST['phone']))) {
    $phone = $_POST['phone'];
  } else {
    $errors[] = 'Please enter a desired phone Number';
  }

  // Check for an email address:
  if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $email = $_POST['email'];
  } else {
    $errors[] = 'Please enter a valid email address!';
  }

  // Check for the address
  if (!(empty($_POST['message']))) {
    $body = $_POST['message'];
  } else {
    $errors[] = 'Please enter your message';
  }

  if (empty($errors)) { // If everything's OK...

      $subject = "Highrachy WeProtect Feedback - From ($name) ";
      $ourEmail = "david@highrachy.com";

      //Send the message to us
      $headers = "From: {$name}\r\nReply-To: {$ourEmail}\r\n";
      @mail($ourEmail, $subject, $body,$headers);
      $success = "Your message has been successfully received";
      unset($_POST);
      $_POST = array();

  } // End of empty($errors) IF.

}//End if POST


require('inc/form.php');


?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title>Highrachy We Protect</title>
  <meta name="description" content="Welcome To Highrachy WeProtect by Highrachy. Our unrivaled vehicle resilience solutions are superior to any other solutions in the industry ensuring that your protection is guaranteed. Our solutions are proven to be an integral part of all good vehicle management programs.">
  <meta name="author" content="Popoola Haruna">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- CSS Stylesheet -->
  <link rel="stylesheet" href="css/style1.css" id="colors">

  <!-- Google Webfonts - Lato -->
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic' rel='stylesheet'>

  <!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

<!-- A few scripts that need to be in the head section -->
<script src="js/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
<script src="js/respond.min.js"></script>
<script src="js/jquery.flexslider.js"></script>

<!-- Flexslider jQuery -->
<script type="text/javascript">
  $(window).load(function() {
    $('#main-slider').flexslider({
    });
    $('.flexslider').flexslider({
    	animation: 'slide'
    });
  });
</script>


</head>
<body id="home" data-spy="scroll" data-offset="83" data-target=".navbar">

  <!-- SCROLL TO TOP BUTTON -->
  <a href="#" class="scrollup"><span data-icon="&#xe005;" aria-hidden="true"></span></a>

  <!--////////// HEADER SECTION ///////////-->
  <section id="header">

    <header>
      <!-- Bootstrap's responsive navbar -->
      <nav class="navbar" role="navigation">
        <div class="container">

              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle animated fadeInRight collapsed" data-toggle="collapse" data-target="#main-menu">
                  <span class="sr-only">Menu</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>


          <!-- the logo - to put your own image, you need to change the image link in the style.css file -->
          <a class="navbar-brand logo animated fadeInLeft" href="index.php">Highrachy WeProtect</a>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-responsive-collapse animated fadeInRight" id="main-menu">
              <ul class="nav navbar-nav pull-right">
                  <li class="active"><a href="#home">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#solutions">Our Solutions</a></li>
                    <li><a href="#products">Our Products</a></li>
                    <li><a href="#contact">Contact Us</a></li>
              </ul><!-- end nav -->
            </div><!-- /.navbar-collapse -->

        </div><!-- end container -->
      </nav><!-- end navbar -->

    </header>

  </section><!-- end HEADER SECTION -->


  <!--////////// SLIDER SECTION ///////////-->
  <section id="slider">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <?php alert() ?>
        </div>


      </div><!-- end row -->
    </div><!-- end container -->
  </section><!-- end SLIDER SECTION -->

  <!--////////// SLIDER SECTION ///////////-->
  <section id="slider">
  	<div class="container">
  		<div class="row">
        <div class="col-sm-12">

          <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                  <img src="img/slide1.jpg" alt="Slideshow Image" title="" />
              </li>
              <li>
                  <img src="img/slide2.jpg" alt="Slideshow Image" title="" />
              </li>
            </ul><!-- end slides -->
          </div><!-- end main slider -->
        </div>


  		</div><!-- end row -->
  	</div><!-- end container -->
  </section><!-- end SLIDER SECTION -->

  <div class="background">
    <div class="container content">

    <!--////////// ABOUT  SECTION ///////////-->
    <section id="about">
      <div class="light-bg">
        <div class="row">

          <div class="col-md-10 col-md-push-1">
            <div class="hero-quote">
              <h1>Welcome To Highrachy WeProtect by Highrachy</h1>
              <p class="lead">Our unrivaled vehicle resilience solutions are superior to any other solutions in the industry ensuring that your protection is guaranteed. Our solutions are proven to be an integral part of all good vehicle management programs.</p>
            </div><!-- end hero-quote -->
          </div><!-- end col-md-10 col-offset-1 -->


        </div><!-- end row -->
        </div>
    </section><!-- end ABOUT SECTION -->


     <!--////////// SOLUTIONS SECTION ///////////-->
    <section id="solutions" class="spacing">
      <div class="row">

       <div class="col-xs-12">
         <div class="title">
           <h1>Our Solutions</h1>
           <p class="lead">Our solutions are engineered by the best to ensure that your protection is <strong>guaranteed</strong>. They are also modular and have proven to be an integral part of various good vehicle management programs. Our vehicle resilience package comprises of two core components :</p>
         </div><!-- end title -->
         <div class="title-hr"></div>

         <!--/// THE FEATURE ICONS ///-->
         <div class="col-md-6">
           <figure>
           	 <img src="img/photo7.jpg" class="thumb" style="width:200px" alt="" class="slide-up" />
             <h3><a href="#tyre-sealant">Tyre Anti Puncture</a></h3>
             <p class="feature-description">Our <strong>Tyre anti-puncture</strong> solution instantly and permanently seals varying sizes of punctures to your vehicle tyres. This is achieved by installing a <strong>Tyre Sealant</strong> inside the tyre or tube after it must have undergone a health check and tyre repair process. </p>
           </figure>
         </div><!-- end col-md-3  -->

         <div class="col-md-6">
           <figure>
           	 <img src="img/photo2.jpg" class="thumb" style="width:200px"  alt="" class="slide-up" />
             <h3><a href="#window-film">Window Shatter Proofing</a></h3>
             <p class="feature-description">Our <strong>Window shatter proofing</strong> solution prevents windows from shattering when smashed and ultimately
             stalls an intruder's access while protecting the passengers and glass cuts and injuries. This achieved by attaching special window films to our vehicle windows</p>
           </figure>
         </div><!-- end col-md-3  -->
       </div>

      </div><!-- end row --><!-- end container -->
    </section><!-- end SOLUTIONS SECTION -->


    <!--////////// PRODUCTS SECTION ///////////-->
    <section id="products">
      <div class="row push-bottom border">
        <div class="col-xs-12">
          <div class="col-sm-offset-1 col-sm-10">

            <div class="title">
              <h1>Our Products</h1>
              <p class="lead">Our unrivaled vehicle resilience solutions are superior to any other solutions in the industry ensuring that your protection is guaranteed.</p>
            </div><!-- end title -->
            <div class="title-hr"></div>
          </div>

          <div class="col-sm-5 col-sm-push-6 slide-right">
            <img src="img/photo8.jpg" class="thumb" alt="" title="" />
          </div><!-- end end col-sm-5 -->

          <div  id="tyre-sealant" class="col-sm-5 col-sm-pull-4 slide-left">
            <h2>Tyre Sealant</h2>
            <p class="lead text-justify">Our tyre sealants can be used in any pneumatic tyre and are used for permanent puncture prevention in a wide range of on and off road vehicles. These sealants instantly and permanently seal up punctures ranging up to 15mm for on road vehicles and our higher grade sealant seals punctures ranging up to 30mm for off road equipments.</p>
            <a id="tsbtn" class="btn btn-primary btn-large" href="#tsmore">Learn More</a>
          </div><!-- end col-sm-5 col-offset-1 -->

          <div id="tsmore" class="more-content tyre-sealant">
            <div class="col-sm-10 col-sm-offset-1">
              <h3>How it Works</h3>
                <p class="lead dark text-justify">As the tyre rotates, the product spreads evenly over the inside surface. Immediately a puncture occurs, the air pressure in the tyre forces millions of fiber particles and fillers suspended in the sealant to interlock and form a plug which prevents any further air loss. This action will be complete within two or three revolutions of the wheel.</p>
                <p>This is a mechanical process not a chemical reaction and it happens so fast that the driver may not know a puncture occured.</p>

            </div>
            <div class="col-sm-5 col-sm-offset-1 slide-left">
             <h3>Benefits of Tyre Sealants</h3>
              <ul class="text-justify">
              	 <li>Cost Savings on;
              	 	<ul>
              	 		<li>Frequency of tyre replacement</li>
              	 		<li>Reduced call out for punctures and increases the tyre life</li>
              	 		<li>Fuel costs via standardized PSI</li>
              	 	</ul>
              	 </li>
                 <li>Protects against under inflation of the tyre</li>
                 <li>Reduces operational cost and downtime</li>
                 <li>Heat reduction (number 1 killer of tyres)</li>
                 <li>Protection against rust and corrosion of the wheels</li>
                 <li>Reduces flats and blow outs.</li>
                 <li>Increases positive vehicle maintenance</li>
              </ul>
            </div>

            <div class="col-sm-5 slide-right">
              <h3>Who Uses Tyre Sealants?</h3>
              <p>Tyre sealants are now widely used by major companies worldwide including:</p>
              <ul>
                <li>Private Car Owners</li>
                <li>Armed Forces </li>
                <li>Private Security Companies</li>
                <li>Banks and Financial Institutions</li>
                <li>Governmental Department and Aid agencies</li>
                <li>Waste Management, Demolition Industries</li>
                <li>Mining Industries</li>
                <li>Transport and Car Hire Operators</li>
              </ul>
            </div>

          </div>

        </div>

      </div><!-- end row --><!-- end container -->

      <div class="spacing">
        <div class="row push-bottom border">

          <div class="col-sm-5 col-sm-push-1 slide-left">
            <img src="img/photo4.jpg" class="thumb" alt="" title="">
          </div><!-- end col-sm-5 col-offset-1 -->

          <div id="window-film" class="col-sm-5 col-sm-push-1 slide-right">
            <h2>Window Film</h2>
            <p class="lead text-justify">Our shatter proof security clear window film is the ultimate protection against the most severe attack situations. Our high grade, high tech window protects attacks on vehicle while stationary or in motion and safeguard users.</p>
            <a id="wfbtn" class="btn btn-primary btn-large" href="#wfmore">Learn More</a>
          </div><!-- end end col-sm-5 -->

          <div id="wfmore" class="more-content tyre-sealant">
            <div class="col-sm-10 col-sm-offset-1">
              <h3>How it Works</h3>
                <p class="lead dark text-justify">Our safety security film 800 (SSF-800), 8MIL - PLY 2, a 90% visible light transmission (VLT) film is installed
                at the inner, outer or both inner and outer side of vehicle windows leaving the windows shatter proof. <br> Our window film can withstand very hard impact/blows and does not collapse. In cases where the window shatters the film holds the shattered pieces together and this still doesn't penetrate the film
                keeping the occupants\users of the vehicle safe and secured.</p>

            </div>
            <div class="col-sm-5 col-sm-offset-1 slide-left">
             <h3>Benefits of Window Films</h3>
               <ul class="text-justify">
                   <li>Makes driving more comfortable, in the sense that you feel more secure.</li>
                   <li>Creates safer and more secure vehicles for users.</li>
                   <li>Deflects a substantial percentage of the sun leaving the vehicle cool in temperature.</li>
                   <li>Protects against perils of hazards and risks e.g attacks, accidents and bomb blasts e.t.c.</li>
               </ul>
            </div>

            <div class="col-sm-5 slide-right">
              <h3>Who Uses Window Film?</h3>
              <p>Window films are now widely used by major companies worldwide including:</p>
              <ul>
                <li>Private Car Owners</li>
                <li>Armed Forces </li>
                <li>Private Security Companies</li>
                <li>Banks and Financial Institutions</li>
                <li>Governmental Department and Aid agencies</li>
                <li>Waste Management, Demolition Industries</li>
                <li>Mining Industries</li>
                <li>Transport and Car Hire Operators</li>
              </ul>
            </div>

          </div>

        </div><!-- end row --><!-- end container -->
      </div><!-- end light-bg -->
    </section><!-- end PRODUCTS SECTION -->

    <!--////////// CONTACT SECTION //////////-->
    <section id="contact" class="spacing">
      <div class="row">

        <div class="title">
          <h1>Get in Touch</h1>
          <p class="lead">Feel free to ask any questions via the contact form below.</p>
        </div><!-- end title -->
        <div class="title-hr-dark"></div>

        <div class="col-sm-4">
          <h3>Our Contact Details</h3>
          <p class="lead">
           C 10 Yamade Shopping Complex, <br>
           Lekki-Epe Expressway,<br>
           Awoyaya, Lagos.<br>
          <a href="mailto:info@highrachy.com">info@highrachy.com</a><br>
          +234 803 505 3278
          </p>
        </div><!-- end col-sm-5 -->

        <div class="col-sm-7 contact-form spacing">

          <div id="contact-error"></div>

          <form id="contact-form" class="form-horizontal" method="POST"><!-- id="ajax-contact-form" -->
            <div class="form-group">
              <label for="name" class="col-md-3 control-label">Your Name</label>
              <div class="col-md-9">
                <?php Text('name','','class="form-control" placeholder="Your Name" required') ?>
                <?php show_errors('name') ?>
              </div>
            </div><!-- end form-group -->

            <div class="form-group">
              <label for="email" class="col-md-3 control-label">Your E-mail</label>
              <div class="col-md-9">
                <?php Email('email','','class="form-control" placeholder="youremail@domain.com" required') ?>
                <?php show_errors('email') ?>
              </div>
            </div><!-- end form-group -->


            <div class="form-group">
              <label for="phone" class="col-md-3 control-label">Phone Number</label>
              <div class="col-md-9">
                <?php Text('phone','','class="form-control" placeholder="+234801 234 5678" required') ?>
                <?php show_errors('phone') ?>
              </div>
            </div><!-- end form-group -->

            <div class="form-group textarea">
              <label for="message" class="col-md-3 control-label">Message</label>
              <div class="col-md-9">

                <?php Textarea('message','','class="form-control" placeholder="Type your message here..." required') ?>
                <?php show_errors('message') ?>
              </div>
            </div><!-- end form-group -->

            <input type="hidden" name="save" value="contact">
            <div class="col-sm-offset-6">
            <button class="btn btn-large btn-primary" type="submit" name="submit">Send Message!</button>
            </div>
          </form>

        </div><!-- end col-sm-7 -->
      </div><!-- end row --><!-- end container -->
    </section><!-- end CONTACT SECTION -->

    </div>
  </div>


    <footer>
            <div class="container">
                <div class="col-sm-4">
                                <h3>Contact Us</h3>
                                <address>
                                <p class="home"><span> Address : </span>Suite 1, Wabeco Filling Station, Lekki-Epe Expressway, Lakowe, Lagos.</p>
                                <p class="email"><span>Email : </span><a href="mailto:nnamdi@highrachy.com">nnamdi@highrachy.com</a></p>
                                <p class="phone"><span>Phone : </span><strong>+234 802 833 7440</strong></p>
                                </address>
                </div>

                <div class="col-sm-4">
                  <h3>Our Services</h3>
                  <p>We pride ourselves in our excellent service delivery standards in line with our core competencies. These competencies are;  </p>
                      <ul id="footer-links">
                      <li><a href="expertise.php?page=1">Project Managment Consulting</a></li><li><a href="expertise.php?page=1">Business Consulting</a></li><li><a href="expertise.php?page=2">Techonology Solutions</a></li><li><a href="expertise.php?page=3">Real Investment</a></li>                    </ul>
                  </div>

                  <div class="col-sm-4">
                  <h3>Why Choose Us</h3>
                  <p>Far from a mere technology company, we are a solutions company that goes way beyond solving problems as identified by you, but also constantly enhancing your lives, lifestyles and living. Our solutions are inspired by ideas that promise more convenience, comfort, security, safety, income and plain fun just for YOU.</p>
                </div>

                <div class="clearfix"></div>
            <div id="copyright" class="row">
                    <div class="clearfix"></div>
                    <div class="col-xs-12 pull-left">Copyright &copy; 2014 Highrachy. All rights reserved.</div>
            </div>

         </div>

     </footer>

  <!--////////// JAVASCRIPT FILES INCLUDES //////////-->
  <script src="js/jquery.fitvids.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.inview.js"></script>
  <script src="js/custom.js"></script> <!-- Custom Js file for javascript in html -->
  <!-- End JavaScript -->
</html>
