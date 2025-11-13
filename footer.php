<?php

/**
 * Version    : 1.0.0
 * Author     : pichipichi
 * Author URI : https://pichipichi.co.jp/
 */
?>

<div class="footer">
    <div class="footer__container container">
        <div class="footer__wrapper">
            <ul class="footer__menu">
                <?php
                $menuItems = get_custom_menu_items();
                foreach ($menuItems as $item) {
                    echo "<li class='footer__menu-item'><a href='" . $item['url'] . "'>" . $item['name'] . "</a></li>";
                }
                ?>
            </ul><!-- /.footer__menu -->
            <div class="footer__info">
                <a href="">
                    <img src='<?php echo get_stylesheet_directory_uri(); ?>/img/logomark.svg' alt='ぴちぴち株式会社ロゴ'>
                </a>
                <p class="footer__info-title">
                    ぴちぴち株式会社
                </p><!-- /.footer__info-title -->
                <p class="footer__info-address">
                    〒669-1133<br>
                    兵庫県西宮市東山台４－４－９
                </p><!-- /.footer__info-address -->
                <p class="footer__info-copy">
                    © 2025 Pichi-Pichi
                </p><!-- /.footer__info-copy -->
            </div><!-- /.footer__info -->
        </div><!-- /.footer__wrapper -->
    </div><!-- /.footer__container container -->
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // 全ての.circle__puru要素を取得
        const elements = document.querySelectorAll('.circle__puru');

        elements.forEach((element, index) => {
            // アニメーションを開始する関数
            function startAnimation() {
                element.style.animationPlayState = 'running';

                setTimeout(() => {
                    element.style.animationPlayState = 'paused';
                }, 200); // アニメーションの期間に合わせてリセット
            }

            // 2つ目、3つ目...の要素には遅延を設定
            const delay = index * 500; // 1つ目は0秒、2つ目は1秒、3つ目は2秒の遅延

            // setIntervalを使用して3秒ごとにアニメーションを繰り返し、遅延を加える
            setInterval(() => {
                setTimeout(startAnimation, delay);
            }, 1500);
        });
    });
</script>

<script>
    // Also can pass in optional settings block
    var rellax = new Rellax('.circle', {
        speed: -2,
        center: false,
        wrapper: null,
        round: true,
        vertical: true,
        horizontal: false
    });
</script>
<?php wp_footer() ?>
</body>

</html>