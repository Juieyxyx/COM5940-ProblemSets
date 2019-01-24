<?php get_header(); ?>

    <!-- Header -->
    <header class="masthead bg-primary text-white text-center">
      <div class="container">
        <img class="img-fluid mb-5 d-block mx-auto" src="<?php bloginfo('template_url'); ?>/img/profile.png" alt="">
        <h1 class="text-uppercase mb-0"><?php bloginfo('name'); ?></h1>
        <hr class="star-light">
        <h2 class="font-weight-light mb-0"><?php bloginfo('description'); ?></h2>
      </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="portfolio">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Portfolio</h2>
        <hr class="star-dark mb-5">
        <div class="row">


<?php
$i = 1;
if ( have_posts() ) :
  while ( have_posts() ) : the_post(); ?>

          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-<?php echo $i; ?>">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fas fa-search-plus fa-3x"></i>
                </div>
              </div>


      <?php the_post_thumbnail('full',array('class'=> 'img-fluid'))   ?>
      	    </a>
                </div>

   <?php $i++; ?>
      <?php endwhile; endif;  ?>
  </div>
      </div>
    </section>


    <!-- About Section -->
    <section class="bg-primary text-white mb-0" id="about">
      <div class="container">
<?php
$args = array (
  'page_id' => '69',
);
$wp_query = new WP_Query($args);

  if ( $wp_query->have_posts()): while ($wp_query->have_posts()): $wp_query->the_post();  ?>



     <h2 class="text-center text-uppercase text-white"><?php the_title(); ?></h2>
        <hr class="star-light mb-5">
        <div class="row">
        <?php the_content(); ?>

      <?php endwhile;  endif; wp_reset_query(); ?>

      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Contact Me</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->

            <?php echo do_shortcode('[contact-form-7 id="85" title="Contact form 1"]'); ?>
          </div>
        </div>
      </div>
    </section>



    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- Portfolio Modals -->

    <!-- Portfolio Modal 1 -->
    <?php
    $i = 1;
     if ( have_posts() ) :
      while ( have_posts() ) : the_post(); ?>

    <div class="portfolio-modal mfp-hide" id="portfolio-modal-<?php echo $i; ?>">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0"><?php the_title(); ?></h2>
              <hr class="star-dark mb-5">
              <?php the_post_thumbnail('full',array('class'=> 'img-fluid mb-5'))   ?>
              <p><?php the_content(); ?></p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>

 <?php $i++; ?>
   <?php endwhile; endif;  ?>



<?php get_footer(); ?>
