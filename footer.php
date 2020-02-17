<?php
/**
 * The template for displaying the footer.
 * 
 *
 * @package wp_majestick9group
 */

?>


      <div class="container">
        <div class="one">
          <br><br><br>            
          <h4>Our Clients</h4>
          <br>
        </div>
        <ul class="clients-grid one-sixth clients"><!--clients list starts -->
            <li><a href="#" data-rel="prettyPhoto"><img src="<?php echo IMAGES ?>/clients/client-1.jpg" alt="Our Clients"/></a></li>
            <li><a href="#" data-rel="prettyPhoto"><img src="<?php echo IMAGES ?>/clients/client-2.jpg" alt="Our Clients"/></a></li>
            <li><a href="#" data-rel="prettyPhoto"><img src="<?php echo IMAGES ?>/clients/client-3.jpg" alt="Our Clients"/></a></li>
            <li><a href="#" data-rel="prettyPhoto"><img src="<?php echo IMAGES ?>/clients/client-4.jpg" alt="Our Clients"/></a></li>
            <li><a href="#" data-rel="prettyPhoto"><img src="<?php echo IMAGES ?>/clients/client-5.jpg" alt="Our Clients"/></a></li>
            <li><a href="#" data-rel="prettyPhoto"><img src="<?php echo IMAGES ?>/clients/client-6.jpg" alt="Our Clients"/></a></li>

          </ul><!--clients list ends -->
      </div>


<footer id="footer"><!-- footer starts-->
    <div class="container">
        <div class="one-fourth">
            <!-- footer text widget starts-->
          <?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) : ?>            
                    <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>            
            <?php endif; ?>
            <!-- footer text widget ends-->
        </div>
        <div class="one-fourth">
            <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) : ?>            
                    <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>            
            <?php endif; ?>
        </div>
        <div class="one-fourth">
            <?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) : ?>            
                    <?php dynamic_sidebar( 'footer-sidebar-3' ); ?>            
            <?php endif; ?>
        </div>
        <div class="one-fourth last">
            <?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) : ?>            
                    <?php dynamic_sidebar( 'footer-sidebar-4' ); ?>            
            <?php endif; ?>
            <!--flickr widget ends-->
        </div>
    </div>
</footer><!--footer ends -->

      <div id="copyrights"><!-- copyrights starts-->
        <div class="container">
          <div class="one-half">
            <p>
              &copy; Copyright 2014 <a href="#">MajesticK9Group</a>.
            </p>
          </div>
          <div class="one-half last">
            <ul class="social-icons footer"><!-- social links starts-->
              <li><a href="https://twitter.com/@k9_insights"><i class="icon-social-twitter"></i></a></li>
              <li><a href="https://www.facebook.com/majestick9group"><i class="icon-social-facebook"></i></a></li>
              <li><a href="#"><i class="icon-social-linkedin"></i></a></li>
              <!-- <li><a href="#"><i class="icon-social-gplus"></i></a></li> -->
              <!-- <li><a href="#"><i class="icon-social-skype"></i></a></li> -->
            </ul><!-- social links ends-->
          </div>
        </div>
      </div><!-- copyrights ends -->
    </div><!-- main content starts-->
  </div> <!-- main wrapp starts-->
</div><!-- main container ends-->
<?php wp_footer() ?>
</body>
</html>