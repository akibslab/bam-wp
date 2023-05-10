<?php

/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  tjcore
 */
get_header();

$subtitle = function_exists('get_field') ? get_field('subtitle', get_the_ID()) : '';
$address = function_exists('get_field') ? get_field('address', get_the_ID()) : '';
$big_image = function_exists('get_field') ? get_field('big_image', get_the_ID()) : '';
$video_link = function_exists('get_field') ? get_field('video_link', get_the_ID()) : '';

// project
$project_title = function_exists('get_field') ? get_field('project_title', get_the_ID()) : '';
$project_subtitle = function_exists('get_field') ? get_field('project_subtitle', get_the_ID()) : '';
$project_image_1 = function_exists('get_field') ? get_field('project_image_1', get_the_ID()) : '';
$project_image_2 = function_exists('get_field') ? get_field('project_image_2', get_the_ID()) : '';
$project_content = function_exists('get_field') ? get_field('project_content', get_the_ID()) : '';

// organisation
$organisation_subtitle = function_exists('get_field') ? get_field('organisation_subtitle', get_the_ID()) : '';
$organisation_feature = function_exists('get_field') ? get_field('organisation_feature', get_the_ID()) : '';

// questions
$questions_subtitle = function_exists('get_field') ? get_field('questions_subtitle', get_the_ID()) : '';
$faqs = function_exists('get_field') ? get_field('faqs', get_the_ID()) : '';

// brief
$brief_title = function_exists('get_field') ? get_field('brief_title', get_the_ID()) : '';
$button_text = function_exists('get_field') ? get_field('button_text', get_the_ID()) : '';
$button_link = function_exists('get_field') ? get_field('button_link', get_the_ID()) : '';
?>

<!-- start: Page Heading  -->
<section class="page-heading">
  <div class="container gx-0 gx-md-4 overflow-hidden ">
    <div class="row">
      <div class="col">
        <div class="page_heading_content style-3 haspadding">
          <div class="content_wrap">
            <h2 class="subtitle"><?php echo tj_kses($subtitle); ?>
              <?php if (!empty($address)) : ?>
                <span class="address"><?php echo tj_kses($address); ?></span>
              <?php endif; ?>
            </h2>
            <h1><?php the_title(); ?></h1>
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
          <div class="page_feature_img">
            <?php if (!empty($video_link)) : ?>
              <video controls>
                <source src="<?php echo $video_link; ?>" type="video/mp4">
              </video>
            <?php else : ?>
              <img src="<?php echo esc_url($big_image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($big_image), '_wp_attachment_image_alt', true); ?>">
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end: Page Feature -->

