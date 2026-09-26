<?php
defined( 'ABSPATH' ) || exit;

$directions = argokov_rows(
	'home_directions',
	array(
		array(
			'id' => 'development',
			'variant' => 'default',
			'image_fallback' => 'assets/images/service-development-cover.webp',
			'number' => '01',
			'title' => 'Разработка сайтов',
			'lead' => 'Создаём сайт с нуля или полностью обновляем существующий. Берём на себя структуру, дизайн, разработку, интеграции и запуск.',
			'features' => array(
				array( 'text' => 'Корпоративные сайты и лендинги' ),
				array( 'text' => 'Интернет-магазины и каталоги' ),
				array( 'text' => 'Личные кабинеты и веб-сервисы' ),
				array( 'text' => 'Интеграции с CRM, 1С и другими системами' ),
			),
			'footer_text' => 'От идеи до работающего проекта',
			'button_label' => 'Обсудить новый сайт',
		),
		array(
			'id' => 'support',
			'variant' => 'accent',
			'image_fallback' => 'assets/images/service-support-cover.webp',
			'number' => '02',
			'title' => 'Поддержка и развитие',
			'lead' => 'Подключаемся к действующему сайту и берём техническую часть на себя. Исправляем ошибки, добавляем функции, выполняем задачи SEO-команды и постепенно приводим проект в порядок.',
			'features' => array(
				array( 'text' => 'Разовые доработки' ),
				array( 'text' => 'Постоянная поддержка' ),
				array( 'text' => 'Скорость, безопасность и техническое SEO' ),
				array( 'text' => 'Сложные задачи и доисторический код' ),
			),
			'footer_text' => 'Любая CMS или самописный код',
			'button_label' => 'Передать сайт на поддержку',
		),
	)
);
?>
<section class="home-section directions surface" aria-labelledby="directions-title">
	<header class="section-heading">
		<div class="section-heading__main">
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'home_directions_eyebrow', 'Основные направления' ) ); ?></p>
			<h2 id="directions-title"><?php echo esc_html( argokov_field( 'home_directions_title', 'Создаём новые сайты и развиваем существующие' ) ); ?></h2>
		</div>
		<p class="section-heading__copy"><?php echo esc_html( argokov_field( 'home_directions_copy', 'Можно прийти с идеей нового проекта, старым сайтом или задачей, от которой отказались другие.' ) ); ?></p>
		<span class="section-heading__index"><?php echo esc_html( argokov_field( 'home_directions_index', '02' ) ); ?></span>
	</header>

	<div class="directions__list">
		<?php foreach ( $directions as $direction ) : ?>
			<?php
			$variant     = ( $direction['variant'] ?? 'default' ) === 'accent' ? ' direction-card--accent' : '';
			$image       = $direction['image'] ?? array();
			$fallback    = $direction['image_fallback'] ?? '';
			$direction_id = $direction['id'] ?? '';

			if ( ! $fallback && 'development' === $direction_id ) {
				$fallback = 'assets/images/service-development-cover.webp';
			} elseif ( ! $fallback && 'support' === $direction_id ) {
				$fallback = 'assets/images/service-support-cover.webp';
			}

			$image_url   = argokov_image_url( $image, $fallback );
			$image_alt   = argokov_image_alt( $image, $direction['title'] ?? '' );
			$features    = isset( $direction['features'] ) && is_array( $direction['features'] ) ? $direction['features'] : array();
			$anchor_id   = sanitize_html_class( $direction['id'] ?? '' );
			$direction_url = ! empty( $direction['url'] ) ? home_url( $direction['url'] ) : '';
			?>
			<article class="direction-card<?php echo esc_attr( $variant ); ?>"<?php if ( $anchor_id ) : ?> id="<?php echo esc_attr( $anchor_id ); ?>"<?php endif; ?>>
				<?php if ( $direction_url ) : ?><a class="direction-card__cover" href="<?php echo esc_url( $direction_url ); ?>"><?php else : ?><div class="direction-card__cover"><?php endif; ?>
					<?php if ( $image_url ) : ?><img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" loading="lazy" decoding="async" sizes="(max-width: 960px) 100vw, 50vw" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover"><?php endif; ?>
					<span class="direction-card__number"><?php echo esc_html( $direction['number'] ?? '' ); ?></span>
				<?php if ( $direction_url ) : ?></a><?php else : ?></div><?php endif; ?>

				<div class="direction-card__body">
					<h3><?php if ( $direction_url ) : ?><a href="<?php echo esc_url( $direction_url ); ?>"><?php endif; ?><?php echo esc_html( $direction['title'] ?? '' ); ?><?php if ( $direction_url ) : ?></a><?php endif; ?></h3>
					<p class="direction-card__lead"><?php echo esc_html( $direction['lead'] ?? '' ); ?></p>

					<?php if ( $features ) : ?>
						<ul class="feature-list">
							<?php foreach ( $features as $feature ) : ?>
								<li><svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m4.5 10.5 3.2 3.2 7.8-8"></path></svg><?php echo esc_html( $feature['text'] ?? '' ); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>

					<div class="direction-card__footer">
						<span><?php echo esc_html( $direction['footer_text'] ?? '' ); ?></span>
						<a href="<?php echo esc_url( $direction_url ?: '#contact' ); ?>"<?php if ( ! $direction_url ) : ?> data-contact-modal="true"<?php endif; ?>><?php echo esc_html( $direction['button_label'] ?? 'Подробнее' ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
					</div>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>
