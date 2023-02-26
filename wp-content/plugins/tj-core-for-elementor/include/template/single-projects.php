<?php

/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  tjcore
 */
get_header();

$address = function_exists('get_field') ? get_field('address', get_the_ID()) : '';
$subtitle = function_exists('get_field') ? get_field('subtitle', get_the_ID()) : '';
$mission = function_exists('get_field') ? get_field('mission', get_the_ID()) : '';
$image = function_exists('get_field') ? get_field('big_image', get_the_ID()) : '';

// agensis
$agensis_content = function_exists('get_field') ? get_field('agensis_content', get_the_ID()) : '';
$agensis_chat = function_exists('get_field') ? get_field('agensis_chat', get_the_ID()) : '';

// contexte
$contexte_subtitle = function_exists('get_field') ? get_field('contexte_subtitle', get_the_ID()) : '';
$contexte_title = function_exists('get_field') ? get_field('contexte_title', get_the_ID()) : '';
$contexte_image_1 = function_exists('get_field') ? get_field('contexte_image_1', get_the_ID()) : '';
$contexte_image_2 = function_exists('get_field') ? get_field('contexte_image_2', get_the_ID()) : '';
$contexte_content = function_exists('get_field') ? get_field('contexte_content', get_the_ID()) : '';

// Programming
$programming_subtitle = function_exists('get_field') ? get_field('programming_subtitle', get_the_ID()) : '';
$programming_title = function_exists('get_field') ? get_field('programming_title', get_the_ID()) : '';
$programming_image = function_exists('get_field') ? get_field('programming_image', get_the_ID()) : '';
$programming_content = function_exists('get_field') ? get_field('programming_content', get_the_ID()) : '';
$programming_topic = function_exists('get_field') ? get_field('programming_topic', get_the_ID()) : '';

// Architecture
$architecture_subtitle = function_exists('get_field') ? get_field('architecture_subtitle', get_the_ID()) : '';
$architecture_title = function_exists('get_field') ? get_field('architecture_title', get_the_ID()) : '';
$architecture_image_1 = function_exists('get_field') ? get_field('architecture_image_1', get_the_ID()) : '';
$architecture_image_2 = function_exists('get_field') ? get_field('architecture_image_2', get_the_ID()) : '';
$architecture_content = function_exists('get_field') ? get_field('architecture_content', get_the_ID()) : '';

// Study
$study_subtitle = function_exists('get_field') ? get_field('study_subtitle', get_the_ID()) : '';
$study_title = function_exists('get_field') ? get_field('study_title', get_the_ID()) : '';
$study_image = function_exists('get_field') ? get_field('study_image', get_the_ID()) : '';
$study_content = function_exists('get_field') ? get_field('study_content', get_the_ID()) : '';

// Site
$site_subtitle = function_exists('get_field') ? get_field('site_subtitle', get_the_ID()) : '';
$site_title = function_exists('get_field') ? get_field('site_title', get_the_ID()) : '';
$site_content = function_exists('get_field') ? get_field('site_content', get_the_ID()) : '';

// Winning
$winning_subtitle = function_exists('get_field') ? get_field('winning_subtitle', get_the_ID()) : '';
$winning_title = function_exists('get_field') ? get_field('winning_title', get_the_ID()) : '';
$winning_big_image = function_exists('get_field') ? get_field('winning_big_image', get_the_ID()) : '';
$winning_content = function_exists('get_field') ? get_field('winning_content', get_the_ID()) : '';
$winning_gallery = function_exists('get_field') ? get_field('winning_gallery', get_the_ID()) : '';
$winning_finalist = function_exists('get_field') ? get_field('winning_finalist', get_the_ID()) : '';


?>


<!-- start: Page Heading  -->
<section class="page-heading">
  <div class="container gx-0 gx-md-4 overflow-hidden ">
    <div class="row">
      <div class="col">
        <div class="page_heading_content style-3 haspadding">
          <div class="content_wrap">
            <h2 class="subtitle"><?php echo tj_kses($subtitle); ?> <span class="address"><?php echo esc_html($address); ?></span>
            </h2>
            <h1><?php the_title(); ?></h1>
            <?php if (!empty($mission)) : ?>
              <h3 class="mission d-none d-md-block"><?php printf('<span>Mission : </span>%s', tj_kses($mission)); ?></h3>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end: Page Heading  -->

