<?php

/**
 * Template Name: トップページ
 * Template Post Type: page
 * @package WordPress
 * @subpackage  Pichi pichi Co., Ltd.
 * @since 1.0.0
 */
?>

<? get_header();
include 'nav.php' ?>
<main class="top">
    <div class="bg">
        <div class="fv">
            <div class="fv__logo">
                <img src='<?php echo get_stylesheet_directory_uri(); ?>/img/text_copy.svg' alt='デジタルでくらしをぴちぴちに'>
            </div><!-- /.fv__logo -->
            <div class="fv__circle-yellow01 circle">
                <img class="circle__puru" src='<?php echo get_stylesheet_directory_uri(); ?>/img/circle_yellow.svg'
                    alt='黄色いぷるぷるな円'>
            </div>
            <div class="fv__circle-pink circle">
                <img class="circle__puru" src='<?php echo get_stylesheet_directory_uri(); ?>/img/circle_pink.svg'
                    alt='ピンクなぷるぷるな円'>
            </div>
            <div class="fv__circle-yellow02 circle circle__small">
                <img class="circle__puru" src='<?php echo get_stylesheet_directory_uri(); ?>/img/circle_yellow.svg'
                    alt='黄色いぷるぷるな円'>
            </div>
        </div><!-- /.fv -->
        <section class=" mission">
            <div class="mission__container container-pc">
                <div class="mission__wrapper">
                    <div class="mission__title c-headline">
                        <h2>
                            OUR<span>MISSION</span>
                        </h2>
                        <p class="mission__sub_title h2-subtitle">
                            私たちのミッション
                        </p><!-- /.mission__sub_title -->
                    </div><!-- /.mission__title -->
                    <div class="mission__circle_bg circle__bg">
                        <div class="mission__cont circle__content">
                            <div class="mission__heading">
                                <h3>デジタルでくらしを<br>
                                    ぴちぴちに</h3>
                                <p>どれだけ歳をとろうと
                                    <span>気持ちや心はいつまでも若々しくありたい。</span>
                                    <span>誰もがそんな人生を歩める社会を作るために</span>
                                    <span>私たちはデジタルの恩恵をすべての人へ届けます。</span>
                                </p>
                                <div class="c-btn01 mission__btn c-arrow">
                                    <a href="<?php echo home_url('/about-us') ?>">
                                        <p>about us</p>
                                    </a>
                                </div><!-- /.c-btn -->
                            </div><!-- /.mission__heading -->
                        </div><!-- /.mission__cont -->
                    </div><!-- /.mission__circle_bg circle__bg -->
                </div><!-- /.mission__wrapper -->
            </div><!-- /.mission__container -->
        </section><!-- /.mission -->
        <section class="we-do">
            <div class="we-do__container container-pc">
                <div class="we-do__circle-pink circle circle__regular">
                    <img class="circle__puru" src='<?php echo get_stylesheet_directory_uri(); ?>/img/circle_pink.svg'
                        alt='ピンクなぷるぷるな円'>
                </div>
                <div class="we-do__circle-yellow circle circle__small">
                    <img class="circle__puru" src='<?php echo get_stylesheet_directory_uri(); ?>/img/circle_yellow.svg'
                        alt='黄色いぷるぷるな円'>
                </div>

                <div class="we-do__wrapper">
                    <div class="we-do__circle_bg circle__bg">
                        <div class="we-do__cont circle__content">
                            <div class="we-do__heading">
                                <h3>デジタルイノベーションで
                                    <span>高齢化の社会課題に挑む</span>
                                </h3>
                                <p>
                                    革新的なテクノロジーを駆使して高齢化社会の核心的な問題解決に取り組んでいます。すべての人がデジタルと共存し、恩恵を受けられる社会が来たとき、人々の暮らしや価値観が、さらに豊かなものになることを信じています。
                                </p>
                            </div><!-- /.mission__heading -->
                        </div><!-- /.mission__cont -->
                    </div><!-- /.mission__circle_bg circle_bg -->
                    <div class="we-do__title c-headline">
                        <h2>
                            WHAT<span>WE DO</span>
                        </h2>
                        <p class="we-do__sub_title h2-subtitle">
                            私たちがやること
                        </p><!-- /.mission__sub_title -->
                    </div><!-- /.mission__title -->
                </div><!-- /.mission__wrapper -->

            </div><!-- /.mission__container -->
        </section><!-- /.we-do -->
        <section id="service" class="service">
            <div class="service__container container">
                <div class="service__wrapper">
                    <div class="service__title c-headline">
                        <h2>Service</h2>
                        <p class="h2-subtitle">
                            サービス内容
                        </p><!-- /.h20subtitle -->
                    </div><!-- /.service__title -->
                    <div class="service__contents swiper-container">
                        <?php
                        $services = [
                            //                             [
                            //                                 "title" => "『 たっぷ 』",
                            //                                 "subtitle" => "デジタルセラピーペット",
                            //                                 "icon" => "icon-dogs.svg",
                            //                                 "detail" => "高齢者のためのデジタルペットサービスです。近々リリース予定。",
                            //                                 "readmore" => ""
                            //                             ],
                            [
                                "title" => "スマホ教室",
                                "subtitle" => "",
                                "icon" => "icon-phone.svg",
                                "detail" => "高齢者の方々がデジタル社会にスムーズに参加できるように、スマートフォンの基本操作から便利なアプリの使い方まで、丁寧に指導するスマホ教室を開催・運営しています。",
                                "readmore" => ""
                            ],
                            [
                                "title" => "システム開発",
                                "subtitle" => "",
                                "icon" => "icon-system.svg",
                                "detail" => "高齢者の社会課題を解決するシステムの開発を行っています。ウェブサイトの構築やアプリケーションの構築など多岐にわたってシステムの開発をお手伝いします。",
                                "readmore" => ""
                            ],
                        ];
                        ?>
                        <div class="service__slick swiper-wrapper">
                            <?php foreach ($services as $service): ?>
                                <div class="service__card swiper-slide">
                                    <div class="service__card-icon">
                                        <img src="<?= get_stylesheet_directory_uri() . '/img/' . htmlspecialchars($service['icon']); ?>"
                                            alt="Icon">
                                    </div>
                                    <div class="service__card-content">

                                        <p class="service__card-subtitle">
                                            <?= htmlspecialchars($service['subtitle']); ?>
                                        </p>

                                        <h4 class="service__card-title">
                                            <?= htmlspecialchars($service['title']); ?>
                                        </h4>
                                        <p class="service__card-detail">
                                            <?= htmlspecialchars($service['detail']); ?>
                                        </p>
                                        <?php if (!empty($service['readmore'])): ?>
                                            <div class="service__card-readmore">
                                                <a href="<?= htmlspecialchars($service['readmore']); ?>">Read More</a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div><!-- /.service__slick -->
                        <div class="swiper-button-next">
                            <img src='<?php echo get_stylesheet_directory_uri(); ?>/img/arrow_right.svg' alt=''>
                        </div>
                        <div class="swiper-button-prev">
                            <img src='<?php echo get_stylesheet_directory_uri(); ?>/img/arrow_left.svg' alt=''>
                        </div>
                    </div><!-- /.service__contents -->
                </div><!-- /.service__wrapper -->
            </div><!-- /.service__container container -->
        </section><!-- /.service -->
        <svg class="section_wave wave_top" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1920 120"
            fill="#FFFCEE">
            <path
                d="M213.333 40C142.222 -13.3333 71.1111 -13.3333 0 40V120H1920V40C1848.89 -13.3333 1777.78 -13.3333 1706.67 40C1635.56 93.3333 1564.44 93.3333 1493.33 40C1422.22 -13.3333 1351.11 -13.3333 1280 40C1208.89 93.3333 1137.78 93.3333 1066.67 40C995.556 -13.3333 924.444 -13.3333 853.333 40C782.222 93.3333 711.111 93.3333 640 40C568.889 -13.3333 497.778 -13.3333 426.667 40C355.556 93.3333 284.444 93.3333 213.333 40Z"
                fill="#FFFCEE" />
        </svg>
        <div class="bg-white">
            <section class="news">
                <div class="news__container container">
                    <div class="news__wrapper">
                        <div class="news__title c-headline">
                            <h2>
                                news
                            </h2>
                            <p class="h2-subtitle">
                                お知らせ
                            </p><!-- /.h20subtitle -->
                            <div class="news__btn">
                                <div class="c-btn02 c-arrow02">
                                    <a class="c-btn02__text" href="<?php echo home_url('/news') ?>">
                                        お知らせ一覧
                                    </a>
                                </div><!-- /.c-btn02 c-arrow02 -->
                            </div><!-- /.news__btn -->
                        </div><!-- /.news__title -->
                        <ul class="news__contents">
                            <?php
                            $args = array(
                                'post_type' => 'post', // 投稿タイプ
                                'posts_per_page' => 3, // 表示する投稿数
                                'orderby' => 'date', // 日付で並び替え
                                'order' => 'DESC' // 降順で表示
                            );
                            $the_query = new WP_Query($args);
                            if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
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
                            else:
                                ?> <p>投稿がありません。</p>
                            <?php
                            endif;
                            wp_reset_postdata();
                            ?>
                        </ul><!-- /.news__contents -->
                    </div><!-- /.news__wrapper -->
                </div><!-- /.news__container container -->
            </section><!-- /.news -->
            <section class="member">
                <div class="member__container container">
                    <div class="member__title c-headline">
                        <h2>
                            member
                        </h2>
                        <p class="h2-subtitle">
                            メンバー
                        </p><!-- /.h20subtitle -->
                    </div><!-- /.member__title -->
                    <ul class="member__cards">
                        <?php
                        $members = [
                            ["image" => "https://pichipichi.co.jp/wp-content/uploads/2024/03/tatsuhito.webp", "title" => "代表取締役", "name" => "三崎 龍人"],
                            ["image" => "https://pichipichi.co.jp/wp-content/uploads/2024/03/hagi.webp", "title" => "取締役 / CTO", "name" => "萩倉 丈"],
                        ];
                        foreach ($members as $member): ?>
                            <li class="member__card">
                                <!-- <a href="<?php the_permalink(); ?>" class="member__card-link"> -->
                                <div class="member__card-overflow">
                                    <img src="<?= htmlspecialchars($member['image']); ?>"
                                        alt="<?= htmlspecialchars($member['name']); ?>">
                                </div><!-- /.member__card-overflow -->
                                <div class="member__card-wrapper">
                                    <p>
                                        <?= htmlspecialchars($member['title']); ?>
                                    </p>
                                    <h3>
                                        <?= htmlspecialchars($member['name']); ?>
                                    </h3>

                                </div><!-- /.member__card-wrapper -->
                                <!-- </a> -->
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div><!-- /.member__container container -->

            </section><!-- /.member -->
            <section class="bana">
                <div class="container">
                    <picture>
                        <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/img/bana_sp.png"
                            media="(max-width: 768px)">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/bana.png" alt="メンバー募集">
                    </picture>
                </div><!-- /.container -->
            </section><!-- /.bane -->
        </div><!-- /.bg-white -->
        <svg class="section_wave wave_bottom" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1920 120"
            fill="#FFFCEE">
            <path
                d="M213.333 80C142.222 133.333 71.1111 133.333 0 80V0H1920V80C1848.89 133.333 1777.78 133.333 1706.67 80C1635.56 26.6667 1564.44 26.6667 1493.33 80C1422.22 133.333 1351.11 133.333 1280 80C1208.89 26.6667 1137.78 26.6667 1066.67 80C995.556 133.333 924.444 133.333 853.333 80C782.222 26.6667 711.111 26.6667 640 80C568.889 133.333 497.778 133.333 426.667 80C355.556 26.6667 284.444 26.6667 213.333 80Z"
                fill="#FFFCEE" />
        </svg>
        <section id="contact" class="contact">
            <div class="contact__container container">
                <div class="contact__wrapper">
                    <div class="contact__title c-headline">
                        <h2>
                            contact
                        </h2>
                        <p class="h2-subtitle">
                            お問い合わせ
                        </p><!-- /.h20subtitle -->
                    </div><!-- /.member__title -->
                    <div class="contact__contents">
                        <?php echo do_shortcode('[contact-form-7 id="dc765f9" title="front-page"]'); ?>
                    </div><!-- /.contact__contents -->
                </div><!-- /.contact__wrapper -->
            </div><!-- /.contact__container container -->
        </section><!-- /.contact -->
    </div><!-- /.bg -->
</main>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    let mySwiper = null;
    const initSwiper = () => {
        mySwiper = new Swiper('.swiper-container', {
            slidesPerView: 'auto',
            centeredSlides: true,
            initialSlide: 0,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: false,
        });
    };

    const mediaQuery = window.matchMedia('(max-width: 1024px)');
    const checkBreakpoint = (e) => {
        if (e.matches) {
            initSwiper();
        } else if (mySwiper) {
            mySwiper.destroy(true, true);
            mySwiper = null;
        }
    }

    mediaQuery.addListener(checkBreakpoint);
    checkBreakpoint(mediaQuery);
</script>

<? get_footer(); ?>