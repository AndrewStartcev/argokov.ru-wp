<?php
defined( 'ABSPATH' ) || exit;

get_template_part(
	'template-parts/common/contact-section',
	null,
	array(
		'eyebrow'  => argokov_field( 'home_contact_eyebrow', 'Начнём с задачи' ),
		'title'    => argokov_field( 'home_contact_title', 'Расскажите, что нужно сделать' ),
		'text'     => argokov_field( 'home_contact_text', 'Можно прислать ссылку на сайт, кратко описать проблему или приложить готовое техническое задание. Изучим материалы, зададим уточняющие вопросы и предложим следующий шаг.' ),
		'title_id' => 'contact-title',
	)
);