<!-- start: Page Feature -->
<?php if (!empty($image)) : ?>
  <section class="page-feature">
    <div class="container gx-0 gx-md-4 overflow-hidden">
      <div class="row">
        <div class="col">
          <div class="page_feature_content">
            <div class="page_feature_img">
              <img src="<?php echo esc_url($image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image), '_wp_attachment_image_alt', true); ?>">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<!-- end: Page Feature -->

<!-- page mobile heading -->
<?php if (!empty($mission)) : ?>
  <div class="mobile_page_heading d-md-none">
    <div class="container gx-0 gx-md-4 overflow-hidden ">
      <div class="row">
        <div class="col">
          <div class="page_heading_content style-3 haspadding">
            <h3 class="mission"><?php printf('<span>Mission : </span>%s', tj_kses($mission)); ?></h3>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<!-- start: Project Details -->
<section class="project-details">
  <div class="container gx-0 gx-md-4">
    <div class="row">
      <div class="col">
        <div class="project_details_section_content haspadding">
          <div class="content_wrap">
            <div class="row">
              <div class="col-md-4 col-lg-3 col-xl-3 d-none d-md-block">
                <div class="project_details_list">
                  <ul id="nav">
                    <?php if (!empty($agensis_content) || !empty($agensis_chat)) : ?>
                      <li class="current"><a href="#agensis"><?php esc_html_e('La génèse', 'tjcore') ?></a></li>
                    <?php endif;
                    if (!empty($contexte_subtitle) || !empty($contexte_title) || !empty($contexte_content)) : ?>
                      <li><a href="#contexte"><?php esc_html_e('Contexte', 'tjcore'); ?></a></li>
                    <?php endif;
                    if (!empty($programming_subtitle) || !empty($programming_title) || !empty($programming_content)) : ?>
                      <li><a href="#programming"><?php esc_html_e('La programmation', 'tjcore'); ?></a></li>
                    <?php endif;
                    if (!empty($architecture_subtitle) || !empty($architecture_title) || !empty($architecture_content)) : ?>
                      <li><a href="#architecture"><?php esc_html_e('Concours d’architecture', 'tjcore'); ?></a></li>
                    <?php endif;
                    if (!empty($study_subtitle) || !empty($study_title) || !empty($study_content)) : ?>
                      <li><a href="#study"><?php esc_html_e('AMO étude', 'tjcore'); ?></a></li>
                    <?php endif;
                    if (!empty($site_subtitle) || !empty($site_title) || !empty($site_content)) : ?>
                      <li><a href="#site"><?php esc_html_e('AMO chantier', 'tjcore'); ?></a></li>
                    <?php endif;
                    if (!empty($winning_subtitle) || !empty($winning_title) || !empty($winning_content)) : ?>
                      <li><a href="#winning"><?php esc_html_e('Le projet lauréat & les finalistes', 'tjcore'); ?></a></li>
                    <?php endif; ?>
                  </ul>
                </div>
              </div>
              <div class="col-md-8 col-lg-9 col-xl-8">
                <div class="project_details_content">

                  <!-- agensis -->
                  <?php if (!empty($agensis_content) || !empty($agensis_chat)) : ?>
                    <div class="agensis" id="agensis">
                      <?php echo tj_kses($agensis_content); ?>

                      <?php if (!empty($agensis_chat)) : ?>
                        <div class="agensis_chat">
                          <ul>
                            <?php foreach ($agensis_chat as $chat) : ?>
                              <li>
                                <div class="agent_img">
                                  <img src="<?php echo esc_url($chat['chat_image']); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($chat['chat_image']), '_wp_attachment_image_alt', true); ?>">
                                </div>
                                <div class="agent_text">
                                  <p><?php echo tj_kses($chat['chat_text']); ?></p>
                                </div>
                              </li>
                            <?php endforeach; ?>
                          </ul>
                        </div>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
                  <!-- !agensis -->

                  <!-- contexte -->
                  <?php if (!empty($contexte_subtitle) || !empty($contexte_title) || !empty($contexte_content)) : ?>
                    <div class="contexte" id="contexte">
                      <div class="project_details_heading">
                        <h3 class="subtitle"><?php echo esc_html($contexte_subtitle); ?></h3>
                        <h2><?php echo tj_kses($contexte_title); ?></h2>
                      </div>
                      <?php echo tj_kses($contexte_content); ?>

                      <div class="images image_carousel">
                        <img src="<?php echo esc_url($contexte_image_1); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($contexte_image_1), '_wp_attachment_image_alt', true); ?>">
                        <img src="<?php echo esc_url($contexte_image_2); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($contexte_image_2), '_wp_attachment_image_alt', true); ?>">
                      </div>
                    </div>
                  <?php endif; ?>
                  <!-- !contexte -->

                  <!-- programming -->
                  <?php if (!empty($programming_subtitle) || !empty($programming_title) || !empty($programming_content)) : ?>
                    <div class="programming" id="programming">
                      <div class="project_details_heading">
                        <h3 class="subtitle"><?php echo esc_html($programming_subtitle); ?></h3>
                        <h2><?php echo tj_kses($programming_title); ?></h2>
                      </div>
                      <?php echo tj_kses($programming_content); ?>

                      <div class="topic_list">
                        <p><?php echo tj_kses($programming_topic['topic_title']); ?></p>

                        <?php if (!empty($programming_topic['topic_list'])) : ?>
                          <ul>
                            <?php foreach ($programming_topic['topic_list'] as $list) : ?>
                              <li><i class="fas fa-arrow-right"></i> <?php echo tj_kses($list['topic_text']); ?></li>
                            <?php endforeach; ?>
                          </ul>
                        <?php endif; ?>
                      </div>

                      <div class="images">
                        <img src="<?php echo esc_url($programming_image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($programming_image), '_wp_attachment_image_alt', true); ?>">
                      </div>
                    </div>
                  <?php endif; ?>
                  <!-- !programming -->

                  <!-- architecture -->
                  <?php if (!empty($architecture_subtitle) || !empty($architecture_title) || !empty($architecture_content)) : ?>
                    <div class="architecture" id="architecture">
                      <div class="project_details_heading">
                        <h3 class="subtitle"><?php echo esc_html($architecture_subtitle); ?></h3>
                        <h2><?php echo tj_kses($architecture_title); ?></h2>
                      </div>
                      <?php echo tj_kses($architecture_content); ?>

                      <div class="images image_carousel">
                        <img src="<?php echo esc_url($architecture_image_1); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($architecture_image_1), '_wp_attachment_image_alt', true); ?>">
                        <img src="<?php echo esc_url($architecture_image_2); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($architecture_image_2), '_wp_attachment_image_alt', true); ?>">
                      </div>
                    </div>
                  <?php endif; ?>
                  <!-- !architecture -->

                  <!-- study -->
                  <?php if (!empty($study_subtitle) || !empty($study_title) || !empty($study_content)) : ?>
                    <div class="study" id="study">
                      <div class="project_details_heading">
                        <h3 class="subtitle"><?php echo esc_html($study_subtitle); ?></h3>
                        <h2><?php echo tj_kses($study_title); ?></h2>
                      </div>
                      <?php echo tj_kses($study_content); ?>

                      <div class="images">
                        <img src="<?php echo esc_url($study_image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($study_image), '_wp_attachment_image_alt', true); ?>">
                      </div>
                    </div>
                  <?php endif; ?>
                  <!-- !study -->

                  <!-- site -->
                  <?php if (!empty($site_subtitle) || !empty($site_title) || !empty($site_content)) : ?>
                    <div class="site" id="site">
                      <div class="project_details_heading">
                        <h3 class="subtitle"><?php echo esc_html($site_subtitle); ?></h3>
                        <h2><?php echo tj_kses($site_title); ?></h2>
                      </div>
                      <?php echo tj_kses($site_content); ?>
                    </div>
                  <?php endif; ?>
                  <!-- !site -->

                  <!-- winning -->
                  <?php if (!empty($winning_subtitle) || !empty($winning_title) || !empty($winning_content)) : ?>
                    <div class="winning" id="winning">
                      <div class="project_details_heading">
                        <h3 class="subtitle"><?php echo esc_html($winning_subtitle); ?></h3>
                        <h2><?php echo tj_kses($winning_title); ?></h2>
                        <img src="<?php echo esc_url($winning_big_image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($winning_big_image), '_wp_attachment_image_alt', true); ?>">
                      </div>
                      <p><?php echo tj_kses($winning_content); ?></p>

                      <?php if (!empty($winning_gallery)) : ?>
                        <div class="images gallery_carousel">
                          <?php foreach ($winning_gallery as $image) : ?>
                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image), '_wp_attachment_image_alt', true); ?>">
                          <?php endforeach; ?>
                        </div>
                      <?php endif;

                      if (!empty($winning_finalist)) :
                      ?>
                        <div class="finalist_section">
                          <div class="finalist_heading">
                            <h3 class="title"><?php esc_html_e('Les finalistes', 'tjcore'); ?></h3>
                          </div>

                          <?php foreach ($winning_finalist as $fin_item) : ?>
                            <div class="single_finalist">
                              <h5><?php echo esc_html($fin_item['title']); ?></h5>
                              <?php if (!empty($fin_item['images'])) : ?>
                                <div class="images gallery_carousel">
                                  <?php foreach ($fin_item['images'] as $image) : ?>
                                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image), '_wp_attachment_image_alt', true); ?>">
                                  <?php endforeach; ?>
                                </div>
                              <?php endif; ?>
                            </div>
                          <?php endforeach; ?>

                        </div>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
                  <!-- !winning -->


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

