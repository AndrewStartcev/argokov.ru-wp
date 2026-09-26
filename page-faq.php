<?php
/**
 * FAQ page
 *
 * @package Argokov
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();
?>

<section class="inner-hero surface">

<nav class="breadcrumbs" aria-label="Хлебные крошки">
<a href="/">Главная</a><span>/</span><span>Коротко отвечаем до начала работы</span>
</nav>

<p class="section-eyebrow">
Частые вопросы
</p>

<h1>
Коротко отвечаем <span>до начала работы</span>
</h1>

<p>
Выбери тему или посмотри все вопросы. Если ситуация не подходит под готовый ответ, напиши — разберём отдельно.
</p>

</section>

<section class="faq-page surface" aria-labelledby="faq-page-title">

<header class="development-heading">

<div>

<p class="section-eyebrow">
Вопросы и ответы
</p>

<h2 id="faq-page-title">
О разработке, поддержке и процессе
</h2>

</div>

</header>

<div class="catalog-filter faq-filter" role="group" aria-label="Фильтр вопросов">
<button type="button" class="is-active" aria-pressed="true">Все вопросы<span>10</span></button><button type="button" class="" aria-pressed="false">Начало<span>1</span></button><button type="button" class="" aria-pressed="false">Разработка<span>2</span></button><button type="button" class="" aria-pressed="false">Поддержка<span>3</span></button><button type="button" class="" aria-pressed="false">Процесс<span>2</span></button><button type="button" class="" aria-pressed="false">Стоимость<span>2</span></button>
</div>

<div class="faq-page-list" aria-live="polite">

<details data-category="start">

<summary>
<span>01</span><strong>С чего начать работу?</strong><i aria-hidden="true">+</i>
</summary>

<p>
Пришли ссылку на сайт или кратко опиши идею. Мы уточним цель, изучим исходные данные и предложим следующий шаг.
</p>

</details>

<details data-category="development">

<summary>
<span>02</span><strong>Сколько стоит разработка сайта?</strong><i aria-hidden="true">+</i>
</summary>

<p>
Стоимость зависит от структуры, дизайна, функций, интеграций и готовности материалов. Оценку даём после знакомства с задачей.
</p>

</details>

<details data-category="development">

<summary>
<span>03</span><strong>На какой CMS вы разрабатываете?</strong><i aria-hidden="true">+</i>
</summary>

<p>
Основной стек — WordPress, но выбор технологии зависит от задачи. Работаем также с 1С-Битрикс, PHP-фреймворками и самописными системами.
</p>

</details>

<details data-category="support">

<summary>
<span>04</span><strong>Берёте сайты, которые делали не вы?</strong><i aria-hidden="true">+</i>
</summary>

<p>
Да. Начинаем с диагностики, восстанавливаем техническую картину проекта и предлагаем безопасный порядок работ.
</p>

</details>

<details data-category="support">

<summary>
<span>05</span><strong>Можно обратиться с одной задачей?</strong><i aria-hidden="true">+</i>
</summary>

<p>
Да. Можно начать с ошибки, новой страницы, интеграции или технической проверки без обязательной ежемесячной поддержки.
</p>

</details>

<details data-category="support">

<summary>
<span>06</span><strong>Что входит в техническую поддержку?</strong><i aria-hidden="true">+</i>
</summary>

<p>
Исправления, обновления, резервные копии, безопасность, новые функции, интеграции, скорость и реализация технических SEO-задач.
</p>

</details>

<details data-category="money">

<summary>
<span>07</span><strong>Как формируется стоимость доработок?</strong><i aria-hidden="true">+</i>
</summary>

<p>
Учитываем состояние проекта, сложность кода, объём проверки, срочность и риски. Понятную задачу оцениваем отдельно, сложную сначала диагностируем.
</p>

</details>

<details data-category="money">

<summary>
<span>08</span><strong>Работаете по предоплате?</strong><i aria-hidden="true">+</i>
</summary>

<p>
Условия зависят от масштаба и формата. Для проекта работу делим на этапы, для регулярной поддержки согласуем период и доступный объём.
</p>

</details>

<details data-category="process">

<summary>
<span>09</span><strong>Как защищаете рабочий сайт?</strong><i aria-hidden="true">+</i>
</summary>

<p>
Перед изменениями делаем резервную копию, используем контроль версий и по возможности проверяем работу на тестовой среде.
</p>

</details>

<details data-category="process">

<summary>
<span>10</span><strong>Можно работать по NDA?</strong><i aria-hidden="true">+</i>
</summary>

<p>
Да. Соблюдаем ограничения на публикацию проекта и не раскрываем закрытые данные в кейсах.
</p>

</details>

</div>

</section>

<?php get_footer(); ?>
