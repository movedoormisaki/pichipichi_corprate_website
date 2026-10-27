<?php

/**
 * Template Name: 採用サイト
 * Template Post Type: page
 *
 * Figma: ぴちぴち 採用LP v9｜スマホ（SP: 3:12）モバイル専用
 */

$recruit_dir = get_stylesheet_directory() . '/img/recruit/';
$recruit_uri = get_stylesheet_directory_uri() . '/img/recruit/';

/**
 * img/recruit/ に写真が置かれていればURLを返す。無ければ null（NO IMAGE表示）。
 * 拡張子が違っても（例: bento.png → bento.webp）同名のファイルを探す。
 */
$recruit_photo = function ($file) use ($recruit_dir, $recruit_uri) {
    $name = pathinfo($file, PATHINFO_FILENAME);
    foreach (array_unique([pathinfo($file, PATHINFO_EXTENSION), 'webp', 'jpg', 'jpeg', 'png']) as $ext) {
        if (file_exists($recruit_dir . $name . '.' . $ext)) {
            return $recruit_uri . $name . '.' . $ext;
        }
    }
    return null;
};

$line_url = 'https://lin.ee/UN2CkFl';

/**
 * ヒーローのスライドショー画像: img/recruit/top_slider_img01〜05.(webp|jpg|jpeg|png)
 * 置かれているファイルだけを順番に表示する。
 */
$hero_slides = [];
foreach (range(1, 5) as $n) {
    foreach (['webp', 'jpg', 'jpeg', 'png'] as $ext) {
        $file = sprintf('top_slider_img%02d.%s', $n, $ext);
        if (file_exists($recruit_dir . $file)) {
            $hero_slides[] = $recruit_uri . $file;
            break;
        }
    }
}
$hero_photo = $recruit_photo('sausage-experience.webp') ?: ($hero_slides[0] ?? null);
$delivery_photo = $recruit_photo('meal-delivery.webp');
$section_photo = $recruit_photo('section_image.webp');
$bento_photo = $recruit_photo('bento.png');
$shishimame_photo = $recruit_photo('shishimame.png');
$hashi_photo = $recruit_photo('shishimame_hashi.png');

/**
 * Our purpose のループスライダーに流す「ししまめ」: img/recruit/shishimame/{番号}.webp
 */
$shishimame_variants = array_filter([
    ['001', '三つ豆ししまめ'],
    ['016', '松茸ししまめ'],
    ['049', '秀治ししまめ'],
    ['061', '獅子舞ししまめ'],
    ['127', '武者行列ししまめ'],
    ['149', '黒豆大福ししまめ'],
    ['170', '鮎釣りししまめ'],
    ['178', '観光ガイドししまめ'],
    ['185', '駅長ししまめ'],
    ['192', '丹波竜ししまめ'],
    ['194', '炎ししまめ'],
    ['206', '徳利ししまめ'],
], function ($variant) use ($recruit_dir) {
    return file_exists($recruit_dir . 'shishimame/' . $variant[0] . '.webp');
});
$founder_photo = has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'large') : $recruit_photo('founder.jpg');

$services = [
    [
        'num' => '01 / EXPERIENCE',
        'photo' => $hero_photo,
        'catch' => '篠山でしかできない体験を',
        'name' => '手作り体験処 シシニクとソーセージ',
        'title' => "丹波篠山に、\n新しい観光拠点を。",
        'body' => '体験の接客・予約対応・準備を担当。スタッフと連携し、店舗運営やシフト調整にも関わります。',
        'tags' => ['店舗運営', '体験・接客', 'チームとの連携'],
        'url' => 'https://shishiniku-sausage.com/',
    ],
    [
        'num' => '02 / MEAL DELIVERY',
        'photo' => $delivery_photo,
        'catch' => '地域を、ささえる。',
        'name' => 'ししまめのお届け弁当',
        'title' => "お弁当を届け、\n暮らしに寄り添う。",
        'body' => 'お弁当の準備・配達と、ご利用者様への対応を担当。お届け先の声を、サービス改善に活かします。',
        'tags' => ['準備・配達', 'ご利用者様への対応', 'サービスのご案内'],
        'url' => 'https://shishimame-bento.com/',
    ],
    [
        'num' => '03 / CHARACTER TOURISM',
        'photo' => $recruit_photo('shishimame-projects.webp'),
        'catch' => 'キャラクターで、まちに人を呼ぶ。',
        'name' => 'ししまめプロジェクト・地域企画',
        'title' => "キャラクターを使った、\n観光施策。",
        'body' => 'ゆるキャラ「ししまめ」を活用した観光施策を企画・運営。イベントや地域の事業者との連携を通じて、丹波篠山に人を呼び込みます。',
        'tags' => ['観光施策の企画', 'キャラクター活用', '地域との連携'],
        'url' => 'https://tamba-shishimame.web.app/',
    ],
];

