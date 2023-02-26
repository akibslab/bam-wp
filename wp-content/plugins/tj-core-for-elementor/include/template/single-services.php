<?php

/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  tjcore
 */
get_header();

$subtitle = function_exists('get_field') ? get_field('subtitle', get_the_ID()) : '';
$big_image = function_exists('get_field') ? get_field('big_image', get_the_ID()) : '';
$service_details = function_exists('get_field') ? get_field('service_details', get_the_ID()) : '';
$stage_organizations = function_exists('get_field') ? get_field('stage_organization', get_the_ID()) : '';
?>

<!-- start: Page Heading  -->
<section class="page-heading">
  <div class="container gx-0 gx-md-4 overflow-hidden ">
    <div class="row">
      <div class="col">
        <div class="page_heading_content style-2 haspadding">
          <div class="content_wrap">
            <h1><?php the_title(); ?></h1>
            <?php if (!empty($subtitle)) : ?>
              <p><?php echo tj_kses($subtitle); ?></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end: Page Heading  -->

<!-- start: Page Feature -->
<section class="page-feature">
  <div class="container gx-0 gx-md-4 overflow-hidden">
    <div class="row">
      <div class="col">
        <div class="page_feature_content">
          <?php if (!empty($big_image)) : ?>
            <div class="page_feature_img">
              <img src="<?php echo esc_url($big_image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($big_image), '_wp_attachment_image_alt', true); ?>">
            </div>
          <?php endif;
          if (!empty($service_details)) :
          ?>
            <div class="page_feature_text">
              <h2><?php echo tj_kses($service_details); ?></h2>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end: Page Feature -->

<!-- start: Stage Organization -->
<?php if ($stage_organizations) : ?>
  <section class="stages-organization">
    <div class="container gx-0 gx-md-4 overflow-hidden">
      <div class="row">
        <div class="col">
          <div class="stages_organization_content">
            <div class="meta_headline">
              <h6><?php esc_html_e('Un travail de programmation précis', 'tjcore'); ?></h6>
            </div>

            <div class="stages_organization">
              <div class="row gx-4 gx-lg-5">
                <?php foreach ($stage_organizations as $organization) : ?>
                  <div class="col-lg-4 col-md-6">
                    <div class="stage_organization">
                      <div class="organization_img">
                        <img src="<?php echo esc_url($organization['image']); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($organization['image']), '_wp_attachment_image_alt', true); ?>">
                      </div>
                      <div class="organization_content">
                        <h3><?php echo tj_kses($organization['title']); ?></h3>
                        <p><?php echo tj_kses($organization['description']); ?></p>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<!-- start: Stage Organization -->

<!-- start: CTA Section -->
<section class="cta-box-section">
  <div class="container gx-0 gx-md-4 overflow-hidden">
    <div class="row">
      <div class="col">
        <div class="cta_box_content haspadding">
          <div class="content_wrap">
            <div class="cta_box_inner">
              <h2> Découvrez les étapes de <br><span>l’organisation d’un concours</span></h2>
              <a href="#" class="btn">Découvrir</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end: CTA Section -->

<!-- start: Testimonial Section -->
<script>
  jQuery(document).ready(function($) {
    if ($(".testimonial_active>").length > 0) {
      $(".testimonial_active").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        centerMode: true,
        variableWidth: true,
        autoplay: true,
        autoplaySpeed: 0,
        speed: 2000,
        responsive: [{
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            dots: true,
          },
        }, ],
      });
    }
  })
</script>
<section class="testimonial-section">
  <div class="testimonial_section_content">
    <div class="container gx-0 gx-md-4 overflow-hidden">
      <div class="row">
        <div class="col">
          <div class="meta_headline">
            <h6>nos clients en parlent le mieux</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid gx-0 overflow-hidden">
      <div class="row">
        <div class="col">
          <div class="testimonials testimonial_active">
            <div class="single_testimonial">
              <div class="testimonial_inner">
                <div class="testi_content">
                  <p class="text">“Un projet mené de main de maître”</p>
                  <span class="name">Saskia de Rothschild</span>
                </div>
              </div>
            </div>
            <div class="single_testimonial">
              <div class="testimonial_inner">
                <div class="testi_content">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/clients/lafite.png" alt="">
                </div>
              </div>
            </div>
            <div class="single_testimonial">
              <div class="testimonial_inner">
                <div class="testi_content">
                  <p class="text">“Je recommande cet AMO nouvelle génération. Un suivi précieux”</p>
                  <span class="name">François Perrin</span>
                </div>
              </div>
            </div>
            <div class="single_testimonial">
              <div class="testimonial_inner">
                <div class="testi_content">
                  <p class="text">“Un projet mené de main de maître”</p>
                  <span class="name">Saskia de Rothschild</span>
                </div>
              </div>
            </div>
            <div class="single_testimonial">
              <div class="testimonial_inner">
                <div class="testi_content">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/clients/lafite.png" alt="">
                </div>
              </div>
            </div>
            <div class="single_testimonial">
              <div class="testimonial_inner">
                <div class="testi_content">
                  <p class="text">“Je recommande cet AMO nouvelle génération. Un suivi précieux”</p>
                  <span class="name">François Perrin</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<!-- end: Testimonial Section -->
<?php get_footer();  ?>