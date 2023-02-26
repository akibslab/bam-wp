<?php

/**
 * Template part for displaying header layout two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bam
 */


$achievement_switch = get_theme_mod('achievement_switch', true);
$achievement_title = get_theme_mod('achievement_title', __('Nos réalisations', 'bam'));
$projects_link = get_theme_mod('projects_link', __('#', 'bam'));
$competitions_link = get_theme_mod('competitions_link', __('#', 'bam'));

$mobile_menu_switch = get_theme_mod('mobile_menu_switch', true);
$mobile_menu_title = get_theme_mod('mobile_menu_title', __('À propos de nous', 'bam'));

$information_switch = get_theme_mod('information_switch', true);
$information_title = get_theme_mod('information_title', __('Infos pratiques', 'bam'));
$contact_link = get_theme_mod('contact_link', __('#', 'bam'));
$contest_link = get_theme_mod('contest_link', __('#', 'bam'));

$social_switch = get_theme_mod('social_switch', true);
// header topbar 

$header_lang = get_theme_mod('header_lang', true);

?>

<!-- start: Header Area -->
<header class="site-header" id="header">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="header_wrapper">
          <!-- site logo -->
          <div class="site_logo">
            <?php bam_header_logo(); ?>
          </div>

          <!-- site menu -->
          <div class="site_menu d-none d-lg-block">
            <?php bam_header_menu(); ?>
          </div>
          <?php if (!empty($header_lang)) : ?>
            <div class="header_lang d-none d-lg-block">
              <?php bam_lang(); ?>
            </div>
          <?php endif; ?>
          <div class="mobile_menubar d-lg-none">
            <a href="javascript:void(0)"><i class="fal fa-bars"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="mobile_menu">

      <?php if (!empty($achievement_switch)) : ?>
        <div class="mobile_menu_top">
          <div class="mobile_menu_title">
            <h6><?php echo esc_html($achievement_title); ?></h6>
          </div>
          <ul>
            <li><a href="<?php echo esc_url($projects_link); ?>"><?php echo esc_html__('Nos projets', 'bam'); ?></a></li>
            <li><a href="<?php echo esc_url($competitions_link); ?>"><?php echo esc_html__('Nos concours en cours', 'bam'); ?></a></li>
          </ul>
        </div>
      <?php endif;

      if (!empty($mobile_menu_switch)) : ?>
        <div class="mobile_menu_middle">
          <div class="mobile_menu_title">
            <h6><?php echo esc_html($mobile_menu_title); ?></h6>
          </div>
          <?php bam_mobile_menu(); ?>
        </div>
      <?php endif;

      if (!empty($information_switch)) : ?>
        <div class="mobile_menu_middle">
          <div class="mobile_menu_title">
            <h6><?php echo esc_html($information_title); ?></h6>
          </div>
          <ul>
            <li><a href="<?php echo esc_url($contact_link); ?>"><?php echo esc_html__('Nous contacter', 'bam'); ?></a></li>
            <li><a href="<?php echo esc_url($contest_link); ?>"><?php echo esc_html__('Organiser un concours', 'bam'); ?> <i class="fas fa-arrow-right"></i></a></li>
          </ul>
        </div>
      <?php endif; ?>

      <div class="mobile_menu_bottom">
        <?php if (!empty($header_lang)) : ?>
          <div class="header_lang">
            <?php bam_lang(); ?>
          </div>
        <?php endif;
        if (!empty($social_switch)) : ?>
          <ul class="mobile_socials">
            <?php bam_socials() ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </div>
</header>