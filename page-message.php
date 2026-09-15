<?php

/**
 * Template Name: 代表紹介
 * Template Post Type: page
 */
get_header();
?>
<main class="message">
    <nav class="message__nav" aria-label="メインナビゲーション">
        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/logomark.svg" alt="ぴちぴち株式会社 ホーム" width="70" height="60"></a>
        <div class="message__desktop-links"><a href="<?php echo esc_url(home_url('/about-us')); ?>">ABOUT US</a><span>/</span><a href="<?php echo esc_url(home_url('/#service')); ?>">OUR BUSINESS</a><span>/</span><a href="<?php echo esc_url(home_url('/#contact')); ?>">CONTACT</a></div>
        <details class="message__mobile-menu">
            <summary>MENU</summary>
            <ul>
                <li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
                <li><a href="<?php echo esc_url(home_url('/about-us')); ?>">ABOUT US</a></li>
                <li><a href="<?php echo esc_url(home_url('/#service')); ?>">OUR BUSINESS</a></li>
                <li><a href="<?php echo esc_url(home_url('/#contact')); ?>">CONTACT</a></li>
            </ul>
        </details>
    </nav>
    <section class="message__hero message__section">
        <p class="message__eyebrow">I’M TATSUHITO.</p>
        <div class="message__intro">
            <div>
                <h1>千里の行も<br>目下より始まる</h1>
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
    <img class="message__wave" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/message-wave.svg" alt="">
    <section class="message__journey message__section" aria-labelledby="journey-title">
        <h2 id="journey-title" class="message__display">MY JOURNEY</h2>
        <p class="message__lead">つくる力を、<br>地域で生きる力へ。</p>
        <ol class="message__timeline">
            <?php foreach (
                [
                    ['2020', '技術を学ぶ', '関西学院大学で人間システム工学を学び、卒業。'],
                    ['2021', '経営に踏み出す', 'MOVEDOORを共同創業。経営管理と開発を経験。'],
                    ['2023', 'ぴちぴちを設立', '自らの会社で、デジタルを暮らしへ届ける挑戦を始める。'],
                    ['2025', '丹波篠山へ', '移住し、ソーセージ体験事業を立ち上げる。'],
                ] as $event
            ) : ?>
                <li><span class="message__year"><?php echo esc_html($event[0]); ?></span>
                    <h3><?php echo esc_html($event[1]); ?></h3>
                    <p><?php echo esc_html($event[2]); ?></p>
                </li>
            <?php endforeach; ?>
        </ol>
        <img class="message__path" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/message-journey.svg" alt="">
        <p class="message__learning">2025年 介護職員初任者研修 修了。<br>暮らしを支えるための学びも、現場とともに。</p>
    </section>
    <section class="message__work message__section" aria-labelledby="work-title">
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
    </section>
    <img class="message__wave" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/message-wave.svg" alt="">
    <section class="message__partners message__section" aria-labelledby="partners-title">
        <h2 id="partners-title" class="message__display">DEAR PARTNERS,</h2>
        <div class="message__letter">
            <h3>面白い挑戦を、<br>誠実な仕事から。</h3>
            <p>私たちの事業は、地域で顔を合わせる仕事と、デジタルの可能性の両方から生まれています。</p>
            <p>目の前のお客様との約束を大切にし、できることと準備中のことを明確に伝える。そうした日々の積み重ねが、新しい挑戦を支えると考えています。</p>
            <p>皆様と対話しながら、暮らしと地域に長く役立つ仕事をつくっていきたいと思います。</p>
            <p class="message__role">ぴちぴち株式会社 代表取締役</p>
            <p class="message__signature">三崎 龍人</p>
        </div>
    </section>
    <footer class="message__footer">
        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/logomark.svg" alt="ぴちぴち株式会社 ホーム" width="60" height="51"></a>
        <p class="message__company">ぴちぴち株式会社</p>
        <p>活動拠点：兵庫県丹波篠山市<br><a href="<?php echo esc_url(home_url('/about-us')); ?>">会社情報</a>　／　<a href="<?php echo esc_url(home_url('/#contact')); ?>">お問い合わせ</a></p>
        <small>© <?php echo esc_html(date('Y')); ?> Pichi-Pichi</small>
    </footer>
</main>
<?php wp_footer(); ?>
</body>

</html>