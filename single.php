<?php

/**
 * Template Name: ニュース記事
 * Template Post Type: post
 * @package WordPress
 * @subpackage  Pichi pichi Co., Ltd.
 * @since 1.0.0
 */
?>
<?php
if (! defined('ABSPATH')) exit;

get_header();
include 'nav.php';
while (have_posts()) :
    the_post();

    $SETTING = SWELL_Theme::get_setting();
    $the_id  = get_the_ID();

    // シェアボタンを隠すかどうか
    $show_share_btns = get_post_meta($the_id, 'swell_meta_hide_sharebtn', true) !== '1';
?>
    <main id="main_content" class="l-mainContent l-article single">
        <div class="bg">
            <div class="single__header">
            </div><!-- /.single__header -->
            <svg class="section_wave wave_top" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1920 120"
                fill="#FFFCEE">
                <path
                    d="M213.333 40C142.222 -13.3333 71.1111 -13.3333 0 40V120H1920V40C1848.89 -13.3333 1777.78 -13.3333 1706.67 40C1635.56 93.3333 1564.44 93.3333 1493.33 40C1422.22 -13.3333 1351.11 -13.3333 1280 40C1208.89 93.3333 1137.78 93.3333 1066.67 40C995.556 -13.3333 924.444 -13.3333 853.333 40C782.222 93.3333 711.111 93.3333 640 40C568.889 -13.3333 497.778 -13.3333 426.667 40C355.556 93.3333 284.444 93.3333 213.333 40Z"
                    fill="#FFFCEE" />
            </svg>
            <div class="bg-white">
                <article class="l-mainContent__inner" data-clarity-region="article">
                    <div
                        class="single__container container <?= esc_attr(apply_filters('swell_post_content_class', 'post_content')) ?>">
                        <div class="single__wrapper">
                            <div class="single__title">
                                <p class="single__time"><?php the_time('Y.n.j'); ?></p>
                                <?php the_title('<h1>', '</h1>'); ?>
                            </div><!-- /.single__title -->
                            <?php
                            do_action('swell_before_post_head', $the_id);

                            // タイトル周り
                            if (! SWELL_Theme::is_show_ttltop()) {
                                SWELL_Theme::get_parts('parts/single/post_head');
                            }

                            // アイキャッチ画像
                            if (SWELL_Theme::is_show_thumb($the_id)) {
                                do_action('swell_before_post_thumb', $the_id);
                                echo SWELL_PARTS::post_thumbnail($the_id); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                            }

                            // 記事上シェアボタン
                            if ($show_share_btns && $SETTING['show_share_btn_top']) {
                                SWELL_Theme::get_parts('parts/single/share_btns', ['position' => '-top']);
                            }

                            // 記事上ウィジェット
                            SWELL_Theme::outuput_content_widget('single', 'top');
                            ?>
                            <div class="single__content">
                                <?php the_content(); ?>
                            </div><!-- /.single__content -->
                            <?php
                            // 改ページナビゲーション
                            $defaults = [
                                'before'         => '<div class="c-pagination -post">',
                                'after'          => '</div>',
                                'next_or_number' => 'number',
                                // 'pagelink'      => '<span>%</span>',
                            ];
                            wp_link_pages($defaults);

                            // 下部ウィジェット
                            SWELL_Theme::outuput_content_widget('single', 'bottom');

                            // post_foot
                            SWELL_Theme::get_parts('parts/single/post_foot');

                            // FBいいね & Twitterフォロー ボックス
                            if (SWELL_Theme::is_show_sns_cta()) {
                                SWELL_Theme::get_parts('parts/single/sns_cta');
                            }

                            // 下部シェアボタン
                            if ($show_share_btns && $SETTING['show_share_btn_bottom']) {
                                SWELL_Theme::get_parts('parts/single/share_btns', ['position' => '-bottom']);
                            }

                            // 固定シェアボタン
                            if ($show_share_btns && $SETTING['show_share_btn_fix']) {
                                SWELL_Theme::get_parts('parts/single/share_btns', ['position' => '-fix']);
                            }
                            ?>
                            <div id="after_article" class="l-articleBottom">
                                <?php if (! SWELL_Theme::is_use('ajax_after_post')) SWELL_Theme::get_parts('parts/single/after_article'); ?>
                            </div>
                            <?php if (SWELL_Theme::is_show_comments($the_id)) comments_template(); ?>
                        </div><!-- /.single__wrapper -->
                    </div><!-- /.single__container container -->
            </div>
            </article>
            <svg class="section_wave wave_bottom" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1920 120"
                fill="#FFFCEE">
                <path
                    d="M213.333 80C142.222 133.333 71.1111 133.333 0 80V0H1920V80C1848.89 133.333 1777.78 133.333 1706.67 80C1635.56 26.6667 1564.44 26.6667 1493.33 80C1422.22 133.333 1351.11 133.333 1280 80C1208.89 26.6667 1137.78 26.6667 1066.67 80C995.556 133.333 924.444 133.333 853.333 80C782.222 26.6667 711.111 26.6667 640 80C568.889 133.333 497.778 133.333 426.667 80C355.556 26.6667 284.444 26.6667 213.333 80Z"
                    fill="#FFFCEE" />
            </svg>
            <div class="single__footer">
                <div class="single__btn">
                    <a href="<?php echo home_url('/news') ?>">一覧にもどる</a>
                </div><!-- /.single__btn -->
            </div><!-- /.single__footer -->
        </div>
        </div>

    </main>
<?php endwhile; ?>
<?php get_footer(); ?>