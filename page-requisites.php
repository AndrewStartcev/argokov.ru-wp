<?php
/**
 * Requisites page
 *
 * @package Argokov
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();
?>

<section class="requisites-hero surface">

<div class="requisites-hero__content">

<nav class="breadcrumbs" aria-label="Хлебные крошки">
<a href="/">Главная</a><span>/</span><span>Реквизиты</span>
</nav>

<p class="section-eyebrow">
Документы и оплата
</p>

<h1>
Реквизиты <span>студии «Аргоков»</span>
</h1>

<p>
Данные для заключения договора, выставления счёта и проведения оплаты. Актуальную карточку предприятия можно скачать в удобном формате.
</p>

</div>

<div class="requisites-hero__identity" aria-label="Краткие данные компании">
<span class="requisites-hero__mark" aria-hidden="true">А</span>
<div>
<small>Юридическое лицо</small><strong>ИП Андрей Старцев</strong>
<p>
Студия разработки и поддержки сайтов
</p>

</div>
<span class="requisites-hero__verified"><i aria-hidden="true"></i> Работаем официально</span>
</div>

</section>

<section class="company-details surface" aria-label="Реквизиты компании">

<div class="company-details__main">

<section class="company-details__group" aria-labelledby="details-01">

<header>
<span>01</span>
<h2 id="details-01">
Регистрационные данные
</h2>

</header>

<dl>

<div>

<dt>
Полное наименование
</dt>

<dd>
Индивидуальный предприниматель Андрей Старцев
</dd>

</div>

<div>

<dt>
Сокращённое наименование
</dt>

<dd>
ИП Андрей Старцев
</dd>

</div>

<div>

<dt>
ИНН
</dt>

<dd>
Добавим перед запуском
</dd>

</div>

<div>

<dt>
ОГРНИП
</dt>

<dd>
Добавим перед запуском
</dd>

</div>

<div>

<dt>
Дата регистрации
</dt>

<dd>
Добавим перед запуском
</dd>

</div>

<div>

<dt>
Регион регистрации
</dt>

<dd>
Иркутская область
</dd>

</div>

</dl>

</section>

<section class="company-details__group" aria-labelledby="details-02">

<header>
<span>02</span>
<h2 id="details-02">
Банковские реквизиты
</h2>

</header>

<dl>

<div>

<dt>
Расчётный счёт
</dt>

<dd>
Добавим перед запуском
</dd>

</div>

<div>

<dt>
Наименование банка
</dt>

<dd>
Добавим перед запуском
</dd>

</div>

<div>

<dt>
БИК
</dt>

<dd>
Добавим перед запуском
</dd>

</div>

<div>

<dt>
Корреспондентский счёт
</dt>

<dd>
Добавим перед запуском
</dd>

</div>

</dl>

</section>

<section class="company-details__group" aria-labelledby="details-03">

<header>
<span>03</span>
<h2 id="details-03">
Контактные данные
</h2>

</header>

<dl>

<div>

<dt>
Электронная почта
</dt>

<dd>
<a href="mailto:mail@argokov.ru">mail@argokov.ru</a>
</dd>

</div>

<div>

<dt>
Телефон
</dt>

<dd>
<a href="tel:+79990000000">+7 999 000-00-00</a>
</dd>

</div>

<div>

<dt>
География работы
</dt>

<dd>
Иркутск · вся Россия
</dd>

</div>

</dl>

</section>

</div>

<aside class="company-documents">

<div class="company-documents__sheet" aria-hidden="true">
<span>АРГОКОВ</span><strong>Карточка<br/>предприятия</strong><small>PDF · DOCX</small>
</div>

<p class="section-eyebrow">
Файлы для бухгалтерии
</p>

<h2>
Скачать карточку предприятия
</h2>

<p>
Все реквизиты в одном документе — для договора, счёта или добавления контрагента.
</p>

<div class="company-documents__links">
<a class="button" href="/documents/argokov-requisites.pdf" download=""><span><strong>Скачать PDF</strong><small>для просмотра и печати</small></span><svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a><a href="/documents/argokov-requisites.docx" download=""><span><strong>Скачать DOCX</strong><small>редактируемый документ</small></span><svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
</div>

<div class="company-documents__note">
<span>Актуальность данных</span>
<p>
Перед оплатой рекомендуем сверять реквизиты со счётом или договором.
</p>

</div>

</aside>

</section>

<section class="requisites-help surface">

<div>

<p class="section-eyebrow">
Нужен документ
</p>

<h2>
Не нашли нужные данные?
</h2>

<p>
Напиши нам — отправим карточку предприятия или подготовим документы для бухгалтерии.
</p>

</div>
<a class="button" href="#contact" data-contact-modal="true">Написать нам <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
</section>

<?php get_footer(); ?>
