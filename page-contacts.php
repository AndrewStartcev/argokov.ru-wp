<?php
/**
 * Contacts page
 *
 * @package Argokov
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();
?>

<section class="inner-hero surface">

<nav class="breadcrumbs" aria-label="Хлебные крошки">
<a href="/">Главная</a><span>/</span><span>Расскажи о задаче удобным способом</span>
</nav>

<p class="section-eyebrow">
Контакты
</p>

<h1>
Расскажи о задаче <span>удобным способом</span>
</h1>

<p>
Работаем из Иркутска с проектами по всей России. Можно прислать ссылку, описание проблемы, макет или готовое техническое задание.
</p>

</section>

<section class="contacts-page surface">

<div class="contacts-page__methods">

<p class="section-eyebrow">
Связаться напрямую
</p>

<h2>
Андрей ответит лично
</h2>

<div>
<a href="tel:+79990000000"><span>Телефон</span><strong>+7 999 000-00-00</strong></a><a href="mailto:mail@argokov.ru"><span>Почта</span><strong>mail@argokov.ru</strong></a><span><small>Город</small><strong>Иркутск · вся Россия</strong></span><span><small>Обращения</small><strong>Принимаем 24/7</strong></span>
</div>

<p>
Номер и реквизиты заменим на реальные перед интеграцией и запуском.
</p>

</div>

<form class="contact__form" aria-label="Форма для обсуждения задачи">

<div class="contact-form__row">
<label class="contact-form__field"><span>Имя</span><input type="text" autoComplete="name" placeholder="Как к вам обращаться" name="name"/></label><label class="contact-form__field"><span>Телефон</span><input type="tel" autoComplete="tel" placeholder="+7 999 000-00-00" required="" name="phone"/></label>
</div>
<label class="contact-form__field"><span>Описание задачи</span><textarea name="task" rows="5" placeholder="Ссылка на сайт, что нужно сделать и какой результат хотите получить" required=""></textarea></label><label class="contact-form__file"><span>Прикрепить файл</span><small>PDF, DOCX, XLSX, JPG, PNG или ZIP · до 10 МБ</small><input type="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png,.zip" name="file"/></label><label class="contact-form__consent"><input type="checkbox" required="" name="consent"/><span>Даю <a href="/consent/">согласие на обработку персональных данных</a> и подтверждаю, что ознакомлен с <a href="/privacy/">политикой обработки персональных данных</a>.</span></label>
<div class="contact-form__submit">
<button class="button" type="button">Отправить задачу <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></button>
<p>
Ответим, уточним детали и предложим следующий шаг.
</p>

</div>

</form>

</section>

<section class="contacts-links surface">

<div>

<p class="section-eyebrow">
Перед обращением
</p>

<h2>
Можно сначала изучить подход
</h2>

</div>

<nav>
<a href="/services/">Услуги <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a><a href="/cases/">Кейсы <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a><a href="/process/">Как работаем <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a><a href="/faq/">Частые вопросы <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
</nav>

</section>

<?php get_footer(); ?>
