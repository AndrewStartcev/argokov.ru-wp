<?php
defined( 'ABSPATH' ) || exit;

$items = argokov_rows(
	'home_faq_items',
	array(
		array( 'number' => '01', 'question' => 'Возьмётесь за сайт не на WordPress и не на 1С-Битрикс?', 'answer' => 'Да. Работаем с разными CMS, фреймворками и самописными решениями. Сначала изучим проект и честно скажем, как безопаснее решить задачу.' ),
		array( 'number' => '02', 'question' => 'Можно обратиться с одной небольшой задачей?', 'answer' => 'Можно. Не обязательно сразу заключать договор на длительную поддержку — начнём с конкретной доработки или диагностики.' ),
		array( 'number' => '03', 'question' => 'Что если документации нет, а прежний разработчик недоступен?', 'answer' => 'Это знакомая ситуация. Разберём структуру проекта, восстановим логику работы и зафиксируем важное, чтобы дальше сайт было проще сопровождать.' ),
		array( 'number' => '04', 'question' => 'Как формируется оценка?', 'answer' => 'После короткого брифа и изучения проекта. Для понятных задач фиксируем стоимость, для неопределённых сначала предлагаем ограниченный этап диагностики.' ),
		array( 'number' => '05', 'question' => 'Работаете с SEO-командами, дизайнерами и агентствами?', 'answer' => 'Да. Можем взять только техническую часть, подключиться к вашей команде или вести проект целиком — без борьбы за роли.' ),
		array( 'number' => '06', 'question' => 'Вы работаете только в Иркутске?', 'answer' => 'Нет. Студия находится в Иркутске, а проекты ведём по всей России. Созвоны, документы и рабочие процессы организованы удалённо.' ),
	)
);
?>
<section class="home-section faq surface" id="faq" aria-labelledby="faq-title">
	<div class="faq__intro">
		<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'home_faq_eyebrow', 'Частые вопросы' ) ); ?></p>
		<h2 id="faq-title"><?php echo esc_html( argokov_field( 'home_faq_title', 'До начала работы' ) ); ?></h2>
		<p><?php echo esc_html( argokov_field( 'home_faq_copy', 'Коротко ответили на вопросы, которые обычно возникают перед первым обращением.' ) ); ?></p>
		<a class="text-link" href="#contact"><?php echo esc_html( argokov_field( 'home_faq_link_label', 'Задать свой вопрос' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
	</div>

	<div class="faq__list">
		<?php foreach ( $items as $item ) : ?>
			<details>
				<summary><span><?php echo esc_html( $item['number'] ?? '' ); ?></span><strong><?php echo esc_html( $item['question'] ?? '' ); ?></strong><i aria-hidden="true"></i></summary>
				<p><?php echo esc_html( $item['answer'] ?? '' ); ?></p>
			</details>
		<?php endforeach; ?>
	</div>
</section>