$skills = [
    ['icon' => 'icon-brain.svg', 'title' => 'AIの活用', 'body' => "企画の整理、制作、\n業務の効率化に活かす。"],
    ['icon' => 'icon-code.svg', 'title' => 'プログラミング', 'body' => "仕事の課題を、\n仕組みづくりで解決する。"],
    ['icon' => 'icon-store.svg', 'title' => '店舗運営', 'body' => "接客から改善まで、\n現場を動かす力を磨く。"],
    ['icon' => 'icon-chart.svg', 'title' => '財務・会計', 'body' => "売上や経費を知り、\n数字から事業を考える。"],
    ['icon' => 'icon-users.svg', 'title' => 'マネジメント', 'body' => "スタッフと協力し、\nチームで仕事を進める。"],
    ['icon' => 'icon-megaphone.svg', 'title' => 'SNS・制作・企画', 'body' => "動画・画像の制作から、\n発信やイベントの企画へ。"],
    ['icon' => 'icon-video-edit.svg', 'title' => '動画編集', 'body' => "撮影した素材を編集し、\n伝わる動画に仕上げる。"],
    ['icon' => 'icon-camera.svg', 'title' => '写真撮影', 'body' => "商品や体験、人の魅力を\n写真で切り取る。"],
];

$conditions = [
    ['雇用形態', ['正社員'], []],
    ['給与', ['基本給18万円〜／月'], ['※ 固定残業代なし。時間外勤務の賃金は別途支給し、法定の割増率を適用します。']],
    ['勤務時間', ['9:00〜18:00（実働8時間・休憩1時間）', '週4日・週32時間'], ['※ 原則定時退勤。イベント等の際は時間外勤務があります。']],
    ['勤務日・休日', ['週4日勤務（土日＋平日2日）', '完全週休3日制（平日3日休み）'], ['※ 土日は体験運営、平日は配食と店舗運営を担当。有給休暇の取得は事前に相談できます。', '勤務曜日・祝日・年末年始・年間休日は年間カレンダーで確認。年次有給休暇あり。']],
    ['勤務地', ['兵庫県丹波篠山市魚屋町14'], ['※ 転勤なし。']],
    ['応募資格', ['普通自動車運転免許（AT限定可）', '基本的なPC操作ができる方'], ['※ 学歴・経験不問。業務で自動車を運転します。']],
    ['試用期間', ['1か月（条件変更なし）'], []],
    ['保険・待遇', ['副業・個人事業との両立可', '通勤費は会社負担・業務用車両あり'], ['※ 保険の適用は勤務条件に基づき確認し、労働条件通知書で明示します。']],
    ['昇給・賞与', ['昇給・賞与あり'], ['※ 頑張りや成果に応じたインセンティブの付与を考えています。']],
    ['受動喫煙対策', ['屋内禁煙（屋外での喫煙可）。'], []],
];

