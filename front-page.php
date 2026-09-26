<?php
/**
 * Front page
 *
 * @package Argokov
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();
?>

<section class="hero" aria-labelledby="hero-title">

        <article class="hero__content surface">

          <p class="eyebrow">
            Разработка · поддержка · сложные доработки
          </p>

          <h1 id="hero-title">
            Разработка и поддержка сайтов <span>для бизнеса</span>
          </h1>

          <p class="hero__lead">
            Создаём новые сайты и берём на поддержку существующие — на любой CMS или с самописным кодом. Разбираемся
            даже в старых и сложных проектах, исправляем накопленные проблемы и развиваем дальше.
          </p>

          <div class="hero__actions">
            <a class="button" href="#contact" data-contact-modal="true">Обсудить задачу<svg aria-hidden="true"
                class="arrow" viewBox="0 0 24 24" fill="none">
                <path d="M5 12h13M13 7l5 5-5 5"></path>
              </svg></a>
          </div>

          <div class="hero__author">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/andrey-startsev.png" alt="Андрей Старцев" width="52" height="52"
              loading="lazy" decoding="async" srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/andrey-startsev.png 52w"
              class="hero__author-photo" />
            <div>
              <strong>Андрей Старцев</strong><span>Основатель и ведущий разработчик</span>
            </div>

            <p>
              Лично отвечаю за архитектуру и качество проектов
            </p>

          </div>

        </article>

        <aside class="hero__visual surface" aria-label="С чем можно обратиться">

          <div class="hero__visual-heading">

            <div>
              <span>С чем можно обратиться</span>
              <h2>
                Работаем с проектами на любом этапе
              </h2>

            </div>
            <span class="hero__visual-index">01—04</span>
          </div>

          <div class="work-layers">

            <div class="work-layer work-layer--interface">

              <div class="work-layer__heading">
                <span>01</span><strong>Новый сайт</strong>
              </div>

              <div class="work-layer__preview" aria-hidden="true">
                <span class="work-layer__line work-layer__line--long"></span><span class="work-layer__line"></span><span
                  class="work-layer__line work-layer__line--short"></span>
              </div>

              <p>
                Проектирование, дизайн, разработка и запуск
              </p>

            </div>

            <div class="work-layer work-layer--content">

              <div class="work-layer__heading">
                <span>02</span><strong>Доработка</strong>
              </div>

              <div class="work-layer__preview" aria-hidden="true">
                <span class="work-layer__line work-layer__line--long"></span><span class="work-layer__line"></span><span
                  class="work-layer__line work-layer__line--short"></span>
              </div>

              <p>
                Новый функционал, страницы и интеграции
              </p>

            </div>

            <div class="work-layer work-layer--connections">

              <div class="work-layer__heading">
                <span>03</span><strong>Сложный проект</strong>
              </div>

              <div class="work-layer__preview" aria-hidden="true">
                <span class="work-layer__line work-layer__line--long"></span><span class="work-layer__line"></span><span
                  class="work-layer__line work-layer__line--short"></span>
              </div>

              <p>
                Старые CMS, самописные решения и доисторический код
              </p>

            </div>

            <div class="work-layer work-layer--support">

              <div class="work-layer__heading">
                <span>04</span><strong>Поддержка и развитие</strong>
              </div>

              <div class="work-layer__preview" aria-hidden="true">
                <span class="work-layer__line work-layer__line--long"></span><span class="work-layer__line"></span><span
                  class="work-layer__line work-layer__line--short"></span>
              </div>

              <p>
                Исправления, обновления и задачи от SEO-команды
              </p>

            </div>

          </div>

          <p class="hero__visual-note">
            Погружаемся в проект <span>·</span> знаем его целиком<span>·</span> отвечаем за результат
          </p>

        </aside>

      </section>

      <section class="proof" aria-label="Ключевые преимущества">

        <article class="proof__item surface">
          <span class="proof__number">01</span>
          <div>
            <strong>10 лет в веб-разработке</strong>
            <p>
              Запускаем с нуля и подключаемся к готовому проекту
            </p>

          </div>

        </article>

        <article class="proof__item surface">
          <span class="proof__number">02</span>
          <div>
            <strong>Любые CMS и самописные сайты</strong>
            <p>
              WordPress — основной стек, но не ограничение
            </p>

          </div>

        </article>

        <article class="proof__item surface">
          <span class="proof__number">03</span>
          <div>
            <strong>Прямой контакт с разработкой</strong>
            <p>
              Без потери деталей между менеджерами
            </p>

          </div>

        </article>

      </section>

      <section class="home-section directions surface" aria-labelledby="directions-title">

        <header class="section-heading">

          <div class="section-heading__main">

            <p class="section-eyebrow">
              Основные направления
            </p>

            <h2>
              Создаём новые сайты и развиваем существующие
            </h2>

          </div>

          <p class="section-heading__copy">
            Можно прийти с идеей нового проекта, старым сайтом или задачей, от которой отказались другие.
          </p>
          <span class="section-heading__index">02</span>
        </header>

        <div class="directions__list">

          <article class="direction-card" id="development">

            <div class="direction-card__cover">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/service-development-cover.webp" alt="" loading="lazy" decoding="async"
                sizes="(max-width: 960px) 100vw, 50vw"
                style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover" /><span
                class="direction-card__number">01</span>
            </div>

            <div class="direction-card__body">

              <h3>
                Разработка сайтов
              </h3>

              <p class="direction-card__lead">
                Создаём сайт с нуля или полностью обновляем существующий. Берём на себя структуру, дизайн, разработку,
                интеграции и запуск.
              </p>

              <ul class="feature-list">

                <li>
                  <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="m4.5 10.5 3.2 3.2 7.8-8"></path>
                  </svg>Корпоративные сайты и лендинги
                </li>

                <li>
                  <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="m4.5 10.5 3.2 3.2 7.8-8"></path>
                  </svg>Интернет-магазины и каталоги
                </li>

                <li>
                  <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="m4.5 10.5 3.2 3.2 7.8-8"></path>
                  </svg>Личные кабинеты и веб-сервисы
                </li>

                <li>
                  <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="m4.5 10.5 3.2 3.2 7.8-8"></path>
                  </svg>Интеграции с CRM, 1С и другими системами
                </li>

              </ul>

              <div class="direction-card__footer">
                <span>От идеи до работающего проекта</span><a href="#contact" data-contact-modal="true">Обсудить новый
                  сайт <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none">
                    <path d="M5 12h13M13 7l5 5-5 5"></path>
                  </svg></a>
              </div>

            </div>

          </article>

          <article class="direction-card direction-card--accent" id="support">

            <div class="direction-card__cover">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/service-support-cover.webp" alt="" loading="lazy" decoding="async"
                sizes="(max-width: 960px) 100vw, 50vw"
                style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover" /><span
                class="direction-card__number">02</span>
            </div>

            <div class="direction-card__body">

              <h3>
                Поддержка и развитие
              </h3>

              <p class="direction-card__lead">
                Подключаемся к действующему сайту и берём техническую часть на себя. Исправляем ошибки, добавляем
                функции, выполняем задачи SEO-команды и постепенно приводим проект в порядок.
              </p>

              <ul class="feature-list">

                <li>
                  <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="m4.5 10.5 3.2 3.2 7.8-8"></path>
                  </svg>Разовые доработки
                </li>

                <li>
                  <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="m4.5 10.5 3.2 3.2 7.8-8"></path>
                  </svg>Постоянная поддержка
                </li>

                <li>
                  <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="m4.5 10.5 3.2 3.2 7.8-8"></path>
                  </svg>Скорость, безопасность и техническое SEO
                </li>

                <li>
                  <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="m4.5 10.5 3.2 3.2 7.8-8"></path>
                  </svg>Сложные задачи и доисторический код
                </li>

              </ul>

              <div class="direction-card__footer">
                <span>Любая CMS или самописный код</span><a href="#contact" data-contact-modal="true">Передать сайт на
                  поддержку <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none">
                    <path d="M5 12h13M13 7l5 5-5 5"></path>
                  </svg></a>
              </div>

            </div>

          </article>

        </div>

      </section>

      <section class="home-section cases surface" id="work" aria-labelledby="cases-title">

        <header class="section-heading">

          <div class="section-heading__main">

            <p class="section-eyebrow">
              Выбранные проекты
            </p>

            <h2>
              Показываем не макеты, а выполненную работу
            </h2>

          </div>

          <p class="section-heading__copy">
            Коротко о задаче, нашей роли и том, что было сделано внутри проекта.
          </p>
          <span class="section-heading__index">03</span>
        </header>

        <div class="cases__list">

          <article class="case-card">

            <div class="case-card__meta">
              <span>01</span><span>Медицина · развитие</span>
            </div>

            <h3>
              Урал Медикал Групп
            </h3>

            <p class="case-card__lead">
              Развиваем сайт сети медицинских центров: от структуры городов и услуг до интеграций и технического SEO.
            </p>

            <div class="case-card__work">
              <span>Что сделали</span>
              <ul>

                <li>
                  Архитектура услуг, городов и специалистов
                </li>

                <li>
                  Формы записи и интеграция с CRM
                </li>

                <li>
                  Schema.org и техническое SEO
                </li>

                <li>
                  Новые разделы и постоянные доработки
                </li>

              </ul>

            </div>

            <footer class="case-card__footer">

              <div class="tag-list">
                <span>WordPress</span><span>PHP</span><span>ACF</span>
              </div>
              <a href="https://www.medgrup.online/" target="_blank" rel="noreferrer">Открыть сайт <svg
                  aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none">
                  <path d="M5 12h13M13 7l5 5-5 5"></path>
                </svg></a>
            </footer>

          </article>

          <article class="case-card">

            <div class="case-card__meta">
              <span>02</span><span>Строительство · разработка</span>
            </div>

            <h3>
              Кровельная компания «МИК»
            </h3>

            <p class="case-card__lead">
              Разработали сайт кровельной компании и продолжаем развивать его под новые услуги и задачи бизнеса.
            </p>

            <div class="case-card__work">
              <span>Что сделали</span>
              <ul>

                <li>
                  Структура услуг и посадочных страниц
                </li>

                <li>
                  Интерактивный расчёт стоимости
                </li>

                <li>
                  Гибкие блоки для самостоятельного наполнения
                </li>

                <li>
                  Формы заявок и технические доработки
                </li>

              </ul>

            </div>

            <footer class="case-card__footer">

              <div class="tag-list">
                <span>WordPress</span><span>ACF</span><span>JavaScript</span>
              </div>
              <a href="https://www.pvhkrovlya.ru/" target="_blank" rel="noreferrer">Открыть сайт <svg aria-hidden="true"
                  class="arrow" viewBox="0 0 24 24" fill="none">
                  <path d="M5 12h13M13 7l5 5-5 5"></path>
                </svg></a>
            </footer>

          </article>

        </div>

        <div class="section-action">

          <p>
            Часть проектов не публикуем: работаем по NDA и соблюдаем договорённости с клиентами. О релевантном опыте
            можем рассказать лично — без раскрытия закрытых данных.
          </p>
          <a href="/cases/">Смотреть все кейсы <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none">
              <path d="M5 12h13M13 7l5 5-5 5"></path>
            </svg></a>
        </div>

      </section>

      <section class="home-section legacy surface" id="improvements" aria-labelledby="legacy-title">

        <div class="legacy__content">

          <p class="section-eyebrow">
            Сложные и старые проекты
          </p>

          <h2 id="legacy-title">
            Доработка и поддержка сайтов, за которые другие не берутся
          </h2>

          <div class="legacy__intro">

            <p>
              Берём на техническую поддержку корпоративные сайты, интернет-магазины и веб-сервисы на WordPress,
              1С-Битрикс, других CMS и с самописным кодом. Исправляем ошибки, добавляем функции, подключаем интеграции и
              выполняем технические задачи SEO.
            </p>

            <p>
              Полностью переделывать сайт нужно не всегда. Сначала определяем, что можно сохранить и безопасно развивать
              дальше.
            </p>

          </div>

          <div class="legacy__services">

            <h3>
              Что можем сделать
            </h3>

            <ul>

              <li>
                <span>01</span>
                <p>
                  Исправить ошибки и восстановить работу сайта
                </p>

              </li>

              <li>
                <span>02</span>
                <p>
                  Добавить новые разделы и функции
                </p>

              </li>

              <li>
                <span>03</span>
                <p>
                  Ускорить загрузку и повысить безопасность
                </p>

              </li>

              <li>
                <span>04</span>
                <p>
                  Выполнить рекомендации SEO-специалиста
                </p>

              </li>

              <li>
                <span>05</span>
                <p>
                  Подключить CRM, 1С, оплату и внешние сервисы
                </p>

              </li>

              <li>
                <span>06</span>
                <p>
                  Обновить CMS, плагины, PHP и серверное окружение
                </p>

              </li>

            </ul>

          </div>

        </div>

        <aside class="legacy__project-types" aria-labelledby="project-types-title">

          <div class="legacy__project-types-header">

            <p class="section-eyebrow">
              Можно передать нам
            </p>

            <h3 id="project-types-title">
              С каким проектом можно обратиться
            </h3>

          </div>

          <ul>

            <li>
              <span>01</span>
              <p>
                Старый сайт на WordPress или 1С-Битрикс
              </p>

            </li>

            <li>
              <span>02</span>
              <p>
                Самописный проект без документации
              </p>

            </li>

            <li>
              <span>03</span>
              <p>
                Интернет-магазин со сложными интеграциями
              </p>

            </li>

            <li>
              <span>04</span>
              <p>
                Сайт после нескольких подрядчиков
              </p>

            </li>

            <li>
              <span>05</span>
              <p>
                Проект, от которого отказался прежний разработчик
              </p>

            </li>

            <li>
              <span>06</span>
              <p>
                Любой другой сайт, к коду которого есть доступ
              </p>

            </li>

          </ul>

        </aside>

        <div class="legacy__footer">

          <div class="legacy__platforms">

            <p>
              Технологии и платформы
            </p>

            <div class="legacy__stack" aria-label="Технологии и платформы">
              <span>WordPress</span><span>1С-Битрикс</span><span>WooCommerce</span><span>OpenCart</span><span>MODX</span><span>Laravel</span><span>PHP</span><span>Самописный
                код</span>
            </div>

          </div>

          <div class="legacy__action">

            <p>
              Не нашли свою CMS? Всё равно пришли ссылку — сначала изучим проект, а не будем отказывать по названию
              технологии.
            </p>
            <a class="button" href="#contact" data-contact-modal="true">Обсудить доработку <svg aria-hidden="true"
                class="arrow" viewBox="0 0 24 24" fill="none">
                <path d="M5 12h13M13 7l5 5-5 5"></path>
              </svg></a>
          </div>

        </div>

      </section>

      <section class="home-section process surface" id="process" aria-labelledby="process-title">

        <header class="section-heading">

          <div class="section-heading__main">

            <p class="section-eyebrow">
              Как устроена работа
            </p>

            <h2>
              Понятный процесс без сюрпризов
            </h2>

          </div>

          <p class="section-heading__copy">
            На каждом этапе видно, что происходит с проектом, зачем это делается и что будет дальше.
          </p>
          <span class="section-heading__index">04</span>
        </header>

        <div class="process__list">

          <article class="process-card">
            <span class="process-card__number">01</span>
            <h3>
              Слушаем задачу
            </h3>

            <p>
              Уточняем цель, ограничения и что для бизнеса будет считаться результатом.
            </p>

          </article>

          <article class="process-card">
            <span class="process-card__number">02</span>
            <h3>
              Изучаем проект
            </h3>

            <p>
              Проверяем код, CMS, интеграции и риски. Не оцениваем вслепую.
            </p>

          </article>

          <article class="process-card">
            <span class="process-card__number">03</span>
            <h3>
              Согласовываем решение
            </h3>

            <p>
              Фиксируем объём, порядок работ, сроки и понятную оценку.
            </p>

          </article>

          <article class="process-card">
            <span class="process-card__number">04</span>
            <h3>
              Работаем на копии
            </h3>

            <p>
              Делаем резервную копию, используем контроль версий и не рискуем рабочим сайтом.
            </p>

          </article>

          <article class="process-card">
            <span class="process-card__number">05</span>
            <h3>
              Проверяем и запускаем
            </h3>

            <p>
              Тестируем результат, переносим изменения и остаёмся на связи после запуска.
            </p>

          </article>

        </div>

        <div class="process__note">
          <span>Резервные копии</span><span>Контроль версий</span><span>Тестирование</span><span>Фиксация
            договорённостей</span>
        </div>

      </section>

      <section class="home-section formats surface" aria-labelledby="formats-title">

        <header class="section-heading">

          <div class="section-heading__main">

            <p class="section-eyebrow">
              Форматы сотрудничества
            </p>

            <h2>
              Подключаемся так, как удобно проекту
            </h2>

          </div>

          <p class="section-heading__copy">
            Можно начать с одной задачи, заказать проект целиком или передать сайт на постоянное развитие.
          </p>
          <span class="section-heading__index">05</span>
        </header>

        <div class="formats__list">

          <article class="format-card">
            <span class="format-card__label">Точечно</span>
            <h3>
              Разовая задача
            </h3>

            <p>
              Исправление ошибки, новый блок, интеграция, ускорение или техническая SEO-задача.
            </p>

            <ul>

              <li>
                Понятный объём
              </li>

              <li>
                Согласованная оценка
              </li>

              <li>
                Приёмка результата
              </li>

            </ul>
            <a href="#contact" data-contact-modal="true">Обсудить задачу <svg aria-hidden="true" class="arrow"
                viewBox="0 0 24 24" fill="none">
                <path d="M5 12h13M13 7l5 5-5 5"></path>
              </svg></a>
          </article>

          <article class="format-card format-card--primary">
            <span class="format-card__label">Комплексно</span>
            <h3>
              Проект под ключ
            </h3>

            <p>
              Берём ответственность за путь от идеи и структуры до разработки, интеграций и запуска.
            </p>

            <ul>

              <li>
                Единая команда
              </li>

              <li>
                Поэтапная работа
              </li>

              <li>
                Поддержка после запуска
              </li>

            </ul>
            <a href="#contact" data-contact-modal="true">Обсудить проект <svg aria-hidden="true" class="arrow"
                viewBox="0 0 24 24" fill="none">
                <path d="M5 12h13M13 7l5 5-5 5"></path>
              </svg></a>
          </article>

          <article class="format-card">
            <span class="format-card__label">Регулярно</span>
            <h3>
              Постоянная поддержка
            </h3>

            <p>
              Ведём очередь задач, следим за техническим состоянием и развиваем сайт вместе с бизнесом.
            </p>

            <ul>

              <li>
                Знаем проект целиком
              </li>

              <li>
                Планируем задачи
              </li>

              <li>
                Всегда есть ответственный
              </li>

            </ul>
            <a href="#contact" data-contact-modal="true">Передать сайт <svg aria-hidden="true" class="arrow"
                viewBox="0 0 24 24" fill="none">
                <path d="M5 12h13M13 7l5 5-5 5"></path>
              </svg></a>
          </article>

        </div>

      </section>

      <section class="home-section studio surface" id="studio" aria-labelledby="studio-title">

        <div class="studio__photo">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/andrey-startsev.png" alt="Андрей Старцев, основатель студии Аргоков"
            loading="lazy" decoding="async" sizes="(max-width: 960px) 100vw, 42vw"
            style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover" />
          <div class="studio__photo-caption">
            <span>Андрей Старцев</span><span>Основатель · ведущий разработчик</span>
          </div>

        </div>

        <div class="studio__content">

          <p class="section-eyebrow">
            О студии
          </p>

          <h2 id="studio-title">
            Аргоков — студия с личной ответственностью
          </h2>

          <p class="studio__lead">
            Мы работаем как студия, а не как случайный набор исполнителей. Андрей лично ведёт архитектуру и отвечает за
            техническое качество, а под задачу подключаются нужные специалисты.
          </p>

          <blockquote>
            Название «Аргоков» связано с важной для нас семейной историей. Для студии оно означает силу, ответственность
            и работу, за которую не стыдно.
          </blockquote>

          <div class="studio__facts">

            <div>
              <strong>10 лет</strong><span>в веб-разработке</span>
            </div>

            <div>
              <strong>Иркутск</strong><span>работаем по всей России</span>
            </div>

            <div>
              <strong>Лично</strong><span>погружаемся в каждый проект</span>
            </div>

          </div>
          <a class="text-link" href="#contact">Познакомиться с нами <svg aria-hidden="true" class="arrow"
              viewBox="0 0 24 24" fill="none">
              <path d="M5 12h13M13 7l5 5-5 5"></path>
            </svg></a>
        </div>

      </section>

      <section class="home-section faq surface" id="faq" aria-labelledby="faq-title">

        <div class="faq__intro">

          <p class="section-eyebrow">
            Частые вопросы
          </p>

          <h2 id="faq-title">
            До начала работы
          </h2>

          <p>
            Коротко ответили на вопросы, которые обычно возникают перед первым обращением.
          </p>
          <a class="text-link" href="#contact">Задать свой вопрос <svg aria-hidden="true" class="arrow"
              viewBox="0 0 24 24" fill="none">
              <path d="M5 12h13M13 7l5 5-5 5"></path>
            </svg></a>
        </div>

        <div class="faq__list">

          <details>

            <summary>
              <span>01</span><strong>Возьмётесь за сайт не на WordPress и не на 1С-Битрикс?</strong><i
                aria-hidden="true"></i>
            </summary>

            <p>
              Да. Работаем с разными CMS, фреймворками и самописными решениями. Сначала изучим проект и честно скажем,
              как безопаснее решить задачу.
            </p>

          </details>

          <details>

            <summary>
              <span>02</span><strong>Можно обратиться с одной небольшой задачей?</strong><i aria-hidden="true"></i>
            </summary>

            <p>
              Можно. Не обязательно сразу заключать договор на длительную поддержку — начнём с конкретной доработки или
              диагностики.
            </p>

          </details>

          <details>

            <summary>
              <span>03</span><strong>Что если документации нет, а прежний разработчик недоступен?</strong><i
                aria-hidden="true"></i>
            </summary>

            <p>
              Это знакомая ситуация. Разберём структуру проекта, восстановим логику работы и зафиксируем важное, чтобы
              дальше сайт было проще сопровождать.
            </p>

          </details>

          <details>

            <summary>
              <span>04</span><strong>Как формируется оценка?</strong><i aria-hidden="true"></i>
            </summary>

            <p>
              После короткого брифа и изучения проекта. Для понятных задач фиксируем стоимость, для неопределённых
              сначала предлагаем ограниченный этап диагностики.
            </p>

          </details>

          <details>

            <summary>
              <span>05</span><strong>Работаете с SEO-командами, дизайнерами и агентствами?</strong><i
                aria-hidden="true"></i>
            </summary>

            <p>
              Да. Можем взять только техническую часть, подключиться к вашей команде или вести проект целиком — без
              борьбы за роли.
            </p>

          </details>

          <details>

            <summary>
              <span>06</span><strong>Вы работаете только в Иркутске?</strong><i aria-hidden="true"></i>
            </summary>

            <p>
              Нет. Студия находится в Иркутске, а проекты ведём по всей России. Созвоны, документы и рабочие процессы
              организованы удалённо.
            </p>

          </details>

        </div>

      </section>

      <section class="home-section materials surface" id="materials" aria-labelledby="materials-title">

        <header class="section-heading">

          <div class="section-heading__main">

            <p class="section-eyebrow">
              Полезные материалы
            </p>

            <h2>
              Разбираем разработку, поддержку и развитие сайтов
            </h2>

          </div>

          <p class="section-heading__copy">
            Практические материалы о технической поддержке, доработках, безопасности и SEO — без пересказа очевидных
            вещей.
          </p>
          <span class="section-heading__index">06</span>
        </header>

        <div class="materials__list">

          <article class="material-card" itemscope="" itemtype="https://schema.org/BlogPosting">
            <meta itemprop="dateModified" content="2026-08-18" /><span hidden="" itemprop="author" itemscope=""
              itemtype="https://schema.org/Person">
              <meta itemprop="name" content="Андрей Старцев" />
            </span><span hidden="" itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
              <meta itemprop="name" content="Аргоков" />
            </span><a class="material-card__cover" href="/materials/tehnicheskaya-podderzhka-sayta/"
              aria-label="Читать: Техническая поддержка сайта: что входит и когда она нужна"><img
                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/material-support-cover.webp"
                alt="Рабочее место специалиста по технической поддержке сайтов" loading="lazy" decoding="async"
                sizes="(max-width: 620px) 100vw, (max-width: 960px) 80vw, 33vw"
                style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover" />
              <meta itemprop="image" content="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/material-support-cover.webp" />
            </a>
            <div class="material-card__body">

              <div class="material-card__top">
                <span>Поддержка сайтов</span><time itemprop="datePublished" dateTime="2026-08-18">18 августа 2026</time>
              </div>

              <h3 itemprop="headline">
                <a href="/materials/tehnicheskaya-podderzhka-sayta/" itemprop="url mainEntityOfPage">Техническая
                  поддержка сайта: что входит и когда она нужна</a>
              </h3>

              <p itemprop="description">
                Разбираем, какие задачи входят в поддержку сайта, чем разовая доработка отличается от сопровождения и
                когда бизнесу нужен постоянный разработчик.
              </p>

              <footer class="material-card__footer">

                <div class="material-card__metrics">
                  <time itemprop="timeRequired" dateTime="PT8M">8 минут</time><span itemprop="interactionStatistic"
                    itemscope="" itemtype="https://schema.org/InteractionCounter">
                    <meta itemprop="interactionType" content="https://schema.org/ViewAction" />
                    <meta itemprop="userInteractionCount" content="146" />146 просмотров
                  </span><span><span itemprop="commentCount">3</span> комментария</span>
                </div>
                <a class="material-card__link" href="/materials/tehnicheskaya-podderzhka-sayta/">Читать <svg
                    aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none">
                    <path d="M5 12h13M13 7l5 5-5 5"></path>
                  </svg></a>
              </footer>

            </div>

          </article>

          <article class="material-card" itemscope="" itemtype="https://schema.org/BlogPosting">
            <meta itemprop="dateModified" content="2026-08-23" /><span hidden="" itemprop="author" itemscope=""
              itemtype="https://schema.org/Person">
              <meta itemprop="name" content="Андрей Старцев" />
            </span><span hidden="" itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
              <meta itemprop="name" content="Аргоков" />
            </span><a class="material-card__cover" href="/materials/razrabotchik-perestal-otvechat/"
              aria-label="Читать: Что делать, если прежний разработчик перестал отвечать"><img
                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/material-developer-silent-cover.png"
                alt="Оставленное рабочее место разработчика и материалы проекта" loading="lazy" decoding="async"
                sizes="(max-width: 620px) 100vw, (max-width: 960px) 80vw, 33vw"
                style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover" />
              <meta itemprop="image" content="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/material-developer-silent-cover.png" />
            </a>
            <div class="material-card__body">

              <div class="material-card__top">
                <span>Сложные проекты</span><time itemprop="datePublished" dateTime="2026-08-23">23 августа 2026</time>
              </div>

              <h3 itemprop="headline">
                <a href="/materials/razrabotchik-perestal-otvechat/" itemprop="url mainEntityOfPage">Что делать, если
                  прежний разработчик перестал отвечать</a>
              </h3>

              <p itemprop="description">
                Как безопасно передать сайт новому специалисту, восстановить доступы и продолжить работу, даже если
                документации не осталось.
              </p>

              <footer class="material-card__footer">

                <div class="material-card__metrics">
                  <time itemprop="timeRequired" dateTime="PT6M">6 минут</time><span itemprop="interactionStatistic"
                    itemscope="" itemtype="https://schema.org/InteractionCounter">
                    <meta itemprop="interactionType" content="https://schema.org/ViewAction" />
                    <meta itemprop="userInteractionCount" content="98" />98 просмотров
                  </span><span><span itemprop="commentCount">1</span> комментарий</span>
                </div>
                <a class="material-card__link" href="/materials/razrabotchik-perestal-otvechat/">Читать <svg
                    aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none">
                    <path d="M5 12h13M13 7l5 5-5 5"></path>
                  </svg></a>
              </footer>

            </div>

          </article>

          <article class="material-card" itemscope="" itemtype="https://schema.org/BlogPosting">
            <meta itemprop="dateModified" content="2026-08-09" /><span hidden="" itemprop="author" itemscope=""
              itemtype="https://schema.org/Person">
              <meta itemprop="name" content="Андрей Старцев" />
            </span><span hidden="" itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
              <meta itemprop="name" content="Аргоков" />
            </span><a class="material-card__cover" href="/materials/dorabotka-sayta-ili-novaya-razrabotka/"
              aria-label="Читать: Доработка существующего сайта или разработка нового: что выбрать"><img
                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/material-rebuild-cover.webp"
                alt="Сравнение доработки существующего сайта и новой разработки" loading="lazy" decoding="async"
                sizes="(max-width: 620px) 100vw, (max-width: 960px) 80vw, 33vw"
                style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover" />
              <meta itemprop="image" content="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/material-rebuild-cover.webp" />
            </a>
            <div class="material-card__body">

              <div class="material-card__top">
                <span>Разработка сайтов</span><time itemprop="datePublished" dateTime="2026-08-09">9 августа 2026</time>
              </div>

              <h3 itemprop="headline">
                <a href="/materials/dorabotka-sayta-ili-novaya-razrabotka/" itemprop="url mainEntityOfPage">Доработка
                  существующего сайта или разработка нового: что выбрать</a>
              </h3>

              <p itemprop="description">
                Сравниваем риски, стоимость и сроки двух подходов, чтобы принять решение на основе состояния проекта, а
                не эмоций.
              </p>

              <footer class="material-card__footer">

                <div class="material-card__metrics">
                  <time itemprop="timeRequired" dateTime="PT9M">9 минут</time><span itemprop="interactionStatistic"
                    itemscope="" itemtype="https://schema.org/InteractionCounter">
                    <meta itemprop="interactionType" content="https://schema.org/ViewAction" />
                    <meta itemprop="userInteractionCount" content="211" />211 просмотров
                  </span><span><span itemprop="commentCount">5</span> комментариев</span>
                </div>
                <a class="material-card__link" href="/materials/dorabotka-sayta-ili-novaya-razrabotka/">Читать <svg
                    aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none">
                    <path d="M5 12h13M13 7l5 5-5 5"></path>
                  </svg></a>
              </footer>

            </div>

          </article>

        </div>

        <div class="materials__all">
          <a class="text-link" href="/materials/">Смотреть все статьи <svg aria-hidden="true" class="arrow"
              viewBox="0 0 24 24" fill="none">
              <path d="M5 12h13M13 7l5 5-5 5"></path>
            </svg></a>
        </div>

      </section>

      <section class="contact surface" id="contact" aria-labelledby="contact-title">

        <div class="contact__main">

          <p class="section-eyebrow">
            Начнём с задачи
          </p>

          <h2 id="contact-title">
            Расскажите, что нужно сделать
          </h2>

          <p>
            Можно прислать ссылку на сайт, кратко описать проблему или приложить готовое техническое задание. Изучим
            материалы, зададим уточняющие вопросы и предложим следующий шаг.
          </p>

          <div class="contact__direct">
            <a href="tel:+79990000000"><span>Телефон</span><strong>+7 999 000-00-00</strong></a><a
              href="mailto:mail@argokov.ru"><span>Почта</span><strong>mail@argokov.ru</strong></a>
          </div>

          <div class="contact__location">
            <i aria-hidden="true"></i><span>Иркутск · работаем по всей России</span><span>Принимаем обращения
              24/7</span>
          </div>

        </div>

        <form class="contact__form" aria-label="Форма для обсуждения задачи">

          <div class="contact-form__row">
            <label class="contact-form__field"><span>Имя</span><input type="text" autoComplete="name"
                placeholder="Как к вам обращаться" name="name" /></label><label
              class="contact-form__field"><span>Телефон</span><input type="tel" autoComplete="tel"
                placeholder="+7 999 000-00-00" required="" name="phone" /></label>
          </div>
          <label class="contact-form__field"><span>Описание задачи</span><textarea name="task" rows="5"
              placeholder="Ссылка на сайт, что нужно сделать и какой результат хотите получить"
              required=""></textarea></label><label class="contact-form__file"><span>Прикрепить файл</span><small>PDF,
              DOCX, XLSX, JPG, PNG или ZIP · до 10 МБ</small><input type="file"
              accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png,.zip" name="file" /></label><label
            class="contact-form__consent"><input type="checkbox" required="" name="consent" /><span>Даю <a
                href="/consent/">согласие на обработку персональных данных</a> и подтверждаю, что ознакомлен с <a
                href="/privacy/">политикой обработки персональных данных</a>.</span></label>
          <div class="contact-form__submit">
            <button class="button" type="button">Отправить задачу <svg aria-hidden="true" class="arrow"
                viewBox="0 0 24 24" fill="none">
                <path d="M5 12h13M13 7l5 5-5 5"></path>
              </svg></button>
            <p>
              Ответим, уточним детали и предложим следующий шаг.
            </p>

          </div>

        </form>

      </section>

<?php get_footer(); ?>
