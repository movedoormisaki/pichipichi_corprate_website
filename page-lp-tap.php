<?php

/**
 * Template Name: LP Tap Page
 * Template Post Type: page
 */

get_header(); ?>

<div class="lp">
    <div class="lp__pc">
        <img class="lp__pc_logo" src='<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-icon-logo.webp' alt='ロゴ'>
        <img class="lp__pc_decoration" src='<?php echo get_stylesheet_directory_uri(); ?>/lp-img/icon_pc_decoration.svg' alt='ロゴ'>
    </div><!-- /.lp__pc_background -->
    <main class="lp__wrapper">
        <div class="lp__monitor_btn lp__btn01">
            <a href="#join" class="lp__btn01__contents">
                <p class="lp__btn01__text">モニターに参加する</p>
                <img src='<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-icon-arrow01.svg' alt='矢印'>
            </a>
        </div><!-- /.lp__monitor_btn -->
        <div class="lp__fv">
            <div class="lp__fv-background">
                <img class="lp__fv-background_image" src='<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-shape03.svg' alt=''>
                <div class="lp__swiper">
                    <div class="swiper-container mySwiper">
                        <img class="lp__fv-background_sticker" src='<?php echo get_stylesheet_directory_uri(); ?>/lp-img/icon-mimamori.svg' alt='見守り機能あり'>
                        <div class="swiper-wrapper">
                            <?php for ($i = 1; $i <= 5; $i++) { ?>
                                <div class="swiper-slide">
                                    <video src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/video<?php echo $i; ?>.mp4" autoplay muted loop preload="metadata" poster="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/video-poster.jpg" loading="lazy"></video>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div><!-- /.swiper -->

                <div class="lp__fv-logo">
                    <img class="lp__fv-title" src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-icon-logo.webp" alt="ロゴ">
                    <p class="lp__fv-subtitle">楽しく<span>見守り</span>してみませんか？</p>
                    <div class="lp__container">
                        <div class="lp__fv-monitor_ad">
                            <h2>モニターさん<br>募集中</h2>
                            <p>・可愛いデジタルペットを飼ってみたい！<br>・祖父や祖母にプレゼントしたい！<br>・気軽に一度試したい！</p>
                            <p><span>モニターさまの定員が埋まり次第募集を終了させていただきます。</span></p>
                        </div><!-- /.lp__fv-monitor_ad -->
                    </div><!-- /.lp__container -->

                </div><!-- /.lp__fv-logo -->
            </div><!-- /.lp__fv-background -->
            <div class="lp__fv-concept">
                <img class="lp__fv-concept-decoration" src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-decoration02.svg" alt="Decoration 1">
                <img class="lp__fv-concept-img" src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-contents-img01.webp" alt="コンセプト画像">
            </div><!-- /.lp__fv -->
        </div><!-- /.lp__fv -->

        <div class="lp__concept">
            <img class="lp__concept-decoration01" src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-decoration01.svg" alt="Decoration 2">
            <img class="lp__concept-decoration02" src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-decoration02.svg" alt="Decoration 1">
            <div class="lp__container">
                <div class="lp__concept-inner">
                    <div class="lp__title">
                        <div class="lp__concept-icon">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-icon-tap01.svg" alt="アイコン">
                        </div><!-- /.lp__concept-icon -->
                        <div class="lp__concept-title">
                            <h2 class="lp__concept-title__text">デジタルセラピードッグ<br>との暮らし</h2>
                            <p class="lp__concept-title__subtext">life</p>
                        </div><!-- /.lp__concept-title -->
                    </div><!-- /.lp__title -->
                    <div class="lp__concept-video">
                        <div class="video-container">
                            <iframe id="youtube-video" width="560" height="315" src="https://www.youtube.com/embed/4OovEQnhyxk?si=zmfJk16hNI0zo1Lv&modestbranding=1&showinfo=0&rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div><!-- /.lp__concept-video -->
                    <div class="lp__concept-content">
                        <p class="lp__concept-content__text">
                            デジタルセラピードッグ たっぷは<br>
                            あなたの机の上で生き生きと動く<br>
                            <span>デジタルペット</span>です。<br>
                        </p>
                        <p class="lp__concept-content__text">
                            <span>専用の置き型端末</span>を使用することで<br>
                            育成ゲームでは味わえない<br>
                            本物のペットのような存在感を<br>
                            楽しんでください。<br>
                        </p>
                        <p class="lp__concept-content__text">
                            独り暮らしの方や<br>
                            癒しや温もりが欲しい方の<br>
                            心癒される存在として<br>
                            <span>いつまでもあなたのそばにいます。</span>
                        </p><!-- /.lp__concept-content__text -->
                    </div><!-- /.lp__concept-content -->
                </div><!-- /.lp__concept-inner -->
            </div><!-- /.lp__container -->
        </div><!-- /.lp__concept -->

        <div class="lp__feature">
            <img class="lp__feature-shape" src='<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-shape02.svg' alt=''>
            <div class="lp__container lp__feature-background">
                <div class="lp__feature-content">
                    <p class="lp__feature-text">
                        たっぷは<br>
                        指先で育てる生き物です。<br>
                        ただ育てるだけではありません。<br>
                        飼い主さんには６つの<br>
                        いいことがあります。
                    </p><!-- /.lp__feature-text -->
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/dogs03.webp" alt="たっぷのわんちゃん" class="lp__feature-img">
                </div><!-- /.lp__feature-content -->
                <div class="lp__title">
                    <div class="lp__concept-title">
                        <h2 class="lp__concept-title__text">デジタルペット<br>６つの特徴</h2>
                        <p class="lp__concept-title__subtext">feature</p>
                    </div><!-- /.lp__concept-title -->
                </div><!-- /.lp__title -->
                <div class="lp__feature-list">
                    <?php
                    $features = [
                        [
                            'subtitle' => '特徴①',
                            'title' => '操作が簡単',
                            'description' => 'デジタルペットを飼うためのスマホスキルは必要ありません。操作が苦手な方だからこそ簡単に扱えます。ご高齢の方でも安心して育てることが可能です。',
                            'icon' => 'lp-icon-feature01.svg',
                        ],
                        [
                            'subtitle' => '特徴②',
                            'title' => '癒しな存在に',
                            'description' => '眺めているだけでもかわいい！と愛着が湧いてきます。生き物のようにおなかや空いたら鳴き、遊ぶときははしゃぎ、なでてほしいときは甘えてきます。そんな愛くるしい存在をそばに置いてみませんか？',
                            'icon' => 'lp-icon-feature02.svg',
                        ],
                        [
                            'subtitle' => '特徴③',
                            'title' => 'お財布に優しい',
                            'description' => '大手企業が販売しているペットロボットの価格に比べて、圧倒的に安いです。Wifiモデルであれば、月980円だけでずっと飼うことができるのです。',
                            'icon' => 'lp-icon-feature03.svg',
                        ],
                        [
                            'subtitle' => '特徴④',
                            'title' => '人に反応する機能',
                            'description' => 'デジタルペット「たっぷ」には、物体認識・タッチ認識のような機能があります。ただのスマホの育成ゲームにはない機能で、よりリアルで楽しく触れ合うことができます。',
                            'icon' => 'lp-icon-feature04.svg',
                        ],
                        [
                            'subtitle' => '特徴⑤',
                            'title' => '学習機能',
                            'description' => 'あなたが育てたいように育てていくことであなただけのペットになります。',
                            'icon' => 'lp-icon-feature05.svg',
                        ],
                        [
                            'subtitle' => '特徴⑥',
                            'title' => '見守り機能付き',
                            'description' => '離れて暮らすあなたのご両親がペットと触れ合っている時間や回数がアプリで可視化され、それが見守り機能としてあなたにご両親の安全安心を提供します。 <span>※見守り機能は必要な方にのみ提供いたします</span>',
                            'icon' => 'lp-icon-feature06.svg',
                        ],
                    ];
                    foreach ($features as $feature) {
                    ?>
                        <div class="lp__feature-card">
                            <div class="lp__feature-card__grid">
                                <h3 class="lp__feature-card__subtitle"><?php echo $feature['subtitle']; ?></h3>
                                <h4 class="lp__feature-card__title"><?php echo $feature['title']; ?></h4>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/<?php echo $feature['icon']; ?>" alt="アイコン画像" class="lp__feature-card__icon">
                            </div><!-- /.lp__feature-card__grid -->
                            <p class="lp__feature-card__description"><?php echo $feature['description']; ?></p>
                        </div>
                    <?php
                    }
                    ?>
                </div><!-- /.lp__feature-list -->
            </div><!-- /.lp__container -->

            <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-contents-img04.webp" alt="" class="lp__feature-contents-img04">
        </div><!-- /.lp__feature -->

        <div class="lp__scene">
            <div class="lp__title">
                <div class="lp__scene-icon">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-icon-tap01.svg" alt="アイコン">
                </div><!-- /.lp__scene-icon -->
                <div class="lp__scene-title">
                    <h2 class="lp__concept-title__text">こんなシーンに<br>どうですか？</h2>
                    <p class="lp__concept-title__subtext">situation</p>
                </div><!-- /.lp__concept-title -->
            </div><!-- /.lp__scene -->
            <div class="lp__scene-content">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-contents-img02.webp" alt="" class="lp__scene-img">
            </div><!-- /.lp__scene-content -->
        </div><!-- /.lp__scene -->

        <div class="lp__price">
            <div class="lp__price-img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-contents-img03.webp" alt="価格画像">
            </div><!-- /.lp__price-img -->
            <div class="lp__price-content">
                <div class="lp__container">
                    <div class="lp__price-monitor_price">
                        <div class="lp__price-monitor_price_title">
                            <p>通常プラン</p>
                        </div><!-- /.lp__price-monitor_price_title -->
                        <div class="lp__price-monitor_price_inner">
                            <div class="lp__price-monitor_price_inner_top_group">
                                <p class="lp__price-monitor_price_inner__right-title">初期費用</p>
                                <p class="lp__price-monitor_price_inner__text"><span>¥</span>0</p>
                                <p class="lp__price-monitor_price_inner__plus">+</p><!-- /.lp__price-monitor_price_inner__plus -->
                                <p class="lp__price-monitor_price_inner__left-title">月額費用</p>
                                <p class="lp__price-monitor_price_inner__subtext"><span>¥</span>1,980</p>

                            </div><!-- /.lp__price-monitor_price_inner_top_group -->
                            <div class="lp__price-monitor_price_accordion">
                                <?php
                                $accordionItems = [
                                    [
                                        'title' => 'タブレット端末はどうなりますか？',
                                        'content' => 'レンタル品としてお貸し出しします。解約時は、返却をお願いいたします。返却の際の送料は当社が負担いたします。',
                                    ],
                                    [
                                        'title' => 'Wifiは必要ですか？',
                                        'content' => 'Wifiは必要です。ご自宅のWifiを使用して利用してください。もしない場合は、モバイルWifiルーターのレンタルをおすすめします。',
                                    ],
                                ];
                                foreach ($accordionItems as $index => $item) {
                                    $accordionId = 'accordion-' . $index;
                                ?>
                                    <div class="accordion__item">
                                        <div class="accordion__item__header" onclick="toggleAccordion('<?php echo $accordionId; ?>', this)">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/icon-accordion.svg" alt="アイコン画像" class="accordion__item__icon">
                                            <h4 class="accordion__item__title"><?php echo $item['title']; ?></h4>
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/icon-plus.svg" alt="＋マーク" class="accordion__item__toggle">
                                        </div>
                                        <div id="<?php echo $accordionId; ?>" class="accordion__item__content">
                                            <p><?php echo $item['content']; ?></p>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div><!-- /.lp__price-monitor_price_accordion -->
                            <div class="lp__price-monitor_price_body_info">
                                <div class="lp__price-monitor_price_body_info__title">
                                    <p>パッケージ本体</p>
                                </div>
                                <div class="lp__price-monitor_price_body_info__inner">
                                    <p class="lp__price-monitor_price_body_info__item">
                                        デジタルペット専用端末
                                    </p><!-- /.lp__price-monitor_price_body_info__item -->
                                    <p class="lp__price-monitor_price_body_info__item">
                                        充電ステーション
                                    </p><!-- /.lp__price-monitor_price_body_info__item -->
                                    <p class="lp__price-monitor_price_body_info__item">
                                        取扱説明書
                                    </p><!-- /.lp__price-monitor_price_body_info__item -->
                                    <p class="lp__price-monitor_price_body_info__item">
                                        ACアダプター
                                    </p><!-- /.lp__price-monitor_price_body_info__item -->
                                </div><!-- /.lp__price-monitor_price_body_info__inner -->
                            </div><!-- /.lp__price-monitor_price_body_info -->

                            <div class="lp__price-monitor_price_body_detail">
                                <div class="lp__price-monitor_price_body_detail__title">
                                    <p>商品詳細</p>
                                    <span>デジタルセラピードッグの詳細な特徴や仕様を説明します。</span>
                                </div>
                                <div class="lp__price-monitor_price_body_detail__content">
                                    <?php
                                    $details = [
                                        [
                                            'item' => 'デジタルセラピードッグ専用端末機種',
                                            'text' => 'Lenovo Tab M10 (2rd Gen)',
                                        ],
                                        [
                                            'item' => '充電ステーション',
                                            'text' => '約H350mm x W170mm x D120mm',
                                        ],
                                        [
                                            'item' => 'ディスプレイサイズ',
                                            'text' => '10.1インチ (1920x1200)',
                                        ],
                                        [
                                            'item' => '重量',
                                            'text' => '約460g',
                                        ],
                                        [
                                            'item' => 'OS',
                                            'text' => 'Android 10 ~',
                                        ],
                                        [
                                            'item' => 'CPU',
                                            'text' => 'Qualcomm Snapdragon 662 オクタコア 2.0GHz',
                                        ],
                                        [
                                            'item' => 'RAM',
                                            'text' => '4GB',
                                        ],
                                        [
                                            'item' => 'ROM',
                                            'text' => '64GB',
                                        ],
                                        [
                                            'item' => 'Wi-Fi',
                                            'text' => 'a/b/g/n/ac',
                                        ],
                                    ];

                                    foreach ($details as $detail) {
                                    ?>
                                        <div class="lp__price-monitor_price_body_detail__group">
                                            <p class="lp__price-monitor_price_body_detail__item">
                                                <?php echo $detail['item']; ?>
                                            </p><!-- /.lp__price-monitor_price_body_detail__item -->
                                            <p class="lp__price-monitor_price_body_detail__text">
                                                <?php echo $detail['text']; ?>
                                            </p><!-- /.lp__price-monitor_price_body_detail__item -->
                                        </div><!-- /.lp__price-monitor_price_body_detail__group -->
                                    <?php
                                    }
                                    ?>
                                </div><!-- /.lp__price-monitor_price_body_detail__content -->
                            </div><!-- /.lp__price-monitor_price_body_info -->
                            <div class="lp__price-monitor_price_notes">
                                <p class="lp__price-monitor_price_notes__title">注意事項</p>
                                <p class="lp__price-monitor_price_notes__text">
                                    ・精密機械であるため、直接日光が当たる場所には置かないようにしてください。タブレットが熱くなると故障の原因になります。<br>
                                    ・ベータ版のため、不具合が発生する可能性があります。その際は、運営までご連絡ください。お客様のデータをそのまま保持したまま、新しい端末に交換してお送りいたします。<br>
                                    ・常に最新のアプリのバージョンをご利用ください。（アップデート時には案内を送付いたします。） <br>
                                </p><!-- /.lp__price-monitor_price_notes__text -->
                            </div><!-- /.lp__price-monitor_price_notes -->
                        </div><!-- /.lp__price-monitor_price -->
                    </div><!-- /.lp__container -->
                    <div class="lp__price-monitor_price">
                        <div class="lp__price-monitor_price_title">
                            <p>お客さまのタブレット下取り活用プラン</p>
                        </div><!-- /.lp__price-monitor_price_title -->
                        <div class="lp__price-monitor_price_inner">
                            <div class="lp__price-monitor_price_inner_top_group">
                                <p class="lp__price-monitor_price_inner__right-title">初期費用</p>
                                <p class="lp__price-monitor_price_inner__text"><span>¥</span>0</p>
                                <p class="lp__price-monitor_price_inner__plus">+</p><!-- /.lp__price-monitor_price_inner__plus -->
                                <p class="lp__price-monitor_price_inner__left-title">月額費用</p>
                                <p class="lp__price-monitor_price_inner__subtext"><span>¥</span>980</p>
                            </div><!-- /.lp__price-monitor_price_inner_top_group -->

                            <div class="lp__price-monitor_price_accordion">
                                <?php
                                $accordionItems = [
                                    [
                                        'title' => 'どんなタブレットでも使えますか？',
                                        'content' => '対応OSや性能の条件があります（Android 8.0以上、画面サイズ8インチ以上、Wi-Fi接続可）。郵送前に条件をご確認ください。',
                                    ],
                                    [
                                        'title' => 'タブレットはどうやって送りますか？',
                                        'content' => '弊社から返送用キット（箱・送り状付き）をお送りします。到着から7日以内に端末を梱包してご返送ください。',
                                    ],
                                    [
                                        'title' => '送ったタブレットが使えなかった場合は？',
                                        'content' => '端末返却、端末買取、または月額＋500円で弊社端末に切り替える選択が可能です。',
                                    ],
                                    [
                                        'title' => '連絡方法は？',
                                        'content' => '今後のやり取りはすべてLINE公式アカウントにて行います。',
                                    ],
                                    [
                                        'title' => '複数台送ってもいいですか？',
                                        'content' => '複数台の端末もお送りいただけます。条件を満たす端末は買い取りも可能です。',
                                    ],
                                ];
                                foreach ($accordionItems as $index => $item) {
                                    $accordionId = 'accordion-' . $index;
                                ?>
                                    <div class="accordion__item">
                                        <div class="accordion__item__header" onclick="toggleAccordion('<?php echo $accordionId; ?>', this)">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/icon-accordion.svg" alt="アイコン画像" class="accordion__item__icon">
                                            <h4 class="accordion__item__title"><?php echo $item['title']; ?></h4>
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/icon-plus.svg" alt="＋マーク" class="accordion__item__toggle">
                                        </div>
                                        <div id="<?php echo $accordionId; ?>" class="accordion__item__content">
                                            <p><?php echo $item['content']; ?></p>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div><!-- /.lp__price-monitor_price_accordion -->

                            <div class="lp__price-monitor_price_body_info">
                                <div class="lp__price-monitor_price_body_info__title">
                                    <p>プランに含まれるもの</p>
                                </div>
                                <div class="lp__price-monitor_price_body_info__inner">
                                    <p class="lp__price-monitor_price_body_info__item">充電ステーション</p>
                                    <p class="lp__price-monitor_price_body_info__item">サポート（LINE対応）</p>
                                    <p class="lp__price-monitor_price_body_info__item">返送用キット（初回）</p>
                                    <p class="lp__price-monitor_price_body_info__item">取扱説明書</p>
                                    <p class="lp__price-monitor_price_body_info__item">ACアダプター</p>
                                </div>
                            </div><!-- /.lp__price-monitor_price_body_info -->

                            <div class="lp__price-monitor_price_notes">
                                <p class="lp__price-monitor_price_notes__title">注意事項</p>
                                <p class="lp__price-monitor_price_notes__text">
                                    ・対応端末条件を満たさない場合、利用不可となることがあります。<br>
                                    ・輸送中の破損・紛失については宅配業者の補償を適用し、弊社は責任を負いません。<br>
                                    ・故障時の責任は弊社では負いません。その場合は、お客様のデータをそのまま保持した弊社端末をお送りします。<br>
                                    ・返送期限（7日）を過ぎた場合はキャンセル扱いになる場合があります。<br>
                                    ・端末送付後の利用不可判定時には、返送・買取・月額＋500円切替のいずれかをお選びいただきます。<br>
                                </p>
                            </div><!-- /.lp__price-monitor_price_notes -->
                        </div><!-- /.lp__price-monitor_price_inner -->
                    </div><!-- /.lp__price-monitor_price -->

                </div><!-- /.lp__price-content -->
            </div><!-- /.lp__price -->

            <div class="lp__option">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/dogs04.webp" alt="たっぷのわんちゃん" class="lp__option-img">
                <div class="lp__title">
                    <div class="lp__option-icon">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-icon-tap01.svg" alt="アイコン">
                    </div><!-- /.lp__concept-icon -->
                    <div class="lp__option-title">
                        <h2 class="lp__option-title__text">オプション</h2>
                        <p class="lp__option-title__subtext">option</p>
                    </div><!-- /.lp__concept-title -->
                </div><!-- /.lp__title -->
                <div class="lp__option-content">
                    <img class="lp__option-content-img" src='<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-shape02.svg' alt=''>
                    <div class="lp__option-background">
                        <div class="lp__container">
                            <?php
                            $options = [
                                [
                                    'img' => 'option_img01.webp',
                                    'title' => '設置サポートについて',
                                    'detail' => 'たっぷでは、無料モニターさま限定に、たっぷ機器の設置サポートと使い方レクチャーを対面で行っています。ぜひ、申込時に設置サポートにもお申込みください。'
                                ]
                            ];
                            ?>

                            <div class="lp__option-group">
                                <?php foreach ($options as $option): ?>
                                    <div class="lp__option-card">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/<?php echo $option['img']; ?>" alt="オプション画像">

                                        <p class="lp__option-card__title"><?php echo $option['title']; ?></p>
                                        <div class="lp__option-card_border">

                                        </div><!-- /.lp__option-card_border -->
                                        <p class="lp__option-card__detail"><?php echo $option['detail']; ?></p><!-- /.lp__option-card__detail -->
                                    </div><!-- /.lp__option-card -->
                                <?php endforeach; ?>
                            </div><!-- /.lp__option-group -->
                        </div><!-- /.lp__container -->
                    </div><!-- /.lp__option_background -->
                </div><!-- /.lp__option_content -->
            </div><!-- /.lp__option -->

            <div class="lp__join" id="join">
                <div class="lp__title">
                    <div class="lp__join-icon">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-icon-tap01.svg" alt="アイコン">
                    </div><!-- /.lp__concept-icon -->
                    <div class="lp__join-title">
                        <h2 class="lp__join-title__text">モニターに参加する</h2>
                        <p class="lp__join-title__subtext">join</p>
                    </div><!-- /.lp__concept-title -->
                </div><!-- /.lp__title -->
                <div class="lp__join-content">
                    <div class="lp__container">
                        <div class="lp__join_form">
                            <?php echo apply_shortcodes('[contact-form-7 id="c56e2a6" title="contactform"]'); ?>
                        </div><!-- /.lp__join_form -->
                    </div><!-- /.lp__container -->
                </div><!-- /.lp__join-content -->

            </div><!-- /.lp__join -->

            <img class="lp__join_shape" src='<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-shape01.svg' alt=''>
            <div class="lp__faq">
                <img class="lp__faq-decoration01" src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-decoration01.svg" alt="Decoration 1">
                <img class="lp__faq-decoration02" src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-decoration02.svg" alt="Decoration 2">
                <div class="lp__title">
                    <div class="lp__faq-title">
                        <h2 class="lp__faq-title__text">よくあるご質問</h2>
                        <p class="lp__faq-title__subtext">Q&A</p>
                    </div><!-- /.lp__concept-title -->
                </div><!-- /.lp__title -->
                <div class="lp__faq-content">
                    <div class="lp__container">
                        <div class="lp__faq-accordion">
                            <?php
                            $faqs = [
                                [
                                    'question' => 'モニター参加には費用がかかりますか？',
                                    'answer' => 'いいえ、無料です。モニター期間１カ月経過後、お電話にて継続の有無を確認いたします。',
                                ],
                                [
                                    'question' => 'どのくらいの期間試せますか？',
                                    'answer' => 'モニター期間は1ヶ月です。',
                                ],
                                [
                                    'question' => '返却の際の送料は？',
                                    'answer' => '返送料も当社が負担します。',
                                ],
                                [
                                    'question' => '下取り活用プランでもモニターはできますか？',
                                    'answer' => 'いいえ、下取り活用プランでもモニターに参加できません。',
                                ],
                            ];

                            foreach ($faqs as $index => $faq) {
                                $accordionId = 'faq-' . $index;
                            ?>
                                <div class="accordion__item">
                                    <div class="accordion__item__header" onclick="toggleAccordion('<?php echo $accordionId; ?>', this)">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/icon-faq.svg" alt="FAQアイコン" class="accordion__item__icon">
                                        <h4 class="accordion__item__title"><?php echo $faq['question']; ?></h4>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/icon-plus.svg" alt="＋マーク" class="accordion__item__toggle">
                                    </div>
                                    <div id="<?php echo $accordionId; ?>" class="accordion__item__content">
                                        <p><?php echo $faq['answer']; ?></p>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div><!-- /.lp__faq-accordion -->
                    </div><!-- /.lp__container -->
                </div><!-- /.lp__faq-content -->
            </div><!-- /.lp__faq -->
    </main>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "cards",
            cardsEffect: {
                rotate: true,
                slideShadows: false,
            },
            grabCursor: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: null,
            },
            preloadImages: false,
            lazy: {
                loadPrevNext: true,
            },
            initialSlide: 2,
            loop: true,
        });
        document.addEventListener('DOMContentLoaded', function() {
            var accordions = document.querySelectorAll('.accordion__item__header');

            accordions.forEach(function(header) {
                header.addEventListener('click', function() {
                    var content = this.nextElementSibling;
                    var toggleIcon = this.querySelector('.accordion__item__toggle');
                    var isOpen = content.style.maxHeight;

                    if (isOpen) {
                        // アコーディオンを閉じる
                        content.style.maxHeight = null;
                        content.style.transition = 'max-height 0.3s ease-out';
                        toggleIcon.src = toggleIcon.src.replace('icon-minus.svg', 'icon-plus.svg');
                    } else {
                        // アコーディオンを開く
                        content.style.maxHeight = content.scrollHeight + 'px';
                        content.style.transition = 'max-height 0.3s ease-in';
                        toggleIcon.src = toggleIcon.src.replace('icon-plus.svg', 'icon-minus.svg');
                    }
                });
            });
        });
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Zen+Maru+Gothic:wght@400;500;700;900&display=swap');
    </style>
    <footer class="lp__wrapper">
        <div class="lp__footer">
            <div class="lp__footer-logo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-footer_img01.webp" alt="ロゴ">
                <div class="lp__footer-logo_cv_btn">
                    <a href="#join" class="lp__footer-logo__text">今すぐ無料モニターに応募する
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-icon-arrow01.svg" alt="矢印">
                    </a>
                </div><!-- /.lp__footer-logo_btn -->
            </div><!-- /.lp__footer-logo -->
            <div class="lp__footer-info">
                <p class="lp__footer-info__text">
                    <a href="https://pichipichi.co.jp/">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-icon-external-link.svg" alt="External Link">
                        ぴちぴち株式会社
                    </a>
                </p>
                <p class="lp__footer-info__text">
                    〒669-1133<br>
                    兵庫県西宮市東山台４－４－９
                </p>
                <a href="#" class="lp__footer-info__icon">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/lp-img/lp-icon-instagram.svg" alt="Instagram">
                </a>
                <div class="lp__footer-copyright">
                    <p class="lp__footer-copyright__text">@2025 デジタルセラピードッグ たっぷ All Rights Reserved.</p>
                </div><!-- /.lp__footer-copyright -->
            </div><!-- /.lp__footer-sns -->
        </div><!-- /.lp__footer -->

    </footer>
</div><!-- /.lp_wrapper -->


<?php wp_footer() ?>
</body>

</html>