<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.querySelector('.menu-toggle');
        const hamburger = document.querySelector('.hamburger');
        const menuLinks = document.querySelectorAll('.hamburger__wrapper a');
        const menuText = document.querySelector('.c-btn01__text');

        menuToggle.addEventListener('click', function() {
            menuToggle.classList.toggle('open');
            hamburger.classList.toggle('open');
            // メニューの状態に応じてテキストを変更
            if (menuToggle.classList.contains('open')) {
                menuText.textContent = 'CLOSE ✖';
            } else {
                menuText.textContent = 'MENU';
            }
        });

        // 各メニューリンクに対してクリックイベントを追加
        menuLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                // リンクをクリックしたときにメニューを閉じる
                menuToggle.classList.remove('open');
                hamburger.classList.remove('open');
                // メニューを閉じたらテキストをMENUに戻す
                menuText.textContent = 'MENU';
            });
        });
    });
</script>

<div class="header">
    <div class="header__container">
        <a href="<?php echo home_url('/') ?>" class="header__logo">
            <img src='<?php echo get_stylesheet_directory_uri(); ?>/img/logomark.svg' alt='ぴちぴち株式会社ロゴ'>
        </a><!-- /.header__logo -->
        <nav class="header__global-menu">
            <ul class="global-menu">
                <?php
                $menuItems = get_custom_menu_items();
                foreach ($menuItems as $item) {
                    echo "<li class='global-menu__item c-btn01'>
                        <a href='" . $item['url'] . "'><p>" . $item['name'] . "</p></a></li>";
                }
                ?>
            </ul>
        </nav>
        <div class="menu-toggle c-btn01">
            <p class="c-btn01__text">
                MENU
            </p>
        </div>
    </div><!-- /.header__container -->
</div>

<!-- ハンバーガーメニュー -->
<nav class="hamburger">
    <ul class="hamburger__wrapper">
        <?php
        for ($i = 0; $i < count($menuItems); $i++) {
            echo "<li class='hamburger__item'><a href='" . $menuItems[$i]['url'] . "'>" . $menuItems[$i]['name'] . "</a></li>";
        }
        ?>
    </ul>
</nav>