<!-- start: Project Details -->
<section class="organization-details">
  <div class="container gx-0 gx-md-4">
    <div class="row">
      <div class="col">
        <div class="organization_details_section_content haspadding">
          <div class="content_wrap">
            <div class="row">
              <div class="col-md-4 col-lg-3 col-xl-3">
                <div class="organization_details_list">
                  <ul>
                    <?php if (!empty($project_title) || !empty($project_subtitle) || !empty($project_content)) : ?>
                      <li><a class="smooth-scroll" href="#project"><?php esc_html_e('Le projet', 'tjcore'); ?></a></li>
                    <?php endif;
                    if (!empty($organisation_subtitle) || !empty($organisation_feature)) : ?>
                      <li><a class="smooth-scroll" href="#organization"><?php esc_html_e('Organisation', 'tjcore'); ?></a></li>
                    <?php endif;
                    if (!empty($questions_subtitle) || !empty($faqs)) : ?>
                      <li><a class="smooth-scroll" href="#questions"><?php esc_html_e('FAQ', 'tjcore'); ?></a></li>
                    <?php endif;
                    if (!empty($brief_title) || !empty($button_text)) : ?>
                      <li><a class="smooth-scroll" href="#brief"><?php esc_html_e('Télécharger le brief', 'tjcore'); ?></a></li>
                    <?php endif; ?>
                    <li><a class="smooth-scroll" href="#partenariat"><?php esc_html_e('Partenaires', 'tjcore'); ?></a></li>
                  </ul>

                  <a href="#" class="btn d-none d-md-inline-block"><?php esc_html_e('S’inscrire', 'tjcore'); ?></a>
                </div>
              </div>
              <div class="col-md-8 col-lg-9 col-xl-8">
                <div class="project_details_content">

                  <?php if (!empty($project_title) || !empty($project_subtitle) || !empty($project_content)) : ?>
                    <div class="project" id="project">
                      <div class="project_details_heading">
                        <h3 class="subtitle"><?php echo tj_kses($project_subtitle); ?></h3>
                      </div>
                      <?php echo tj_kses($project_content); ?>

                      <div class="images image_carousel">
                        <img src="<?php echo esc_url($project_image_1); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($project_image_1), '_wp_attachment_image_alt', true); ?>">
                        <img src="<?php echo esc_url($project_image_2); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($project_image_2), '_wp_attachment_image_alt', true); ?>">
                      </div>

                      <h3><?php echo tj_kses($project_title); ?></h3>
                    </div>
                  <?php endif; ?>

                  <?php if (!empty($organisation_subtitle) || !empty($organisation_feature)) : ?>
                    <div class="organization" id="organization">
                      <div class="project_details_heading">
                        <h3 class="subtitle"><?php echo tj_kses($organisation_subtitle) ?></h3>
                      </div>

                      <?php if (!empty($organisation_feature)) : ?>
                        <div class="organization_features">
                          <?php foreach ($organisation_feature as $feature) : ?>
                            <div class="single_feature">
                              <p class="title"><?php echo tj_kses($feature['title']); ?></p>

                              <?php if (!empty($feature['feature_list'])) : ?>
                                <ul class="feature_list">
                                  <?php foreach ($feature['feature_list'] as $list) : ?>
                                    <li><i class="fas fa-arrow-right"></i> <?php echo tj_kses($list['list_text']); ?></li>
                                  <?php endforeach; ?>
                                </ul>
                              <?php endif; ?>

                            </div>
                          <?php endforeach; ?>
                        </div>
                      <?php endif; ?>

                    </div>
                  <?php endif; ?>

                  <?php if (!empty($questions_subtitle) || !empty($faqs)) : ?>
                    <div class="questions" id="questions">
                      <div class="project_details_heading">
                        <h3 class="subtitle"><?php echo tj_kses($questions_subtitle) ?></h3>
                      </div>

                      <?php if (!empty($faqs)) : ?>
                        <div class="question_accordion" id="organizationFaq">
                          <?php foreach ($faqs as $key => $faq) : ?>
                            <div class="accordion_item">
                              <h6 class="accordion_question collapsed" data-bs-toggle="collapse" data-bs-target="#faq-<?php echo $key + 1; ?>">
                                <?php echo tj_kses($faq['question']); ?>
                              </h6>
                              <div id="faq-<?php echo $key + 1; ?>" class="accordion_ans collapse " data-bs-parent="#organizationFaq">
                                <p><?php echo tj_kses($faq['answer']); ?></p>
                              </div>
                            </div>
                          <?php endforeach; ?>

                        </div>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end: Project Details -->

<!-- start: CTA Section -->
<?php if (!empty($brief_title) || !empty($button_text)) : ?>
  <section class="cta-box-section" id="brief">
    <div class="container gx-0 gx-md-4 overflow-hidden">
      <div class="row">
        <div class="col">
          <div class="cta_box_content haspadding">
            <div class="content_wrap">
              <div class="cta_box_inner">
                <h2><?php echo tj_kses($brief_title); ?></h2>
                <a href="<?php echo esc_html($button_link); ?>" class="btn"><?php echo esc_html($button_text); ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<!-- end: CTA Section -->

<!-- start: Testimonial Section -->
<script>
  jQuery(document).ready(function($) {
    if ($(".testimonial_active").length > 0) {
      $(".testimonial_active").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: $(".prev"),
        nextArrow: $(".next"),
        centerMode: true,
        variableWidth: true,
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

<section class="testimonial-section" id="partenariat">
  <div class="testimonial_section_content">
    <div class="container gx-0 gx-md-4 overflow-hidden">
      <div class="row">
        <div class="col">
          <div class="meta_headline">
            <h6><?php esc_html_e('En partenariat avec', 'tjcore'); ?></h6>
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
                  <img src="<?php echo get_template_directory_uri() ?>/assets/img/clients/1.png" alt="">
                </div>
              </div>
            </div>

            <div class="single_testimonial">
              <div class="testimonial_inner">
                <div class="testi_content">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/img/clients/2.png" alt="">
                </div>
              </div>
            </div>

            <div class="single_testimonial">
              <div class="testimonial_inner">
                <div class="testi_content">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/img/clients/3.png" alt="">
                </div>
              </div>
            </div>

            <div class="single_testimonial">
              <div class="testimonial_inner">
                <div class="testi_content">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/img/clients/1.png" alt="">
                </div>
              </div>
            </div>

            <div class="single_testimonial">
              <div class="testimonial_inner">
                <div class="testi_content">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/img/clients/2.png" alt="">
                </div>
              </div>
            </div>

            <div class="single_testimonial">
              <div class="testimonial_inner">
                <div class="testi_content">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/img/clients/3.png" alt="">
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