$faqs = [
    ['営業や企画が未経験でも応募できますか？', 'はい。営業・企画の経験は必須ではありません。相手の話を丁寧に聞き、周囲と協力して提案・実行できる方を歓迎します。普通自動車運転免許と、基本的なPC操作は必要です。'],
    ['企画やSNS発信を中心に担当する仕事ですか？', '店舗運営を軸に、営業・地域企画・SNS発信も担当します。体験の接客や準備、お弁当の配達、スタッフとの調整など、現場の仕事も大切な役割です。現場を知ったうえで、裁量と責任を持って改善や企画に取り組んでいただきます。具体的な担当範囲は面接で相互に確認します。'],
    ['土日は毎週勤務になりますか？', '基本的には毎週土日が勤務日です。ただし、有給休暇などを利用して休みを取得することも可能です。取得日程は事前に相談し、業務やシフトを調整します。通常の勤務は土日＋平日2日の週4日で、休日は平日3日です。'],
    ['副業や個人事業を続けられますか？', '副業・個人事業との両立は可能です。平日3日の休日を自分の活動に使う働き方を想定しています。希望する活動や働き方について、面接でお聞かせください。起業や休日の活動を求める募集ではありません。'],
    ['AIやプログラミング、制作の経験は必要ですか？', 'プログラミング・動画編集・写真撮影の経験は問いません。現場の仕事を担いながら、勤務時間内で実践します。'],
    ['面接は何回ありますか？', '面接は2回です。最初は気軽なオンライン面接で、仕事や希望する働き方についてお話しします。その後、対面面接を行い、採用の可否を決定します。'],
    ['入社時期は相談できますか？', '11月の入社を希望していますが、ご相談いただけます。'],
];

$steps = [
    ['01', 'icon-video.svg', 'オンライン面接', '一次面接はオンラインで、仕事のことや希望する働き方についてお話しします。'],
    ['02', 'icon-users.svg', '対面面接', '二次面接は対面で、具体的な仕事内容や役割について、お互いに確認します。'],
    ['03', 'icon-clipboard.svg', '採否決定', '面接を踏まえて採用の可否を決定します。採用の場合は条件を確認し、入社時期を相談します。'],
];

