<?php

/* 子テーマのfunctions.phpは、親テーマのfunctions.phpより先に読み込まれることに注意してください。 */


/**
 * 親テーマのfunctions.phpのあとで読み込みたいコードはこの中に。
 */
// add_filter('after_setup_theme', function(){
// }, 11);


/**
 * 子テーマでのファイルの読み込み
 */
add_action('wp_enqueue_scripts', function () {

    $timestamp = date('Ymdgis', filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_style('child_style', get_stylesheet_directory_uri() . '/style.css', [], $timestamp);

    $theme_min_css_timestamp = date('Ymdgis', filemtime(get_stylesheet_directory() . '/css/theme.min.css'));
    wp_enqueue_style('theme_min_css', get_stylesheet_directory_uri() . '/css/theme.min.css', [], $theme_min_css_timestamp);
}, 11);

add_filter('show_admin_bar', '__return_false');

// 採用サイト（page-recruit.php）専用のWebフォント
add_action('wp_enqueue_scripts', function () {
    if (is_page_template('page-recruit.php')) {
        wp_enqueue_style('recruit_fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&family=Oswald:wght@500&display=swap', [], null);
    }
}, 12);

function get_custom_menu_items()
{
    $menuItems = [
        ["name" => "TOP", "url" => home_url('/')],
        ["name" => "SERVICE", "url" => home_url('/#service')],
        ["name" => "ABOUT US", "url" => home_url('/about-us')],
        ["name" => "MESSAGE", "url" => home_url('/message')],
        ["name" => "CONTACT", "url" => home_url('/#contact')]
    ];
    return $menuItems;
}

// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
    return false;
}

function add_swiper_scripts_to_front_page()
{
    // トップページのみでスクリプトとスタイルを読み込む
    if (is_front_page()) {
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
    }
}

add_action('wp_enqueue_scripts', 'add_swiper_scripts_to_front_page');

// Recruitment styles are isolated to the recruitment template.
add_action('wp_enqueue_scripts', function () {
    if (is_page_template('page-recruit.php') || is_page('recruit')) {
        wp_enqueue_style('pichipichi-recruit', get_stylesheet_directory_uri() . '/css/recruit.css', ['theme_min_css'], filemtime(get_stylesheet_directory() . '/css/recruit.css'));
    }
}, 20);

// Homepage recruitment callout; selectors do not affect existing sections.
add_action('wp_enqueue_scripts', function () {
    if (is_front_page()) {
        wp_enqueue_style('pichipichi-recruit-teaser', get_stylesheet_directory_uri() . '/css/recruit-teaser.css', ['theme_min_css'], filemtime(get_stylesheet_directory() . '/css/recruit-teaser.css'));
    }
}, 20);
