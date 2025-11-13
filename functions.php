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

    // lpのURLの時にだけlp.min.cssを読み込む
    if (is_page('lp')) {
        $lp_min_css_timestamp = date('Ymdgis', filemtime(get_stylesheet_directory() . '/lp.min.css'));
        wp_enqueue_style('lp_min_css', get_stylesheet_directory_uri() . '/lp.min.css', [], $lp_min_css_timestamp);
    } else {
        $theme_min_css_timestamp = date('Ymdgis', filemtime(get_stylesheet_directory() . '/theme.min.css'));
        wp_enqueue_style('theme_min_css', get_stylesheet_directory_uri() . '/theme.min.css', [], $theme_min_css_timestamp);
    }
}, 11);

add_filter('show_admin_bar', '__return_false');

function get_custom_menu_items()
{
    $menuItems = [
        ["name" => "TOP", "url" => home_url('/')],
        ["name" => "SERVICE", "url" => home_url('/#service')],
        ["name" => "ABOUT US", "url" => home_url('/about-us')],
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
    if (is_front_page() || is_page('lp')) {
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
    }
}

add_action('wp_enqueue_scripts', 'add_swiper_scripts_to_front_page');
