<?php
/**
 * Single material
 *
 * @package Argokov
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();
?>

<article itemscope="" itemtype="https://schema.org/BlogPosting">

<header class="article-hero surface">

<nav class="breadcrumbs" aria-label="Хлебные крошки">
<a href="/">Главная</a><span>/</span><a href="/materials/">Статьи</a><span>/</span><span>Прежний разработчик не отвечает</span>
</nav>

<div class="article-hero__layout">

<div class="article-hero__content">

<p class="section-eyebrow">
Поддержка сайтов · сложные проекты
</p>

<h1 itemprop="headline">
Что делать, если прежний разработчик перестал отвечать
</h1>

<p class="article-hero__lead" itemprop="description">
Спокойный план действий для владельца сайта: как сохранить данные, вернуть контроль над доступами и передать проект новому специалисту без лишнего риска.
</p>

<div class="article-meta">

<div class="article-author">
<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/andrey-startsev.png" alt="Андрей Старцев" width="48" height="48" loading="lazy" decoding="async" srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/andrey-startsev.png 48w"/>
<div>
<strong itemprop="author">Андрей Старцев</strong><span>Веб-разработчик · 10 лет опыта</span>
</div>

</div>

<div>
<span>Опубликовано <time itemprop="datePublished" dateTime="2026-08-23">23 августа 2026</time></span><span>Обновлено <time itemprop="dateModified" dateTime="2026-08-23">23 августа 2026</time></span><span>11 минут чтения</span>
</div>

</div>

</div>

<figure class="article-hero__cover">
<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/material-developer-silent-cover.png" alt="Рабочее место разработчика и открытый проект сайта" loading="eager" fetchpriority="high" decoding="async" sizes="(max-width: 960px) 100vw, 44vw" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover"/>
</figure>

</div>

</header>

<div class="article-layout">

<aside class="article-toc surface" aria-label="Содержание статьи">
<strong>Содержание</strong>
<nav>
<a href="#first-hours"><span>01</span>Что сделать в первые часы</a><a href="#access"><span>02</span>Какие доступы собрать</a><a href="#ownership"><span>03</span>Как вернуть контроль</a><a href="#new-developer"><span>04</span>Что передать новому разработчику</a><a href="#audit"><span>05</span>Зачем нужна диагностика</a><a href="#avoid"><span>06</span>Чего точно не делать</a><a href="#prevention"><span>07</span>Как защититься на будущее</a>
</nav>
<a href="/support/">Передать сайт на поддержку <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
</aside>

<div class="article-content surface" itemprop="articleBody">

<p class="article-intro">
Если разработчик пропал, это неприятно, но почти никогда не означает, что сайт потерян. В большинстве случаев проект можно принять и продолжить. Главная задача сейчас — не искать виноватого, а сохранить работающую систему и восстановить контроль над её ключевыми частями.
</p>

<div class="article-callout article-callout--important">
<strong>Сначала зафиксируй текущее состояние</strong>
<p>
Не обновляй CMS и плагины, не меняй сервер и не выдавай незнакомому специалисту все доступы сразу. Любое резкое действие усложняет диагностику и может окончательно сломать то, что пока работает.
</p>

</div>

<section id="first-hours">

<h2>
Что сделать в первые часы
</h2>

<p>
Сначала убедись, что сайт действительно доступен посетителям. Открой основные страницы, отправь тестовую заявку, проверь корзину или запись, если они есть. Зафиксируй найденные ошибки скриншотами и коротким описанием: где произошло, какое действие выполнялось и что появилось на экране.
</p>

<ol>

<li>
<strong>Не отключай сайт без причины.</strong> Если проблема не связана с утечкой данных или вредоносным кодом, работающий сайт лучше оставить доступным.
</li>

<li>
<strong>Сохрани переписку и договорённости.</strong> В них могут быть названия хостинга, домена, сервисов, ссылки на репозиторий и сведения об интеграциях.
</li>

<li>
<strong>Сделай резервную копию.</strong> Нужны и файлы, и база данных. Если самостоятельно это небезопасно, попроси хостинг сформировать копию.
</li>

<li>
<strong>Предупреди команду.</strong> Маркетолог, SEO-специалист и менеджеры не должны параллельно менять сайт до завершения первичной проверки.
</li>

</ol>

</section>

<section id="access">

<h2>
Какие доступы нужно собрать
</h2>

<p>
Доступ в административную панель — только одна часть проекта. Сайт зависит от домена, DNS, хостинга, базы данных, почты, внешних сервисов и иногда отдельного репозитория с исходным кодом.
</p>

<div class="article-checklist">

<h3>
Минимальный комплект
</h3>

<ul>

<li>
аккаунт регистратора домена и управление DNS;
</li>

<li>
панель хостинга или доступ к серверу;
</li>

<li>
административная панель CMS;
</li>

<li>
файлы сайта по SFTP/SSH и база данных;
</li>

<li>
репозиторий Git, если разработка велась через него;
</li>

<li>
корпоративная почта, с которой создавались технические аккаунты;
</li>

<li>
Яндекс Метрика, Вебмастер, Search Console и системы аналитики;
</li>

<li>
CRM, телефония, платёжные системы, доставка и другие интеграции;
</li>

<li>
лицензии CMS, модулей, шрифтов и платных сервисов.
</li>

</ul>

</div>

<p>
Пароли лучше не пересылать в обычном сообщении. Создай отдельные учётные записи с минимально необходимыми правами или используй защищённую передачу секретов. После приёмки проекта лишние доступы можно отозвать.
</p>

</section>

<section id="ownership">

<h2>
Как вернуть контроль, если доступов нет
</h2>

<p>
Начинай с того, что юридически и технически принадлежит компании. Домен обычно можно восстановить через регистратора по данным владельца. Доступ к хостингу — через договор, платёжные документы и корпоративную почту. Аналогично восстанавливаются кабинеты аналитики и внешних сервисов.
</p>

<p>
Если аккаунт оформлен на личную почту бывшего подрядчика, собери подтверждения оплаты, договор, акты и переписку. Обратись в поддержку сервиса и опиши ситуацию. Не пытайся обходить защиту или получать доступ неофициальным способом — это создаёт новый риск вместо решения.
</p>

<div class="article-callout">
<strong>Критичный приоритет</strong>
<p>
Контроль над доменом важнее доступа в CMS. Пока домен оформлен на компанию и доступен владельцу, сайт и почту обычно можно восстановить даже после потери сервера.
</p>

</div>

</section>

<section id="new-developer">

<h2>
Что передать новому разработчику
</h2>

<p>
Не нужно сначала самостоятельно составлять идеальное техническое задание. Для первичного знакомства достаточно ссылки на сайт, описания ситуации и того набора доступов, который удалось собрать.
</p>

<p>
Полезно разделить информацию на три группы:
</p>

<ul>

<li>
<strong>Что работает сейчас:</strong> продажи, заявки, личные кабинеты, выгрузки и другие критичные сценарии.
</li>

<li>
<strong>Что сломано или вызывает вопросы:</strong> конкретные ошибки, даты появления, затронутые страницы.
</li>

<li>
<strong>Что планировали сделать:</strong> незавершённые задачи, макеты, требования SEO-команды и договорённости с прежним подрядчиком.
</li>

</ul>

<p>
Если документации нет, это не повод останавливать проект. При <a href="/support/">приёмке сайта на техническую поддержку</a> разработчик может восстановить карту системы по коду, конфигурации сервера, базе данных и подключённым сервисам.
</p>

</section>

<section id="audit">

<h2>
Почему работу стоит начать с технической диагностики
</h2>

<p>
Новый специалист не знает историю проекта и не может честно оценить все доработки по одной ссылке. Сначала нужно понять, из чего состоит сайт, как он развёрнут, где хранятся данные и какие изменения опасны.
</p>

<p>
Во время диагностики проверяют:
</p>

<ul>

<li>
CMS, версию PHP, плагины, модули и собственный код;
</li>

<li>
логи ошибок и состояние серверного окружения;
</li>

<li>
резервные копии и возможность восстановления;
</li>

<li>
интеграции, фоновые задания и обмены данными;
</li>

<li>
наличие тестовой среды и системы контроля версий;
</li>

<li>
критичные уязвимости и устаревшие зависимости;
</li>

<li>
технические ограничения для будущих задач.
</li>

</ul>

<p>
Например, на WordPress журнал ошибок можно включить отдельно от их показа посетителям. Но даже такую небольшую настройку сначала вносят на копии сайта:
</p>

<figure class="article-code">

<div class="article-code__head">

<div>
<span>PHP</span><strong>wp-config.php</strong>
</div>
<button type="button" aria-label="Копировать код из wp-config.php">Копировать</button>
</div>

<pre tabindex="0">
<code>define( &#x27;WP_DEBUG&#x27;, true );
define( &#x27;WP_DEBUG_LOG&#x27;, true );
define( &#x27;WP_DEBUG_DISPLAY&#x27;, false );</code>
</pre>

<figcaption>
Пример оформления кода в технических статьях. На рабочем сайте режим отладки включают только на время диагностики.
</figcaption>

</figure>

<p>
В тексте также можно использовать короткие конструкции вроде <code>WP_DEBUG_LOG</code> без отдельного блока. Результатом диагностики должен быть не абстрактный «аудит на сто страниц», а понятный план: что нужно сделать срочно, что можно отложить и какие задачи безопасно оценивать отдельно.
</p>

</section>

<section id="avoid">

<h2>
Чего точно не стоит делать
</h2>

<div class="article-mistakes">

<article>
<span>01</span>
<div>

<h3>
Сразу переписывать сайт
</h3>

<p>
Новый проект может быть оправдан, но это решение принимают после оценки текущей системы, данных, интеграций и SEO-рисков.
</p>

</div>

</article>

<article>
<span>02</span>
<div>

<h3>
Обновлять всё одной кнопкой
</h3>

<p>
На старом сайте обновление CMS, модулей или PHP без копии и проверки часто создаёт больше проблем, чем решает.
</p>

</div>

</article>

<article>
<span>03</span>
<div>

<h3>
Выдавать один общий пароль
</h3>

<p>
Нельзя понять, кто и что изменил. Отдельные учётные записи безопаснее и упрощают отзыв доступа.
</p>

</div>

</article>

<article>
<span>04</span>
<div>

<h3>
Оценивать по внешнему виду
</h3>

<p>
Аккуратный интерфейс может скрывать плохой код, а старый дизайн — вполне рабочую архитектуру. Нужна проверка изнутри.
</p>

</div>

</article>

</div>

</section>

<section id="prevention">

<h2>
Как не зависеть от одного разработчика в будущем
</h2>

<p>
Полностью исключить человеческий фактор невозможно, но бизнес не должен терять сайт вместе с одним контактом. Доступы и основные активы должны принадлежать компании, а изменения — оставлять проверяемый след.
</p>

<ul>

<li>
оформляй домен, хостинг и платные сервисы на компанию;
</li>

<li>
храни доступы в корпоративном менеджере паролей;
</li>

<li>
используй отдельные аккаунты для подрядчиков;
</li>

<li>
держи актуальные резервные копии вне основного сервера;
</li>

<li>
храни код в репозитории и фиксируй изменения;
</li>

<li>
записывай ключевые интеграции, лицензии и порядок развёртывания;
</li>

<li>
не откладывай обновление устаревшего окружения до аварии.
</li>

</ul>

<p>
Для нового сложного проекта эти правила лучше закладывать ещё во время <a href="/development/">разработки сайта под ключ</a>. Для уже работающего сайта их можно внедрять постепенно, не останавливая бизнес.
</p>

</section>

<section class="article-conclusion">

<p class="section-eyebrow">
Коротко
</p>

<h2>
Пропавший подрядчик — проблема управления, а не приговор сайту
</h2>

<p>
Сохрани текущее состояние, собери доступы, верни компании контроль над доменом и инфраструктурой, а затем передай проект на диагностику. Хороший новый разработчик сначала разберётся в системе и рисках, а не начнёт менять всё в первый день.
</p>
<a class="button" href="#contact" data-contact-modal="true">Помочь принять проект <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
</section>

<section class="article-author-box" aria-labelledby="about-author">
<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/andrey-startsev.png" alt="Андрей Старцев" width="92" height="92" loading="lazy" decoding="async" srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/andrey-startsev.png 92w"/>
<div>

<p class="section-eyebrow">
Об авторе
</p>

<h2 id="about-author">
Андрей Старцев
</h2>

<p>
Веб-разработчик и основатель студии «Аргоков». Более 10 лет разрабатывает и принимает на поддержку сайты на WordPress, 1С-Битрикс и с самописным кодом.
</p>
<a href="/#studio" class="text-link">О студии <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
</div>

</section>

</div>

</div>

</article>

<section class="article-related surface" aria-labelledby="related-title">

<header>

<div>

<p class="section-eyebrow">
Читайте дальше
</p>

<h2 id="related-title">
Материалы по теме
</h2>

</div>
<a href="/materials/" class="text-link">Все статьи <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
</header>

<div>

<article>
<span>Поддержка сайтов</span>
<h3>
Техническая поддержка сайта: что входит и когда она нужна
</h3>

<p>
Разбираем разовую помощь, сопровождение и постоянное развитие проекта.
</p>
<small>Материал готовится</small>
</article>

<article>
<span>Разработка сайтов</span>
<h3>
Доработка существующего сайта или разработка нового
</h3>

<p>
Когда сохранять текущую систему, а когда выгоднее спроектировать новую.
</p>
<small>Материал готовится</small>
</article>

</div>

</section>

<section class="article-comments surface" id="comments" aria-labelledby="comments-title">

<header class="article-comments__heading">

<div>

<p class="section-eyebrow">
Обсуждение
</p>

<h2 id="comments-title">
Комментарии <span>3</span>
</h2>

</div>

<p>
Задай вопрос по статье или расскажи о похожей ситуации. Отвечаем по существу и не публикуем контактные данные.
</p>

</header>

<div class="comment-list" aria-live="polite">

<div class="comment-list__demo-note">
<span>Пример отображения</span>
<p>
После интеграции WordPress здесь будут реальные комментарии.
</p>

</div>

<ol class="comment-list__items">

<li class="comment byuser">

<article class="comment-body">

<div class="comment-author-avatar" aria-hidden="true">
АК
</div>

<div>

<header class="comment-body__meta">

<div>
<strong class="comment-body__author">Алексей К.</strong><span class="comment-body__badge">Пример</span>
</div>
<time dateTime="2026-08-23T14:20:00+08:00">23 августа, 14:20</time>
</header>

<p class="comment-body__text">
Если домен оформлен на компанию, но хостинг регистрировал разработчик на свою почту, можно ли сначала перенести сайт на другой сервер без доступа к старой панели?
</p>
<a class="comment-reply-link" href="#respond">Ответить</a>
</div>

</article>

<ol class="children">

<li class="comment bypostauthor">

<article class="comment-body comment-body--author">

<div class="comment-author-avatar comment-author-avatar--author" aria-hidden="true">
АС
</div>

<div>

<header class="comment-body__meta">

<div>
<strong class="comment-body__author">Андрей Старцев</strong><span class="comment-body__badge comment-body__badge--author">Автор</span><span class="comment-body__badge">Пример</span>
</div>
<time dateTime="2026-08-23T15:05:00+08:00">23 августа, 15:05</time>
</header>

<p class="comment-body__text">
Да, если удалось получить актуальную копию файлов и базы данных. Сначала я бы проверил комплектность копии и зависимости проекта, а переключение DNS делал только после запуска и тестирования нового сервера.
</p>
<a class="comment-reply-link" href="#respond">Ответить</a>
</div>

</article>

</li>

</ol>

</li>

<li class="comment">

<article class="comment-body">

<div class="comment-author-avatar" aria-hidden="true">
МС
</div>

<div>

<header class="comment-body__meta">

<div>
<strong class="comment-body__author">Марина С.</strong><span class="comment-body__badge">Пример</span>
</div>
<time dateTime="2026-08-23T16:42:00+08:00">23 августа, 16:42</time>
</header>

<p class="comment-body__text">
Полезно было бы ещё добавить отдельный список доступов для интернет-магазина: оплаты, доставки, кассы и обмена с 1С.
</p>
<a class="comment-reply-link" href="#respond">Ответить</a>
</div>

</article>

</li>

</ol>

</div>

<form class="comment-form" id="respond" action="#comments" method="post">

<div class="comment-form__title">

<div>
<span>Оставить комментарий</span><strong>Присоединиться к обсуждению</strong>
</div>
<small>Поля со звёздочкой обязательны</small>
</div>

<div class="comment-form__fields">
<label><span>Имя *</span><input type="text" autoComplete="name" placeholder="Как к тебе обращаться" required="" name="author"/></label><label><span>Email *</span><input type="email" autoComplete="email" placeholder="Не будет опубликован" required="" name="email"/></label><label class="comment-form__message"><span>Комментарий *</span><textarea name="comment" rows="6" placeholder="Напиши вопрос или поделись опытом" required=""></textarea></label>
</div>

<div class="comment-form__options">
<label><input type="checkbox" name="wp-comment-cookies-consent" value="yes"/><span>Сохранить моё имя и email в этом браузере для следующих комментариев</span></label><label><input type="checkbox" required="" name="privacy_consent" value="yes"/><span>Даю <a href="/consent/">согласие на обработку персональных данных</a> и подтверждаю, что ознакомился с <a href="/privacy/">политикой обработки персональных данных</a></span></label>
</div>

<div class="comment-form__footer">
<button class="button" type="submit">Отправить комментарий</button>
<p>
Комментарий появится после проверки. Спам и рекламные ссылки удаляем.
</p>

</div>

</form>

</section>

<section class="contact surface" id="contact" aria-labelledby="article-contact-title">

<div class="contact__main">

<p class="section-eyebrow">
Нужно принять сайт
</p>

<h2 id="article-contact-title">
Разберёмся в проекте и вернём контроль
</h2>

<p>
Пришли ссылку и кратко опиши ситуацию. Скажем, какие доступы понадобятся, с чего безопасно начать и можем ли взять сайт на поддержку.
</p>

<div class="contact__direct">
<a href="tel:+79990000000"><span>Телефон</span><strong>+7 999 000-00-00</strong></a><a href="mailto:mail@argokov.ru"><span>Почта</span><strong>mail@argokov.ru</strong></a>
</div>

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

<?php get_footer(); ?>
