<?php

/**
 * Template Name: 代表紹介
 * Template Post Type: page
 */
get_header();
include 'nav.php';
?>
<main class="message">
    <div class="bg">
        <div class="message__headline low-c-headline">
            <?php $slug = $post->post_name;
            $slug_with_spaces = str_replace('-', ' ', $slug);
            ?>
            <div class="container">
                <h1><?php echo $slug_with_spaces ?></h1>
                <p><?php the_title(); ?></p>
            </div>
        </div>
        <svg class="section_wave wave_top" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1920 120"
            fill="#FFFCEE">
            <path
                d="M213.333 40C142.222 -13.3333 71.1111 -13.3333 0 40V120H1920V40C1848.89 -13.3333 1777.78 -13.3333 1706.67 40C1635.56 93.3333 1564.44 93.3333 1493.33 40C1422.22 -13.3333 1351.11 -13.3333 1280 40C1208.89 93.3333 1137.78 93.3333 1066.67 40C995.556 -13.3333 924.444 -13.3333 853.333 40C782.222 93.3333 711.111 93.3333 640 40C568.889 -13.3333 497.778 -13.3333 426.667 40C355.556 93.3333 284.444 93.3333 213.333 40Z"
                fill="#FFFCEE" />
        </svg>
        <div class="bg-white">
            <section class="message__hero message__section">
                <p class="message__eyebrow">CEO MESSAGE</p>
                <div class="message__intro">
                    <div>
                        <h2 class="message__quote">継続は力なり</h2>
                        <p class="message__role">ぴちぴち株式会社 代表取締役</p>
                        <p class="message__name">三崎 龍人</p>
                    </div>
                    <div class="message__portrait">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('full', ['alt' => 'ぴちぴち株式会社 代表取締役 三崎龍人']); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/tatsuhito-misaki.jpg" alt="ぴちぴち株式会社 代表取締役 三崎龍人" width="1144" height="1430" fetchpriority="high">
                        <?php endif; ?>
                    </div>
                </div>
            </section>

            <section class="message__journey message__section" aria-labelledby="journey-title">
                <h2 id="journey-title" class="message__display">MY JOURNEY</h2>
                <p class="message__lead">つくる力を、<br>地域で生きる力へ。</p>
                <ol class="message__timeline">
                    <?php foreach (
                        [
                            ['2020', '技術を学ぶ', '関西学院大学 理工学部 人間システム工学科を卒業。映像処理技術を研究。'],
                            ['2021', '経営に踏み出す', '株式会社MOVEDOORを共同創業。経営管理と開発を経験。'],
                            ['2023', '再び挑戦へ', 'ぴちぴち株式会社を設立。デジタルを暮らしへ届ける挑戦を始める。'],
                            ['2025', '丹波篠山へ', '移住し、シシニクとソーセージを立ち上げる。'],
                            ['2025', '学びを重ねる', '介護職員初任者研修 修了。暮らしを支える学びを現場とともに。'],
                        ] as $event
                    ) : ?>
                        <li><span class="message__year"><?php echo esc_html($event[0]); ?></span>
                            <h3><?php echo esc_html($event[1]); ?></h3>
                            <p><?php echo esc_html($event[2]); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ol>
                <img class="message__path" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/message-journey.svg" alt="">
            </section>
        </div>

        <svg class="section_wave wave_bottom" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1920 120"
            fill="#FFFCEE">
            <path
                d="M213.333 80C142.222 133.333 71.1111 133.333 0 80V0H1920V80C1848.89 133.333 1777.78 133.333 1706.67 80C1635.56 26.6667 1564.44 26.6667 1493.33 80C1422.22 133.333 1351.11 133.333 1280 80C1208.89 26.6667 1137.78 26.6667 1066.67 80C995.556 133.333 924.444 133.333 853.333 80C782.222 26.6667 711.111 26.6667 640 80C568.889 133.333 497.778 133.333 426.667 80C355.556 26.6667 284.444 26.6667 213.333 80Z"
                fill="#FFFCEE" />
        </svg>

        <section class="message__work message__section" aria-labelledby="work-title">
            <div class="container">
                <h2 id="work-title" class="message__display">HOW I WORK</h2>
                <ol>
                    <?php foreach (
                        [
                            ['01', '現場で聞く。', '画面の向こうだけで考えず、地域の声に耳を傾ける。暮らしの中にある困りごとから、仕事を始めます。'],
                            ['02', '自分でつくる。', '経営と開発の経験を生かし、アイデアをかたちに。小さく試して、使う人の声から改善を重ねます。'],
                            ['03', '続く事業にする。', '既存のお客様との仕事を大切にしながら、新しい挑戦へ。約束を守り、長く必要とされる事業を育てます。'],
                        ] as $principle
                    ) : ?>
                        <li><span><?php echo esc_html($principle[0]); ?></span>
                            <div>
                                <h3><?php echo esc_html($principle[1]); ?></h3>
                                <p><?php echo esc_html($principle[2]); ?></p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </section>

        <section class="message__skills message__section" aria-labelledby="skills-title">
            <div class="container">
                <h2 id="skills-title" class="message__display">SKILLS</h2>
                <div class="message__skills-grid">
                    <?php foreach (
                        [
                            ['システム開発', 'Python / Unity / C# / C++ / Java / Kotlin'],
                            ['Web開発', 'JavaScript / React / Next.js / PHP'],
                            ['クラウド', 'Firebase / Google Cloud'],
                            ['映像・デザイン', 'Premiere Pro / After Effects / Illustrator / Photoshop'],
                        ] as $skill
                    ) : ?>
                        <div class="message__skills-item">
                            <h3><?php echo esc_html($skill[0]); ?></h3>
                            <p><?php echo esc_html($skill[1]); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="message__partners message__section" aria-labelledby="partners-title">
            <div class="container">
                <h2 id="partners-title" class="message__display">DEAR PARTNERS,</h2>
                <div class="message__letter">
                    <h3>面白い挑戦を、<br>誠実な仕事から。</h3>
                    <p>私たちの事業は、地域で顔を合わせる仕事と、デジタルの可能性の両方から生まれています。</p>
                    <p>目の前のお客様との約束を大切にし、できることと準備中のことを明確に伝える。そうした日々の積み重ねが、新しい挑戦を支えると考えています。</p>
                    <p>皆様と対話しながら、暮らしと地域に長く役立つ仕事をつくっていきたいと思います。</p>
                    <p class="message__role">ぴちぴち株式会社 代表取締役</p>
                    <p class="message__signature">三崎 龍人</p>
                </div>
            </div>
        </section>
    </div><!-- /.bg -->
</main>
<?php get_footer(); ?>
