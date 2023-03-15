<?php

/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bam
 */
$footer_cta_switcher = get_theme_mod('footer_cta_switcher', true);
$footer_cta_title = get_theme_mod('footer_cta_title', __('Vous avez un projet ? <span>Discutons-en</span>', 'bam'));
$footer_cta_btn_text = get_theme_mod('footer_cta_btn_text', __('Prendre un rdv téléphonique', 'bam'));
$footer_cta_btn_link = get_theme_mod('footer_cta_btn_link', __('#', 'bam'));

$footer_bottom_right_btn_text = get_theme_mod('footer_bottom_right_btn_text', __('site by pepperclip studio', 'bam'));
$footer_bottom_right_btn_link = get_theme_mod('footer_bottom_right_btn_link', __('#', 'bam'));

$footer_marquee_switcher = get_theme_mod('footer_marquee_switcher', true);
$marquee_headline = get_theme_mod('marquee_headline', __('Domaines d’activité', 'bam'));
$marquee_images = get_theme_mod('marquee_images');
?>

<!-- start: Footer Area -->
<footer class="site-footer">

  <?php if (!empty($footer_cta_switcher)) : ?>
    <div class="cta-section">
      <div class="container gx-0 gx-md-4 overflow-hidden">
        <div class="row">
          <div class="col">
            <div class="cta_section_content">
              <h2><?php echo bam_kses($footer_cta_title); ?></h2>
              <a href="<?php echo esc_url($footer_cta_btn_link); ?>" class="btn"><?php echo esc_html($footer_cta_btn_text); ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <div class="footer_top">
    <div class="container">
      <div class="row">
        <?php if (is_active_sidebar('footer-widget-1')) : ?>
          <div class="col-md-6 col-lg-3">
            <?php dynamic_sidebar('footer-widget-1'); ?>

            <div class="footer_widget">
              <div class="footer_widget_wrap">
                <div class="header_lang d-md-none">
                  <?php bam_lang(); ?>
                </div>
                <ul class="footer_socials">
                  <?php bam_socials(); ?>
                </ul>
              </div>
            </div>
          </div>
        <?php endif;
        if (is_active_sidebar('footer-widget-2')) : ?>
          <div class="col-md-6 col-lg-2">
            <?php dynamic_sidebar('footer-widget-2');
            ?>
          </div>
        <?php endif;
        if (is_active_sidebar('footer-widget-3')) : ?>
          <div class="col-md-4 col-lg-2">
            <?php dynamic_sidebar('footer-widget-3');
            ?>
          </div>
        <?php endif;
        if (is_active_sidebar('footer-widget-4')) : ?>
          <div class="col-md-4 col-lg-2">
            <?php dynamic_sidebar('footer-widget-4');
            ?>
          </div>
        <?php endif;
        if (is_active_sidebar('footer-widget-5')) : ?>
          <div class="col-md-4 col-lg-3">
            <?php dynamic_sidebar('footer-widget-5');
            ?>
            <!-- <div class="footer_widget">
              <div class="footer_btn">
                <a href="#" class="btn inline-btn">Organiser un concours</a>
              </div>
            </div> -->
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <?php if (!empty($footer_marquee_switcher)) : ?>
    <div class="footer_middle">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="meta_headline">
              <h6><?php echo esc_html($marquee_headline); ?></h6>
            </div>
          </div>
        </div>
      </div>

      <?php if (!empty($marquee_images)) : ?>
        <marquee behavior="scroll" direction="left" class="marquee" onmouseover="this.stop();" onmouseout="this.start();">
          <?php foreach ($marquee_images as $image) : ?>
            <img src="<?php echo esc_url($image['bam_marquee_image']); ?>" alt="<?php echo esc_attr("Marquee Image"); ?>">
          <?php endforeach; ?>
        </marquee>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <div class="footer_bottom">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="footer_bottom_content">
            <div class="footer_bottom_left">
              <div class="copyright_text">
                <p><?php bam_copyright_text(); ?></p>
              </div>
              <div class="footer_bottom_menu">
                <?php bam_footer_menu(); ?>
              </div>
            </div>

            <?php if (!empty($footer_bottom_right_btn_text)) : ?>
              <div class="footer_bottom_right">
                <a href="<?php echo esc_url($footer_bottom_right_btn_link); ?>"><?php echo esc_html($footer_bottom_right_btn_text); ?></a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- start: Footer Area -->

<!-- footer start -->
<footer id="footer" class="d-none">
  <div class="ss-footer__area default__footer">
    <?php if (is_active_sidebar('footer-1') or is_active_sidebar('footer-2') or is_active_sidebar('footer-3') or is_active_sidebar('footer-4')) : ?>
      <div class="ss-footer__wrapper" data-bg-color="<?php print esc_attr($footer_bg_color); ?>">
        <div class="container">
          <div class="row">
            <?php
            for ($num = 1; $num <= $footer_column; $num++) {

              print '<div class="' . esc_attr($footer_class[$num]) . '">';
              dynamic_sidebar('footer-' . $num);
              print '</div>';
            }
            ?>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <div class="ss-footer__copyright footer-default__copyright">
      <div class="container">
        <div class="row">
          <div class="<?php echo esc_attr($bam_footer_copyright_column); ?>">
            <div class="footer-copyright__text">
              <p><?php print bam_copyright_text(); ?></p>
            </div>
          </div>
          <?php if (!empty($footer_social_switcher)) : ?>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
              <div class="footer-copyright__links text-sm-end">
                <?php bam_footer_socials(); ?>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- footer end -->