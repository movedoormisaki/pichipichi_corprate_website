<?php

/**
 * Template Name: 私たちについて
 * Template Post Type: page
 * @package WordPress
 * @subpackage  Pichi pichi Co., Ltd.
 * @since 1.0.0
 */
?>
<? get_header();
include 'nav.php' ?>
<main class="about">
    <div class="bg">
        <div class="about__headline low-c-headline">
            <?php $slug = $post->post_name;
            $slug_with_spaces = str_replace('-', ' ', $slug);
            ?>
            <div class="about__container container">
                <h1><?php echo $slug_with_spaces ?></h1>
                <p><?php the_title(); ?></p>
            </div><!-- /.container -->
        </div><!-- /.about__headline -->
        <svg class="section_wave wave_top" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1920 120"
            fill="#FFFCEE">
            <path
                d="M213.333 40C142.222 -13.3333 71.1111 -13.3333 0 40V120H1920V40C1848.89 -13.3333 1777.78 -13.3333 1706.67 40C1635.56 93.3333 1564.44 93.3333 1493.33 40C1422.22 -13.3333 1351.11 -13.3333 1280 40C1208.89 93.3333 1137.78 93.3333 1066.67 40C995.556 -13.3333 924.444 -13.3333 853.333 40C782.222 93.3333 711.111 93.3333 640 40C568.889 -13.3333 497.778 -13.3333 426.667 40C355.556 93.3333 284.444 93.3333 213.333 40Z"
                fill="#FFFCEE" />
        </svg>
        <div class="bg-white">
            <div class="about__circle-yellow01 circle">
                <img class="circle__puru" src='<?php echo get_stylesheet_directory_uri(); ?>/img/circle_yellow.svg'
                    alt='黄色いぷるぷるな円'>
            </div>
            <div class="about__circle-pink circle">
                <img class="circle__puru" src='<?php echo get_stylesheet_directory_uri(); ?>/img/circle_pink.svg'
                    alt='ピンクなぷるぷるな円'>
            </div>
            <div class="about__circle-yellow02 circle">
                <img class="circle__puru" src='<?php echo get_stylesheet_directory_uri(); ?>/img/circle_yellow.svg'
                    alt='黄色いぷるぷるな円'>
            </div>

            <div class="about__container container">
                <section class="about__content">
                    <div class="about__mission about__group">
                        <p class="subtitle">
                            MISSION
                        </p><!-- /.subtitle -->
                        <h2>
                            デジタルで くらしを ぴちぴちに
                        </h2>
                        <p>
                            どれだけ歳をとろうと、気持ちや心はいつまでも若々しくありたい。誰もがそんな人生を歩める社会を作るために、私たちはデジタルの恩恵をすべての人へ届けます。
                        </p>
                    </div><!-- /.about__mission -->

                    <div class="about__vision about__group">
                        <p class="subtitle">
                            VISION
                        </p><!-- /.subtitle -->
                        <h2>
                            バーチャルとリアルを<br>
                            愛でつなぐ
                        </h2>
                        <p>
                            デジタルが一般化し、バーチャルが日常に溶け込む今、便利さの裏で、取り残される人も増えています。だからこそ、必要なのは「愛」。技術が進んでも、人が心を開くには温かみが欠かせません。私たちは、どんな人でも愛でバーチャルの世界へ入れるようにする。リアルとバーチャルの垣根をなくし、誰もが安心して新しい世界につながれる未来を創ります。
                        </p>
                    </div><!-- /.about__mission -->

                    <div class="about__story about__group">
                        <p class="subtitle">
                            STORY
                        </p><!-- /.subtitle -->
                        <h2>
                            じっち、ばぁばに<br>
                            楽しんでもらいたい
                        </h2>
                        <p>
                            じいじは丹波篠山、ばぁばは奈良。それぞれ75歳を超え、一人暮らし。会いたいけど頻繁には行けない。でも、離れていても楽しい時間を過ごしてほしい。そんな人はきっとたくさんいる。だからこそ、今できることをしたい。
                        </p>
                    </div><!-- /.about__mission -->
                </section>
            </div><!-- /.about__container container -->
        </div><!-- /.bg-white -->
        <svg class="section_wave wave_bottom" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1920 120"
            fill="#FFFCEE">
            <path
                d="M213.333 80C142.222 133.333 71.1111 133.333 0 80V0H1920V80C1848.89 133.333 1777.78 133.333 1706.67 80C1635.56 26.6667 1564.44 26.6667 1493.33 80C1422.22 133.333 1351.11 133.333 1280 80C1208.89 26.6667 1137.78 26.6667 1066.67 80C995.556 133.333 924.444 133.333 853.333 80C782.222 26.6667 711.111 26.6667 640 80C568.889 133.333 497.778 133.333 426.667 80C355.556 26.6667 284.444 26.6667 213.333 80Z"
                fill="#FFFCEE" />
        </svg>

        <section class="about__info">
            <div class="about__container container">
                <div class="about__info-wrapper">
                    <div class="about__info-title c-headline">
                        <h2>
                            info
                        </h2>
                        <p class="h2-subtitle">
                            会社概要
                        </p><!-- /.h20subtitle -->
                    </div><!-- /.about__info-title -->
                    <div class="about__info-contents">
                        <div class="about__info-group">
                            <p class="about__info-title">
                                会社名
                            </p>
                            <p class="about__info-detail">
                                ぴちぴち株式会社
                            </p><!-- /.about__info-detail -->
                        </div><!-- /.about__info-group -->

                        <div class="about__info-group">
                            <p class="about__info-title">
                                資本金
                            </p>
                            <p class="about__info-detail">
                                1,500,000円
                            </p><!-- /.about__info-detail -->
                        </div><!-- /.about__info-group -->

                        <div class="about__info-group">
                            <p class="about__info-title">
                                代表者
                            </p>
                            <p class="about__info-detail">
                                三崎 龍人
                            </p><!-- /.about__info-detail -->
                        </div><!-- /.about__info-group -->

                        <div class="about__info-group">
                            <p class="about__info-title">
                                従業員数
                            </p>
                            <p class="about__info-detail">
                                3名
                            </p><!-- /.about__info-detail -->
                        </div><!-- /.about__info-group -->

                        <div class="about__info-group">
                            <p class="about__info-title">
                                所在地
                            </p>
                            <p class="about__info-detail">
                                〒669-1133<br>
                                兵庫県西宮市東山台4-4-9
                            </p><!-- /.about__info-detail -->
                        </div><!-- /.about__info-group -->
                    </div><!-- /.about-info-contents -->
                </div><!-- /.about__info-wrapper -->
            </div><!-- /.about__container -->
        </section><!-- /.info -->
    </div><!-- /.bg -->
</main><!-- /.about -->

<? get_footer(); ?>