<!-- start: Testimonial Section -->
<script>
  jQuery(document).ready(function($) {
    if ($(".testimonial_active-2").length > 0) {
      $(".testimonial_active-2").slick({
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

<section class="testimonial-section">
  <div class="testimonial_section_content">
    <div class="container gx-0 gx-md-4 overflow-hidden">
      <div class="row">
        <div class="col">
          <div class="meta_headline">
            <h6>La presse en parle</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid gx-0 overflow-hidden">
      <div class="row">
        <div class="col">
          <div class="testimonials style-2 testimonial_active-2">

            <div class="single_testimonial">
              <div class="testimonial_inner">
                <div class="testi_content">
                  <p class="text">“Le concours le plus couru de l'année 2022”</p>
                  <span class="name">AMC</span>
                </div>
              </div>
            </div>

            <div class="single_testimonial">
              <div class="testimonial_inner">
                <div class="testi_content">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/img/clients/bitmap2.png" alt="">
                </div>
              </div>
            </div>

            <div class="single_testimonial">
              <div class="testimonial_inner">
                <div class="testi_content">
                  <p class="text">“Le concours le plus couru de l'année 2022”</p>
                  <span class="name">AMC</span>
                </div>
              </div>
            </div>

            <div class="single_testimonial">
              <div class="testimonial_inner">
                <div class="testi_content">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/img/clients/bitmap.png" alt="">
                </div>
              </div>
            </div>

            <div class="single_testimonial">
              <div class="testimonial_inner">
                <div class="testi_content">
                  <p class="text">“Le concours le plus couru de l'année 2022”</p>
                  <span class="name">AMC</span>
                </div>
              </div>
            </div>

            <div class="single_testimonial">
              <div class="testimonial_inner">
                <div class="testi_content">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/img/clients/bitmap2.png" alt="">
                </div>
              </div>
            </div>

            <div class="single_testimonial">
              <div class="testimonial_inner">
                <div class="testi_content">
                  <p class="text">“Le concours le plus couru de l'année 2022”</p>
                  <span class="name">AMC</span>
                </div>
              </div>
            </div>

            <div class="single_testimonial">
              <div class="testimonial_inner">
                <div class="testi_content">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/img/clients/bitmap.png" alt="">
                </div>
              </div>
            </div>
          </div>

          <div class="testimonial_nav">
            <div class="container">
              <div class="row">
                <div class="col">
                  <div class="testimonial_nav_content">
                    <ul>
                      <li class="prev"><i class="fas fa-arrow-left"></i> Voir le projet précédent</li>
                      <li class="next">Voir le projet précédent <i class="fas fa-arrow-right"></i></li>
                    </ul>
                  </div>
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