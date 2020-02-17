        <footer>
            <div class="container">
                <div class="row">

                    <div class="col-sm-4">
                        <h3>Contact Us</h3>
                        <address>
                        <p class="home"><span> Address : </span><?php echo strip_tags($address) ?></p>
                        <p class="email"><span>Email : </span><a href="mailto:nnamdi@highrachy.com">nnamdi@highrachy.com</a></p>
                        <p class="phone"><span>Phone : </span><strong><?php echo $mobile1 ?></strong></p>
                        </address>
                    </div>

                    <div class="col-sm-4 hidden-xs">

                        <h3>Our Services</h3>
                        <p>We pride ourselves in our excellent service delivery standards in line with our core competencies. These competencies are;  </p>
                            <ul id="footer-links">
                            <?php echo $service ?>
                            </ul>
                    </div>

                    <div class="col-sm-4 hidden-xs">
                        <h3>Quick Links</h3>
                        <ul class="list-unstyled">
                            <li><a href="http://weprotect.highrachy.com"><span class="fa fa-caret-right"></span>&nbsp;Highrachy WeProtect </a> </li>
                            <li><a href="career.php"><span class="fa fa-caret-right"></span> &nbsp;Careers&nbsp;  </a></li>
                            <li><a href="sitemap.php"><span class="fa fa-caret-right"></span>&nbsp;Sitemap </a> </li>
                            <li><a href="about.php#projects"><span class="fa fa-caret-right"></span> &nbsp;Our Projects&nbsp;  </a></li>
                            <li><a href="http://highrachy.com/highracy_brochure.pdf"><span class="fa fa-caret-right"></span> &nbsp;Download Brochure&nbsp;  </a></li>
                            <li><a href="about.php#business-relationships"><span class="fa fa-caret-right"></span> &nbsp;Existing Business Relationships&nbsp;  </a></li>
                        </ul>
                    </div>
                </div>

                <div id="copyright" class="row">
                    <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                        <ul class="list-inline">
                            <li><strong>Quick Links : </strong></li>
                            <li><a href="http://weprotect.highrachy.com"> Highrachy WeProtect </a> </li>
                            <li><a href="career.php"> Careers&nbsp;  </a></li>
                            <li><a href="sitemap.php"> Sitemap </a> </li>
                            <li><a href="about.php#projects"> Our Projects&nbsp;  </a></li>
                            <li><a href="#"> Download Brochure&nbsp;  </a></li>
                        </ul>
                    </div>
                    <div class="col-sm-8 pull-left">Copyright &copy; 2015 Highrachy. All rights reserved.</div>
                    <div class="col-sm-4 hidden-xs pull-right">
                        <ul class="list-unstyled list-inline pull-right">
                            <li><a href="<?php echo $facebook ?>"><span id="facebook_icon"></span></a></li>
                            <li><a href="<?php echo $twitter ?>"><span id="twitter_icon"></span></a></li>
                            <li><a href="<?php echo $linked ?>"><span id="linkedin_icon"></span></a></li>
                        <!-- END .social-icons -->
                        </ul>
                    </div>
                </div>

            </div>

        </footer>

        <a href="#" class="scroll-up">Scroll</a>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-2.1.0.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        
        <script>
            $(function(){
                //*** SCROLL TO TOP ***//
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 100) {
                        $('.scroll-up').fadeIn();
                    } else {
                        $('.scroll-up').fadeOut();
                    }
                });

                $('.scroll-up').click(function() {
                    $("html, body").animate({
                        scrollTop: 0
                    }, 800);
                    return false;
                });
                //*** END SCROLL TO TOP ***//
            });
        </script>

        <?php if ((isset($script)) && ($script)): ?>
            <script src="js/plugins.js"></script>
            <script src="js/main.js"></script>

            <?php if ((isset($title)) && ($title == "solutions")): ?>
                <script type="text/javascript" src="js/accordion.min.js"></script>
                <script type="text/javascript">
                    $(function () {
                        $('.accordion').accordion({
                            open: false, // First List Open, Default Value: false
                            autoStart: false, // Auto Start, Default Value: false
                            onHoverActive: false, // On Hover Active, Default Value: false
                            slideInterval: 3000, // Expression at specified intervals (in milliseconds) Default Value: 3000
                            duration: 'slow', // The default duration is slow. The strings 'fast' and 'slow' can be supplied to indicate durations of 200 and 600 milliseconds, respectively.
                            easing: 'swing', //  An easing function specifies the speed at which the animation progresses at different points within the animation.
                          });
                    });
                </script>
                <script src="js/tooltipsy.min.js"></script>
                <script type="text/javascript">
                   $(function () {
                     $('.tipsy').tooltipsy();
                  });
                </script>

            <?php endif ?>

            
            <?php if ((isset($title)) && ($title == "products")): ?>
            <script src="js/filterable.pack.js" type="text/javascript" charset="utf-8"></script>
            <?php endif ?>            
            
            <?php if ((isset($title)) && ($title == "contact")): ?>
                <!-- For the map on the contact -->
          
                <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
                <script src="js/gmap3.min.js"></script>

                <script type="text/javascript">
                   var latLng = [6.428917, 3.429756] //[6.42876,3.429756];
                   var latLngInfo = [6.428917, 3.429756] //[6.429772,3.429489];
                   $('#map1').gmap3({
                        map:{
                          options:{
                            center:latLng,
                            zoom: 16
                          }
                        },
                        infowindow:{
                          latLng:latLngInfo,
                          options:{
                            content: 'Highrachy Investment and Technology'
                          }
                        },
                        marker:{
                          values:[
                            {
                              latLng:latLng,
                              options:{
                                icon: "img/marker.png"
                              }
                            }
                          ],
                          options:{
                            draggable: false
                          },
                        }
                      });
                </script>

            <?php endif ?>

        <?php endif ?>

<?php if (!(isset($dashboard) && $dashboard)) { ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-55353691-1', 'auto');
  ga('send', 'pageview');

</script>
<?php } ?>