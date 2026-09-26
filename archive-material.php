<?php
/**
 * Materials archive
 *
 * @package Argokov
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();
?>

<section class="materials-hero surface" aria-labelledby="materials-page-title">

<nav class="breadcrumbs" aria-label="Хлебные крошки">
<a href="/">Главная</a><span>/</span><span>Статьи</span>
</nav>

<p class="section-eyebrow">
Практика веб-разработки
</p>

<h1 id="materials-page-title">
Статьи о разработке, <span>поддержке и развитии сайтов</span>
</h1>

<p>
Разбираем реальные технические ситуации: как принять чужой проект, не потерять данные, оценить доработки и подготовить сайт к продвижению.
</p>

<div class="materials-categories" aria-label="Темы материалов">
<span>Все материалы</span><span>Поддержка</span><span>Разработка</span><span>SEO</span><span>Безопасность</span>
</div>

</section>

<section class="materials-catalog surface" aria-labelledby="latest-title">

<header class="development-heading">

<div>

<p class="section-eyebrow">
Новые материалы
</p>

<h2 id="latest-title">
Полезно владельцу сайта и команде
</h2>

</div>

<p>
Пишем о том, с чем сталкиваемся в проектах: конкретно, честно и с понятным следующим действием.
</p>

</header>

<div class="materials-grid">

<article class="material-card">
<a href="/materials/razrabotchik-perestal-otvechat/" class="material-card__cover" aria-label="Читать: Что делать, если прежний разработчик перестал отвечать"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/material-developer-silent-cover.png" alt="Рабочее место разработчика и открытый проект сайта" loading="lazy" decoding="async" sizes="(max-width: 720px) 100vw, 33vw" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover"/></a>
<div class="material-card__body">

<div class="material-card__top">
<span>Сложные проекты</span><time dateTime="2026-08-23">23 августа 2026</time>
</div>

<h2>
<a href="/materials/razrabotchik-perestal-otvechat/">Что делать, если прежний разработчик перестал отвечать</a>
</h2>

<p>
Пошаговый план: как сохранить сайт, вернуть доступы, найти нового специалиста и безопасно продолжить работу без документации.
</p>

<footer class="material-card__footer">

<div class="material-card__metrics">
<span>11 минут</span>
</div>
<a href="/materials/razrabotchik-perestal-otvechat/" class="material-card__link">Читать статью <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
</footer>

</div>

</article>

<article class="material-card material-card--planned">

<div class="material-card__cover">
<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/material-support-cover.webp" alt="Рабочее место специалиста по технической поддержке сайтов" loading="lazy" decoding="async" sizes="(max-width: 720px) 100vw, 33vw" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover"/><span class="material-card__status">Готовим материал</span>
</div>

<div class="material-card__body">

<div class="material-card__top">
<span>Поддержка сайтов</span>
</div>

<h2>
Техническая поддержка сайта: что входит и когда она нужна
</h2>

<p>
Чем разовая доработка отличается от сопровождения и когда бизнесу нужен постоянный разработчик.
</p>

<footer class="material-card__footer">

<div class="material-card__metrics">
<span>8 минут</span>
</div>
<span class="material-card__planned-label">Скоро</span>
</footer>

</div>

</article>

<article class="material-card material-card--planned">

<div class="material-card__cover">
<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/material-rebuild-cover.webp" alt="Сравнение доработки сайта и новой разработки" loading="lazy" decoding="async" sizes="(max-width: 720px) 100vw, 33vw" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover"/><span class="material-card__status">Готовим материал</span>
</div>

<div class="material-card__body">

<div class="material-card__top">
<span>Разработка сайтов</span>
</div>

<h2>
Доработка существующего сайта или разработка нового: что выбрать
</h2>

<p>
Как сравнить риски, стоимость и сроки двух подходов на основе состояния проекта, а не эмоций.
</p>

<footer class="material-card__footer">

<div class="material-card__metrics">
<span>9 минут</span>
</div>
<span class="material-card__planned-label">Скоро</span>
</footer>

</div>

</article>

</div>

</section>

<?php get_footer(); ?>