get_header();
?>
<div class="recruit-page">
<div class="bg">
<main class="recruit" id="top">

    <!-- ブランド -->
    <a class="recruit__brand" href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/logomark.svg" alt="ぴちぴち株式会社 ホーム" width="84" height="72">
        <span>採用サイト</span>
    </a>

    <!-- Hero -->
    <section class="recruit__hero" aria-label="丹波篠山と共に、地域の未来をつくる。">
        <div class="recruit__hero-photo<?php echo $hero_slides ? '' : ' is-empty'; ?>" data-slider>
            <?php foreach ($hero_slides as $i => $slide) : ?>
                <img class="recruit__hero-slide<?php echo $i === 0 ? ' is-active' : ''; ?>" src="<?php echo esc_url($slide); ?>" alt="" width="1440" height="620" <?php echo $i === 0 ? 'fetchpriority="high"' : 'loading="lazy"'; ?>>
            <?php endforeach; ?>
        </div>
        <div class="recruit__hero-copy">
            <h1>丹波篠山と共に、<br>地域の未来をつくる。</h1>
            <p>食と観光の現場から、<br>地域を育てる仕事。</p>
        </div>
        <div class="recruit__hero-cta">
            <a class="recruit__btn recruit__btn--outline" href="#services">仕事を知る<img src="<?php echo esc_url($recruit_uri); ?>icon-arrow-down-circle.svg" alt="" width="28" height="28"></a>
            <a class="recruit__btn recruit__btn--line" href="<?php echo esc_url($line_url); ?>" target="_blank" rel="noopener"><img src="<?php echo esc_url($recruit_uri); ?>icon-line.png" alt="" width="28" height="28">LINEで相談</a>
        </div>
    </section>

    <!-- Our purpose -->
    <section class="recruit__purpose" aria-labelledby="purpose-title">
        <div class="recruit__inner">
            <div class="recruit__purpose-grid">
                <div>
                    <p class="recruit__eyebrow">Our purpose</p>
                    <h2 id="purpose-title" class="recruit__h2 recruit__h2--sm">食と観光で、<br>丹波篠山の未来をつくる。</h2>
                    <ul class="recruit__pillars" aria-label="食 × 観光 × 地域貢献">
                        <li class="recruit__pillar recruit__pillar--lg">食</li>
                        <li class="recruit__pillar-x" aria-hidden="true">×</li>
                        <li class="recruit__pillar">観光</li>
                        <li class="recruit__pillar-x" aria-hidden="true">×</li>
                        <li class="recruit__pillar">地域貢献</li>
                    </ul>
                </div>
                <div class="recruit__purpose-body">
                    <p class="recruit__lead">地域の声を、事業に。</p>
                    <p class="recruit__purpose-text">ぴちぴち株式会社では、丹波篠山を拠点に、食・観光・地域の事業を育てています。まだ創業まもないベンチャーだからできることを、気づきを新しい価値につなげます。</p>
                </div>
            </div>
            <?php if ($shishimame_variants) : ?>
                <div class="recruit__marquee" aria-label="ご当地ししまめたち">
                    <div class="recruit__marquee-track">
                        <?php foreach ([false, true] as $is_clone) : ?>
                            <ul class="recruit__marquee-list"<?php echo $is_clone ? ' aria-hidden="true"' : ''; ?>>
                                <?php foreach ($shishimame_variants as [$num, $label]) : ?>
                                    <li><img src="<?php echo esc_url($recruit_uri . 'shishimame/' . $num . '.webp'); ?>" alt="<?php echo $is_clone ? '' : esc_attr($label); ?>" width="80" height="80" loading="lazy"></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            <hr class="recruit__rule">
            <div class="recruit__role">
                <p class="recruit__eyebrow">Your role</p>
                <h3>自分で考え、決めて、動かす。<br>事業を育てる責任者へ。</h3>
                <p>店舗運営を軸に、企画や発信にも挑戦。チームや地域の方と、仕事を育てていきます。</p>
            </div>
        </div>
    </section>

    <!-- Our services -->
    <section class="recruit__services" id="services" aria-labelledby="services-title">
        <div class="recruit__inner recruit__inner--wide">
            <div class="recruit__services-head">
                <div>
                    <p class="recruit__eyebrow">Our services</p>
                    <h2 id="services-title" class="recruit__h2">仕事を知る</h2>
                </div>
                <p class="recruit__services-note">体験、暮らし、地域のつながり。<br>現場の出会いを、次のアイデアに。</p>
            </div>
            <ul class="recruit__cards">
                <?php foreach ($services as $i => $service) : ?>
                    <li class="recruit__card<?php echo $service['photo'] ? '' : ' recruit__card--noimage'; ?>">
                        <div class="recruit__card-visual">
                            <?php if ($service['photo']) : ?>
                                <img src="<?php echo esc_url($service['photo']); ?>" alt="" width="430" height="300" loading="lazy">
                                <p class="recruit__card-num"><?php echo esc_html($service['num']); ?></p>
                            <?php else : ?>
                                <p class="recruit__card-num">NO IMAGE</p>
                            <?php endif; ?>
                        </div>
                        <div class="recruit__card-body">
                            <p class="recruit__card-catch"><?php echo esc_html($service['catch']); ?></p>
                            <p class="recruit__card-name"><?php echo esc_html($service['name']); ?></p>
                            <h3 class="recruit__card-title"><?php echo nl2br(esc_html($service['title'])); ?></h3>
                            <p class="recruit__card-text"><?php echo esc_html($service['body']); ?></p>
                            <ul class="recruit__tags">
                                <?php foreach ($service['tags'] as $tag) : ?>
                                    <li><?php echo esc_html($tag); ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <a class="recruit__card-link" href="<?php echo esc_url($service['url']); ?>" target="_blank" rel="noopener">公式サイトを見る<img src="<?php echo esc_url($recruit_uri); ?>icon-external.svg" alt="（外部サイト）" width="17" height="17"></a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <!-- Work & life -->
    <section class="recruit__work" id="work" aria-labelledby="work-title">
        <div class="recruit__inner">
            <div class="recruit__work-intro">
                <div class="recruit__work-copy">
                    <p class="recruit__eyebrow">Work &amp; life</p>
                    <h2 id="work-title" class="recruit__h2 recruit__h2--sm">仕事は、週4日のみ。<br>自分のための3日間も。</h2>
                    <p class="recruit__work-text">正社員としての仕事を持ちながら、<br>自分の活動や挑戦にも時間を使ってほしいから。</p>
                </div>
                <div class="recruit__photo-break">
                    <div class="recruit__photo-break-img<?php echo $section_photo ? '' : ' is-empty'; ?>">
                        <?php if ($section_photo) : ?>
                            <img src="<?php echo esc_url($section_photo); ?>" alt="ソーセージづくり体験を楽しむ子どもたち" width="1560" height="1040" loading="lazy">
                        <?php endif; ?>
                    </div>
                    <p class="recruit__photo-break-caption">仕事も、<br>自分のやりたいことも。</p>
                </div>
            </div>
            <ul class="recruit__stats">
                <li>
                    <p class="recruit__stat-label">勤務日</p>
                    <p class="recruit__stat-num"><strong>4</strong><span>日 / 週</span></p>
                    <p class="recruit__stat-title">土日＋平日2日</p>
                    <p class="recruit__stat-text">9時〜18時、休憩1時間・実働8時間。<br>週の所定労働時間は32時間です。</p>
                </li>
                <li>
                    <p class="recruit__stat-label">休日</p>
                    <p class="recruit__stat-num"><strong>3</strong><span>日 / 週</span></p>
                    <p class="recruit__stat-title">完全週休3日制</p>
                    <p class="recruit__stat-text">休日は平日3日。副業や個人事業、<br>自分の活動に時間を使えます。</p>
                </li>
                <li>
                    <p class="recruit__stat-label">基本給</p>
                    <p class="recruit__stat-num"><strong>18〜</strong><span>万円 / 月</span></p>
                    <p class="recruit__stat-title">正社員・月給制</p>
                    <p class="recruit__stat-text">基本給18万円〜 / 月。固定残業代なし。<br>時間外勤務の賃金は別途支給します。</p>
                </li>
            </ul>
            <div class="recruit__week">
                <h3>1週間の働き方</h3>
                <p class="recruit__week-legend">■ 勤務：4日　　□ 休日：3日</p>
                <div class="recruit__week-chart">
                    <div class="recruit__week-group recruit__week-group--weekday">
                        <p class="recruit__week-head">平日</p>
                        <ul>
                            <li class="is-on">勤務</li>
                            <li class="is-on">勤務</li>
                            <li>休日</li>
                            <li>休日</li>
                            <li>休日</li>
                        </ul>
                        <p class="recruit__week-note">勤務する2日の曜日は調整します</p>
                    </div>
                    <div class="recruit__week-group recruit__week-group--weekend">
                        <p class="recruit__week-head">土日</p>
                        <ul>
                            <li class="is-on">土</li>
                            <li class="is-on">日</li>
                        </ul>
                        <p class="recruit__week-note">基本勤務</p>
                    </div>
                </div>
                <dl class="recruit__week-list">
                    <div>
                        <dt>土曜・日曜</dt>
                        <dd>9:00〜18:00｜ソーセージづくり体験の運営<br>勤務時間には、体験の準備・片付け等も含まれます。</dd>
                    </div>
                    <div>
                        <dt>平日のうち2日</dt>
                        <dd>9:00〜18:00｜午前は配食事業、午後はソーセージ店舗の運営</dd>
                    </div>
                    <div>
                        <dt>平日のうち3日</dt>
                        <dd>休日｜自分の活動や挑戦の時間に</dd>
                    </div>
                </dl>
                <p class="recruit__week-footnote">各勤務日は休憩1時間・実働8時間。原則18時退勤ですが、イベント等では時間外勤務があります。年間休日数は年間カレンダーの確定後に整理します。休日の活動は任意です。</p>
            </div>
        </div>
    </section>

    <!-- Message from the founder -->
    <section class="recruit__founder" aria-labelledby="founder-title">
        <div class="recruit__inner recruit__inner--narrow">
            <p class="recruit__eyebrow recruit__eyebrow--center">Message from the founder</p>
            <h2 id="founder-title" class="recruit__lead recruit__lead--center">あなたの「やってみたい」を、<br>精一杯応援したい。</h2>
            <div class="recruit__founder-body">
                <div class="recruit__founder-photo<?php echo $founder_photo ? '' : ' is-empty'; ?>">
                    <?php if ($founder_photo) : ?>
                        <img src="<?php echo esc_url($founder_photo); ?>" alt="ぴちぴち株式会社 代表取締役 三崎龍人" width="280" height="300" loading="lazy">
                    <?php else : ?>
                        <p>NO IMAGE<br>代表写真（差し替え）</p>
                    <?php endif; ?>
                </div>
                <div class="recruit__founder-text">
                    <p>私たちは、仕事と同じくらい、一人ひとりの「やってみたい」を大切にしています。趣味や地域での活動、いつか挑戦したいこと。仕事以外の時間も、自分らしく楽しんでほしい。</p>
                    <p>代表自身も独立に挑戦してきたからこそ、自分の意志で一歩を踏み出す人を、精一杯応援したいと考えています。</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills through work -->
    <section class="recruit__skills" id="skills" aria-labelledby="skills-title">
        <div class="recruit__inner">
            <div class="recruit__skills-head">
                <p class="recruit__eyebrow">Skills through work</p>
                <h2 id="skills-title" class="recruit__h2">現場で学び、<br>仕事の幅を広げる。</h2>
                <p class="recruit__skills-sub">実践で身につく8つの力</p>
                <p class="recruit__skills-text">店舗・配食・地域企画の実践を通して、学びを仕事に活かします。</p>
            </div>
            <ul class="recruit__skill-list">
                <?php foreach ($skills as $skill) : ?>
                    <li class="recruit__skill">
                        <img src="<?php echo esc_url($recruit_uri . $skill['icon']); ?>" alt="" width="24" height="24" loading="lazy">
                        <h3><?php echo esc_html($skill['title']); ?></h3>
                        <p><?php echo nl2br(esc_html($skill['body'])); ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
            <p class="recruit__footnote">プログラミング・動画編集・写真撮影の経験は問いません。現場の仕事を担いながら、勤務時間内で実践します。</p>
        </div>
    </section>

    <!-- Recruitment details -->
    <section class="recruit__details" id="details" aria-labelledby="details-title">
        <div class="recruit__inner recruit__inner--narrow">
            <div class="recruit__details-intro">
                <div class="recruit__details-copy">
                    <p class="recruit__eyebrow">Recruitment details</p>
                    <h2 id="details-title" class="recruit__h2">募集条件</h2>
                    <p class="recruit__details-text">店舗運営を軸に、裁量と責任を持って事業を育てる仕事。</p>
                </div>
                <div class="recruit__details-visual">
                    <div class="recruit__details-photo<?php echo $bento_photo ? '' : ' is-empty'; ?>">
                        <?php if ($bento_photo) : ?>
                            <img src="<?php echo esc_url($bento_photo); ?>" alt="ししまめのお届け弁当を盛り付ける様子" width="2514" height="1696" loading="lazy">
                        <?php endif; ?>
                    </div>
                    <?php if ($hashi_photo) : ?>
                        <img class="recruit__details-hashi" src="<?php echo esc_url($hashi_photo); ?>" alt="" width="320" height="473" loading="lazy">
                    <?php endif; ?>
                </div>
            </div>
            <dl class="recruit__conditions">
                <?php foreach ($conditions as $condition) : ?>
                    <div class="recruit__condition">
                        <dt><?php echo esc_html($condition[0]); ?></dt>
                        <dd>
                            <?php foreach ($condition[1] as $line) : ?>
                                <p><?php echo esc_html($line); ?></p>
                            <?php endforeach; ?>
                            <?php foreach ($condition[2] as $note) : ?>
                                <p class="recruit__condition-note"><?php echo esc_html($note); ?></p>
                            <?php endforeach; ?>
                        </dd>
                    </div>
                <?php endforeach; ?>
            </dl>
        </div>
    </section>

    <!-- Q & A -->
    <section class="recruit__faq" aria-labelledby="faq-title">
        <div class="recruit__inner recruit__inner--narrow">
            <?php if ($shishimame_photo) : ?>
                <img class="recruit__faq-character" src="<?php echo esc_url($shishimame_photo); ?>" alt="" width="180" height="180" loading="lazy">
            <?php endif; ?>
            <p class="recruit__eyebrow">Q &amp; A</p>
            <h2 id="faq-title" class="recruit__h2">よくある質問</h2>
            <div class="recruit__faq-list">
                <?php foreach ($faqs as $faq) : ?>
                    <details class="recruit__faq-item">
                        <summary>
                            <span class="recruit__faq-q" aria-hidden="true">Q.</span>
                            <span class="recruit__faq-question"><?php echo esc_html($faq[0]); ?></span>
                            <span class="recruit__faq-toggle" aria-hidden="true"></span>
                        </summary>
                        <p class="recruit__faq-answer"><?php echo esc_html($faq[1]); ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Selection process -->
    <section class="recruit__process" aria-labelledby="process-title">
        <div class="recruit__inner recruit__inner--narrow">
            <p class="recruit__eyebrow">Selection process</p>
            <h2 id="process-title" class="recruit__h2">まずは、オンラインで<br>お話ししましょう。</h2>
            <ol class="recruit__steps">
                <?php foreach ($steps as $step) : ?>
                    <li class="recruit__step">
                        <div class="recruit__step-head">
                            <span class="recruit__step-num"><?php echo esc_html($step[0]); ?></span>
                            <img src="<?php echo esc_url($recruit_uri . $step[1]); ?>" alt="" width="24" height="24" loading="lazy">
                        </div>
                        <h3><?php echo esc_html($step[2]); ?></h3>
                        <p><?php echo esc_html($step[3]); ?></p>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </section>

    <!-- CTA -->
    <section class="recruit__cta" aria-labelledby="cta-title">
        <div class="recruit__inner recruit__inner--narrow">
            <?php if ($shishimame_photo) : ?>
                <img class="recruit__cta-character" src="<?php echo esc_url($shishimame_photo); ?>" alt="" width="160" height="160" loading="lazy">
            <?php endif; ?>
            <p class="recruit__eyebrow recruit__eyebrow--center">Create value in Tamba Sasayama.</p>
            <h2 id="cta-title" class="recruit__h2 recruit__h2--center recruit__h2--sm">わくわくする気持ちを、<br>地域の未来につなげよう。</h2>
            <p class="recruit__cta-text">あなたの考えを聞かせてください。<br>一緒に、ここから始まる仕事を育てていきましょう。</p>
            <a class="recruit__line-btn" href="<?php echo esc_url($line_url); ?>" target="_blank" rel="noopener">
                <img src="<?php echo esc_url($recruit_uri); ?>icon-line.png" alt="" width="32" height="32">
                <span>LINEで応募・相談</span>
                <span class="recruit__line-btn-arrow"><img src="<?php echo esc_url($recruit_uri); ?>icon-arrow-right.svg" alt="" width="18" height="18"></span>
            </a>
            <a class="recruit__cta-note" href="<?php echo esc_url($line_url); ?>" target="_blank" rel="noopener">友だち追加後、「採用について」と送信。</a>
        </div>
    </section>

    <footer class="recruit__footer">
        <div>
            <p class="recruit__footer-company">ぴちぴち株式会社</p>
            <p class="recruit__footer-sub">採用サイト</p>
        </div>
        <p class="recruit__footer-sub">ご応募・お問い合わせは公式LINEへ。</p>
        <a class="recruit__footer-top" href="#top">⌂ ページの先頭へ</a>
    </footer>
</main>
</div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ヒーローのスライドショー（5秒ごとにフェード切り替え）
        var slides = document.querySelectorAll('.recruit__hero-slide');
        if (slides.length > 1) {
            var current = 0;
            setInterval(function() {
                slides[current].classList.remove('is-active');
                current = (current + 1) % slides.length;
                slides[current].classList.add('is-active');
            }, 5000);
        }

        // ページ内リンクをスムーズスクロール
        document.querySelectorAll('.recruit a[href^="#"]').forEach(function(link) {
            link.addEventListener('click', function(event) {
                var target = document.querySelector(link.getAttribute('href'));
                if (!target) return;
                event.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            });
        });
    });
</script>
<?php wp_footer(); ?>
</body>

</html>
