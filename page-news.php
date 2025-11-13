<?php

/**
 * Template Name: ニュース一覧
 * Template Post Type: page
 * @package WordPress
 * @subpackage  Pichi pichi Co., Ltd.
 * @since 1.0.0
 */
?>
<? get_header();
include 'nav.php' ?>
<main class="news lowNews">
    <div class="bg">
        <div class="news__container container lowNews__container">
            <div class="lowNews__title c-headline">
                <?php $slug = $post->post_name;
                $slug_with_spaces = str_replace('-', ' ', $slug);
                ?>
                <h1><?php echo $slug_with_spaces ?></h1>
                <p><?php the_title(); ?></p>
            </div><!-- /.container -->
            <ul class="news__wrapper">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 10,
                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
                ?>
                        <li class="news__item">
                            <a href="<?php the_permalink(); ?>" class="news__item-link">
                                <?php if (has_post_thumbnail()): ?>
                                    <div class=" news__item-thumbnail">
                                        <?php the_post_thumbnail('thumbnail'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="news__item-title">
                                    <p>
                                        <?php the_modified_date('F j, Y'); ?></p>
                                    <h4>
                                        <?php the_title(); ?>
                                    </h4>
                                </div><!-- /.news__item-title -->

                            </a>
                        </li>
                    <?php
                    endwhile;
                else :
                    ?>
                    <p>投稿が見つかりませんでした。</p>

                <?php
                endif; ?>
            </ul><!-- /.news__wrapper -->
            <div class="lowNews__pagination">
                <? // ページネーション
                $big = 999999999; // need an unlikely integer
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $the_query->max_num_pages
                ));
                // メインクエリのリセット
                wp_reset_postdata();
                ?>
            </div><!-- /.lowNews__pagination -->
        </div><!-- /.about__headline -->
    </div><!-- /.bg -->
</main><!-- /.news -->

<? get_footer(); ?>